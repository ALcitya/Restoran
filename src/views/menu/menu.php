<?php 
 require ('../module.php');
 $menu = fetchingData("SELECT * FROM menu");
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
            <h1>Table Menu</h1>
            <div class="perintah">
                <div class="search">
                    <input type="text">
                    <button type="button">Cari</button>
                </div>
                <a href="tambah_menu.php">Tambah data</a>
            </div>
            <table>
                <tr>
                    <td>id</td>
                    <td>nama</td>
                    <td>price</td>
                    <td>stok</td>
                    <td>Kategori menu</td>
                    <td>Aksi</td>
                </tr>
                <?php $i=1; ?>
                <?php foreach($menu as $m) :?>
                <tr>
                    <td>
                        <?php echo $i;?>
                    </td>
                    <td>
                        <?php echo $m["nama"] ?>
                    </td>
                    <td>
                        <?php echo $m["price"] ?>    
                    </td>
                    <td>
                        <?php echo $m["stock"] ?>    
                    </td>
                    <td>
                        <?php echo $m["category_menu"] ?>    
                    </td>
                    <td>
                        <a href="#">Ubah</a> ||
                        <a href="hapus_menu.php?id_menu=<?=$m['id_menu'];?>">Hapus</a>
                    </td>
                </tr>
                <?php $i++?>
                <?php endforeach?>
            </table>
        </div>
    </main>
</body>
</html>