<?php 
require_once '../../../app/module/module.php';

$customer = fetchingData("SELECT * FROM customer");

if(isset($_POST["cari"])){
    $customer= searchCus($_POST["keyInput"]);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/style.css">
    <title>Document</title>
</head>
<body>
    <main>
        <div class="container">
            <h1>Table customer</h1>
            <div class="perintah">
                <form action="" method="post">
                    <input type="text" name="keyInput" autofocus autocomplete="off" placeholder="input name">
                    <button type="submit" name="cari">Cari</button>
                </form>
                <div class="tambah">
                    <a href="tambah_customer.php">Tambah</a>
                </div>
                
            </div>
            <table>
                <tr>
                    <td>id</td>
                    <td>nama</td>
                    <td>payment</td>
                    <td>refound</td>
                    <td>id menu</td>
                    <td>id waiters</td>
                    <td>id kasir</td>
                    <td  colspan="2">aksi</td>
                </tr>
                <?php $i=1;?>
                <?php
            foreach($customer as $cus):
            ?>
                <tr>
                    <td>
                        <?php echo $i ;?>
                    </td>
                    <td>
                        <?php echo $cus["nama"]; ?>
                    </td>
                    <td>
                        <?php echo $cus["payment"]; ?>
                    </td>
                    <td>
                        <?php echo $cus["refound"]; ?>
                    </td>
                    <td>
                        <?php echo $cus["id_menu"]; ?>
                    </td>
                    <td>
                        <?php echo $cus["id_waiters"]; ?>
                    </td>
                    <td>
                        <?php echo $cus["id_kasir"] ?>
                    </td>
                    <td>
                        <a href="ubah.php?id_customer=<?= $cus["id_customer"];?>">Ubah</a>
                    </td>
                    <td>
                        <a href="hapus.php?id_customer=<?= $cus["id_customer"]; ?>"onclick="return confirm('Apakah anda yakin?');">
                        Hapus
                    </a>
                    </td>
                </tr>
                <?php $i++;?>
            <?php endforeach ?>
            </table>
        </div>
    </main>
</body>
</html>