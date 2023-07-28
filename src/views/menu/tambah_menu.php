<?php
require_once ('../module.php');
   
    if(addMenu($_POST) > 0){
        echo "<script>
            alert('data berhasil ditambah')
            document.location.href='menu.php'
        </script>";
    }else{
        echo "<script>
            alert('data gagal ditambah')
        </script>";
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="src/css/style.css">
        <title></title>
    </head>
    <body>
        <main>
            <h1>Tambah Menu</h1>

            <form action="" method="post">
                    <div  class="list">
                        <label for="nama">Nama :</label>
                        <input type="text" name="nama" id="nama">
                    </div>
                    <div  class="list">
                        <label for="price">Price : </label>
                        <input type="number" name="price" id="price">
                    </div>
                    <div  class="list">
                        <label for="stok">Stok : </label>
                        <input type="number" name="stok" id="stok">
                    </div>
                    <div  class="list">
                        <label for="category_menu">category_menu : </label>
                        <input type="text" name="category_menu" id="category_menu">
                    </div>
                    <div class="list">
                        <button type="submit" name="submit">Tambah</button>
                    </div>
            </form>
        </main>
    </body>
</html>