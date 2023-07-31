<?php
require '../../../app/module/module.php';
require 'customer.php';

    $id = $_GET["id_customer"];

    if(hapusCustomer($id) >0){
        echo "<script>
            alert('data berhasil dihapus')
            document.location.href='customer.php'
            </script>";
    }else{
        echo "data gagal dihapus";
        mysqli_error($conn);
    }
?>