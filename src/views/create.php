<?php 
session_start();
require ("./module/module.php");
    $result = mysqli_query($conn, $sql);
    if( !$result){
        echo mysqli_error($conn);
    }else{
        echo "Tabel berhasil dibuat";
    }
    
?>