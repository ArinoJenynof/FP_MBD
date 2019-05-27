<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php
    include 'dbconnect.php';
    $type = intval($_GET['q']);
    if ($type == 1) {
        $query = "SELECT barang.id_barang, stock.tanggal_expired, SUM(stock.jumlah) AS jumlah
            FROM barang
            JOIN stock ON stock.id_barang = barang.id_barang
            WHERE stock.tanggal_expired >= '2019-01-01'
            GROUP BY barang.nama_barang
            ORDER BY stock.tanggal_expired";
        $result = mysqli_query($con, $query);
        echo "<p>Mencari id dan tanggal expired dari barang yang 'Expired' tahun ini (2019)</p>";
        echo '<table class="table table-bordered">
            <tr>
                <th scope="col">id_barang</th>
                <th scope="col">tanggal_expired</th>
                <th scope="col">jumlah</th>
            </tr>';
            while ($barang = mysqli_fetch_assoc($result)) {
                echo '<tr>';
                echo '<td>'.$barang['id_barang'].'</td>';
                echo '<td>'.$barang['tanggal_expired'].'</td>';
                echo '<td>'.$barang['jumlah'].'</td>';
                echo '</tr>';
            }
        echo '</table>';
    }
    else if ($type == 2) {
        $query = "SELECT pembeli.nama_pembeli, transaksi.tanggal_transaksi
            FROM pembeli
            JOIN transaksi ON transaksi.id_pembeli = pembeli.id_pembeli
            WHERE pembeli.id_pembeli IN (SELECT transaksi.id_pembeli
                                        FROM transaksi
                                        GROUP BY transaksi.id_pembeli
                                        HAVING COUNT(transaksi.tanggal_transaksi) > 2)
            ORDER BY pembeli.nama_pembeli";
        $result = mysqli_query($con, $query);
        echo "<p>Mencari pembeli yang sudah melakukan transaksi > 2 kali</p>";
        echo '<table class="table table-bordered">
            <tr>
                <th scope="col">nama_pembeli</th>
                <th scope="col">tanggal_transaksi</th>
            </tr>';
            while ($barang = mysqli_fetch_assoc($result)) {
                echo '<tr>';
                echo '<td>'.$barang['nama_pembeli'].'</td>';
                echo '<td>'.$barang['tanggal_transaksi'].'</td>';
                echo '</tr>';
            }
        echo '</table>';
    }
    else if ($type == 3) {
        $query = "SELECT t.id_transaksi, p.nama_pembeli, t.total_bayar, t.tanggal_transaksi, t.status
            FROM transaksi t
            JOIN pembeli p ON t.id_pembeli = p.id_pembeli
            JOIN penjual j ON j.id_penjual = t.id_penjual
            WHERE j.nama_penjual = 'Didi Hubber' AND t.status NOT LIKE 'Cart'";
        $result = mysqli_query($con, $query);
        echo "<p>Transaksi yang dilakukan Didi Hubber";
        echo '<table class="table table-bordered">
            <tr>
                <th scope="col">id_transaksi</th>
                <th scope="col">nama_pembeli</th>
                <th scope="col">total_bayar</th>
                <th scope="col">tanggal_transaksi</th>
                <th scope="col">status</th>
            </tr>';
            while ($barang = mysqli_fetch_assoc($result)) {
                echo "<tr>
                    <td>{$barang['id_transaksi']}</td>
                    <td>{$barang['nama_pembeli']}</td>
                    <td>{$barang['total_bayar']}</td>
                    <td>{$barang['tanggal_transaksi']}</td>
                    <td>{$barang['status']}</td>
                </tr>";
            }
        echo '</table>';
    }
    mysqli_close($con);
    ?>
</body>
</html>