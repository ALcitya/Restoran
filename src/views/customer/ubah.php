<?php
    require '../../../app/module/module.php';
    
    $id =$_GET["id_customer"];

    $ubahCus = fetchingData("SELECT * FROM customer WHERE id_customer = $id")[0];

    if(ubahCustomer($_POST) > 0){
        echo "<script>
            alert('data berhasil diubah')
            document.location.href='customer.php'
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
        <h1>Edit Customer</h1>

            <form action="" method="post">
                <ul>
                    <input type="hidden" name="id_customer" value="<?=$ubahCus["id_customer"];?>">
                    <li  class="list">
                        <label for="nama">nama : </label>
                        <input type="text" name="nama" id="nama" value="<?= $ubahCus["nama"];?>">
                    </li>
                    <li  class="list">
                        <label for="payment">payment : </label>
                        <input type="number" name="payment" id="payment" value="<?= $ubahCus["payment"];?>">
                    </li>
                    <li  class="list">
                        <label for="refound">refound : </label>
                        <input type="number" name="refound" id="refound" value="<?= $ubahCus["refound"];?>">
                    </li>
                    <li  class="list">
                        <label for="id_menu">id menu : </label>
                        <input type="number" name="id_menu" id="id_menu" value="<?= $ubahCus["id_menu"];?>">
                    </li>
                    <li  class="list">
                        <label for="id_waiters">id waiters : </label>
                        <input type="number" name="id_waiters" id="id_waiters" value="<?= $ubahCus["id_waiters"];?>">
                    </li>
                    <li  class="list">
                        <label for="id_kasir">id kasir : </label>
                        <input type="number" name="id_kasir" id="id_kasir" value="<?= $ubahCus["id_kasir"];?>">
                    </li>
                    <li class="list">
                        <button type="submit" name="submit">ubah</button>
                    </li>
                </ul>
            </form>
        </main>
</body>
</html>