<?php 
 require_once ('../module.php');

 $restaurant=fetchingData("SELECT * FROM restaurant")
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
            <h1>Table restoran</h1>
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
                    <td>input date</td>
                    <td>total income</td>
                    <td>aksi</td>
                </tr>
                <?php foreach($restaurant as $res) : ?>
                <tr>
                    <td><?php echo $res["id_restaurant"] ;?></td>
                    <td><?php echo $res["transacsion_date"] ;?></td>
                    <td><?php echo $res["total_income"] ;?></td>
                    <td>
                        <a href="">Ubah</a> ||
                        <a href="">Hapus</a>
                    </td>
                </tr>
                <?php endforeach ?>
            </table>
        </div>
    </main>
</body>
</html>