<?php
    require '../../../app/module/module.php';

    if(addCustomer($_POST) > 0){
        echo "<script>
            alert('data berhasil ditambah')
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
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
<main>
        <h1>Tambah Customer</h1>

            <form action="" method="post">
                <ul>
                    <li >
                        <label for="nama">nama : </label>
                        <input type="text" name="nama" id="nama">
                    </li>
                    <li >
                        <label for="payment">payment : </label>
                        <input type="number" name="payment" id="payment">
                    </li>
                    <li >
                        <label for="refound">refound : </label>
                        <input type="number" name="refound" id="refound">
                    </li>
                    <li >
                        <label for="id_menu">id menu : </label>
                        <input type="number" name="id_menu" id="id_menu">
                    </li>
                    <li >
                        <label for="id_waiters">id waiters : </label>
                        <input type="number" name="id_waiters" id="id_waiters">
                    </li>
                    <li >
                        <label for="id_kasir">id kasir : </label>
                        <input type="number" name="id_kasir" id="id_kasir">
                    </li>
                    <li>
                        <button type="submit" name="submit">Tambah</button>
                    </li>
                </ul>
            </form>
        </main>
</body>
</html>