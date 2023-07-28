<?php
    require_once '../module.php';
    require 'menu.php';

    $id=$_GET['id_menu'];

    if(hapusMenu($id)>0){
        echo "<script>
            alert('Data Menu berhasil dihapus')
            document.location.href='customer.php'
            </script>";
    }else{
        "<script>
            alert('Data Menu gagal dihapus')
        </script>";
    }
?>