<?php 
 require ('../module.php');

 $kasir=fetchingData("SELECT * FROM kasir")
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Document</title>
</head>
<body>
    <main>
        <div class="container">
            <h1>Table kasir</h1>
            <div class="perintah">
                <div class="search">
                    <input type="text">
                    <button type="button">Cari</button>
                </div>
                <button class="tambah">Tambah data</button>
            </div>
            <table>
                <tr>
                    <td>id</td>
                    <td>refound</td>
                    <td>income</td>
                    <td>transacsion date</td>
                    <td>aksi</td>
                </tr>
                <?php foreach ($kasir as $k) : ?>
                <tr>
                    <td><?php echo $k["id_kasir"];?> </td>
                    <td><?php echo $k["refound"];?> </td>
                    <td><?php echo $k["income"];?> </td>
                    <td><?php echo $k["transacsion_date"];?> </td>
                    <td>
                        <button href="">Ubah</button> ||
                        <button href="">Hapus</button>
                    </td>
                </tr>
                <?php endforeach  ?>
            </table>
        </div>
    </main>
</body>
</html>