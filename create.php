<?php 
session_start();
require ("module.php");
    $result = mysqli_query($conn, $sql);
    if( !$result){
        echo mysqli_error($conn);
    }else{
        echo "Tabel berhasil dibuat";
    }
    
?>