<?php
    require '../../../app/module/module.php';
    
    $id =$_GET["id_menu"];

    $ubahMenu = fetchingData("SELECT * FROM menu WHERE id_customer = $id")[0];

    if(ubahMenu($_POST) > 0){
        echo "<script>
            alert('data berhasil diubah')
            document.location.href='menu.php'
            </script>";
    }else{
        mysqli_error($conn);
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<main>
        <h1>Edit Menu</h1>

            <form action="" method="post">
                <ul>
                    <input type="hidden" name="id_menu" value="<?=$ubahMenu["id_menu"];?>">
                    <li>
                        <label for="nama">nama : </label>
                        <input type="text" name="nama" id="nama" value="<?= $ubahMenu["nama"];?>">
                    </li>
                    <li>
                        <label for="price">price : </label>
                        <input type="number" name="price" id="price" value="<?= $ubahMenu["price"];?>">
                    </li>
                    <li>
                        <label for="stok">stok : </label>
                        <input type="number" name="stok" id="stok" value="<?= $ubahMenu["stok"];?>">
                    </li>
                    <li>
                        <label for="category_menu">Category Menu </label>
                        <input type="number" name="category_menu" id="category_menu" value="<?= $ubahMenu["category_menu"];?>">
                    </li>
                    <li>
                        <button type="submit" name="submit">ubah</button>
                    </li>
                </ul>
            </form>
        </main>
</body>
</html>