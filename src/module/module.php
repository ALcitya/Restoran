<?php
$conn = mysqli_connect("localhost", "root", "", "restoran");

function fetchingData($query)
{
    global $conn;
    $data = [];
    $response = mysqli_query($conn, $query);
    while ($rows = mysqli_fetch_assoc($response)) {
        $data[] = $rows;
    }
    return $data;
}
function signUp()
{
    global $conn;
    $email = stripslashes($_POST["email"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);
    $confirmPass = mysqli_real_escape_string($conn, $_POST["confirmPassword"]);
    $readyAcc = fetchingData("SELECT * FROM listdata WHERE email = '$email'");
    if ($password !== $confirmPass) {
        echo "
        <script>
        alert('password tidak sesuai');
        </script>
        ";
        return false;
    }
    if ($readyAcc) {
        if ($email === $readyAcc[0]["email"]) {
            echo "
            <script>
            alert('Email sudah terdaftar');
            </script>
            ";
            return false;
        }
    }
    $password = password_hash($password, PASSWORD_DEFAULT);
    $query = "INSERT INTO user VALUES ('','$email','$password')";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function addData()
{
    global $conn;
    $username = htmlspecialchars($_POST["username"]);
    $email = htmlspecialchars($_POST["email"]);
    $nohp = htmlspecialchars($_POST["nohp"]);
    $duplicated = fetchingData("SELECT * FROM listdata WHERE username = '$username' OR email = '$email' OR nohp = '$nohp'");
    if ($duplicated) {
        if (strtolower($username) === strtolower($duplicated[0]["username"])) {
            echo "
            <script>
            alert('username sudah terdaftar');
            </script>
            ";
            return false;
        }
        if (strtolower($email) === strtolower($duplicated[0]["email"])) {
            echo "
            <script>
            alert('email sudah terdaftar');
            </script>
            ";
            return false;
        }
        if ($nohp === $duplicated[0]["nohp"]) {
            echo "
            <script>
            alert('no hp sudah terdaftar');
            </script>
            ";
            return false;
        }
    }
    $image = uploadImage();
    if (!$image) {
        return false;
    }
    $query = "INSERT INTO listdata VALUES ('', '$username','$email','$nohp', '$image')";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function uploadImage()
{
    $fileName = $_FILES["image"]["name"];
    $fileTmp = $_FILES["image"]["tmp_name"];
    $fileSize = $_FILES["image"]["size"];
    $error = $_FILES["image"]["error"];

    if ($error === 4) {
        echo "
        <script>
        alert('masukkan gambar');
        </script>
        ";
        return false;
    }

    if ($fileSize > 10000000) {
        echo "
        <script>
        alert('ukuran file terlalu besar');
        </script>
        ";
        return false;
    }

    $formatValid = ["jpg", "jpeg", "png"];
    $formatFile = explode(".", $fileName);
    $imageFormat = strtolower(end($formatFile));
    if (!in_array($imageFormat, $formatValid)) {
        echo "
        <script>
        alert('masukkan file yang sesuai');
        </script>
        ";
    }

    $imageName = uniqid() . "." . $imageFormat;
    move_uploaded_file($fileTmp, "assets/img/" . $imageName);
    return $imageName;
}

function deleteData($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM listdata WHERE id = '$id'");
    return mysqli_affected_rows($conn);
}

function editData()
{
    global $conn;
    $id =  htmlspecialchars($_POST["id"]);
    $username =  htmlspecialchars($_POST["username"]);
    $email = htmlspecialchars($_POST["email"]);
    $nohp = htmlspecialchars($_POST["nohp"]);

    $oldUsername = $_POST["oldUsername"];
    $oldEmail = $_POST["oldEmail"];
    $oldNohp = $_POST["oldNohp"];
    $oldImage = $_POST["oldImage"];

    $duplicated = fetchingData("SELECT * FROM listdata WHERE username = '$username' OR email = '$email' OR nohp = '$nohp'");

    if ($duplicated) {
        if ($username !== $oldUsername && strtolower($username) === strtolower($duplicated[0]["username"])) {
            echo "
            <script>
            alert('username sudah terdaftar');
            </script>
            ";
            return false;
        }
        if ($email !== $oldEmail && strtolower($email) === strtolower($duplicated[0]["email"])) {
            echo "
            <script>
            alert('email sudah terdaftar');
            </script>
            ";
            return false;
        }
        if ($nohp !== $oldNohp && $nohp = $duplicated[0]["nohp"]) {
            echo "
            <script>
            alert('no hp sudah terdaftar');
            </script>
            ";
            return false;
        }
    }

    if ($_FILES["image"]["error"] === 4) {
        $image = $oldImage;
    } else {
        $image = uploadImage();
    }
    $query = "UPDATE listdata SET 
        username = '$username',
        email = '$email',
        nohp = '$nohp',
        image = '$image'
    WHERE id = $id
    ";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function searchData($keyword)
{
    $data = fetchingData("SELECT * FROM listdata WHERE 
    username LIKE '%$keyword%' OR 
    email LIKE '%$keyword%' OR 
    nohp LIKE '%$keyword%'
    ");
    return $data;
}

function addMenu($data_menu){
    if( isset($_POST["submit"]) ){
        global $conn;
        
        $nama = htmlspecialChars($data_menu["nama"]);
        $price = htmlspecialchars($data_menu["price"]);
        $stok = htmlspecialchars($data_menu["stok"]);
        $category = htmlspecialchars($data_menu["category_menu"]);

        $query="INSERT INTO menu
                VALUES
                ('','$nama','$price','$stok','$category')
        ";

        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
    }
}
function hapusMenu($id){
    global $conn;
    mysqli_query($conn,"DELETE FROM menu WHERE id_menu=$id");
    return mysqli_affected_rows($conn);
}
function ubahMenu($ubah){
    if( isset($_POST["submit"])){
        global $conn;
        $id=$ubah["id_menu"];
        $nama = htmlspecialchars($ubah["nama"]);
        $price = htmlspecialchars($ubah["price"]);
        $stok = htmlspecialchars($ubah["stok"]);
        $category_menu = htmlspecialchars($ubah["category_menu"]);

        $query="UPDATE customer SET
                nama = '$nama',
                price = '$price',
                stok = '$stok',
                category_menu = '$category_menu',

                WHERE id_menu = $id;
                ";

        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
    }
}
function addCustomer($data_customer){
    if( isset($_POST["submit"]) ){
        global $conn;
        
        $nama = htmlspecialchars($data_customer["nama"]);
        $payment = htmlspecialchars($data_customer["payment"]);
        $refound = htmlspecialchars($data_customer["refound"]);
        $id_menu = htmlspecialchars($data_customer["id_menu"]);
        $id_waiters = htmlspecialchars($data_customer["id_waiters"]);
        $id_kasir = htmlspecialchars($data_customer["id_kasir"]);

        $query="INSERT INTO customer
                VALUES
                ('','$nama','$payment','$refound','$id_menu','$id_waiters','$id_kasir')
        ";

        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
    }
}
function hapusCustomer($id){
    global $conn;
    mysqli_query($conn,"DELETE FROM customer WHERE id_customer=$id");
    return mysqli_affected_rows($conn);
}


function ubahCustomer($ubahData){
    if( isset($_POST["submit"])){
        global $conn;
        $id=$ubahData["id_customer"];
        $nama = htmlspecialchars($ubahData["nama"]);
        $payment = htmlspecialchars($ubahData["payment"]);
        $refound = htmlspecialchars($ubahData["refound"]);
        $id_menu = htmlspecialchars($ubahData["id_menu"]);
        $id_waiters = htmlspecialchars($ubahData["id_waiters"]);
        $id_kasir = htmlspecialchars($ubahData["id_kasir"]);

        $query="UPDATE customer SET
                nama = '$nama',
                payment = '$payment',
                refound = '$refound',
                id_menu = '$id_menu',
                id_waiters= '$id_waiters',
                id_kasir = '$id_kasir'

                WHERE id_customer = $id;
                ";

        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
    }
}
function searchCus($keyCari){
    $query="SELECT * FROM customer 
            WHERE nama LIKE '%$keyCari%'
            ";
    return fetchingData($query);
}