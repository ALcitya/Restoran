<?php 
 require ('module.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <main>
        <div class="container">
            <h1>Table Admin</h1>
            <div class="perintah">
                <div class="search">
                    <input type="text">
                    <button type="button">Cari</button>
                </div>
                <button class="tambah">Tambah data</button>
            </div>
            <table>
                <tr>
                    <td>id kasir</td>
                    <td>nama</td>
                    <td>id customer</td>
                    <td>aksi</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Andre</td>
                    <td>3</td>
                    <td>
                        <button href="">Ubah</button> ||
                        <button href="">Hapus</button>
                    </td>
                </tr>
            </table>
        </div>
    </main>
</body>
</html>