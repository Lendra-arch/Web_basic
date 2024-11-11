<?php
    include "service/database.php";
    
    $register_message = "";

    if(isset($_POST['daftar'])){
        $username= $_POST['username'];
        $password = $_POST['password'];
        $hash_password = hash("sha256",$password);

        try {
            $sql = "INSERT INTO users (username, password) VALUES ('$username','$hash_password')";
        
            if($conn->query($sql)){
             $register_message = "Daftar akun berhasil, silahkan login";
            }
            else{
                echo "<script>alert('Username sudah ada!')</script>";
            }

        }catch (mysqli_sql_exception) {
            $register_message = "Username sudah digunakan";

        }
        $conn ->close();

        
    }
   

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include "layout/header.html" ?>
    <h3> DAFTAR AKUN</h3>
    <i><?= $register_message ?></i>

    <form action="register.php" method="POST">
        <input type="text" placeholder="username" name="username"/>
        <input type="password" placeholder="password" name="password"/>
        <button type="submit" name="daftar">Daftar sekarang</button>
    </form>
    <?php include "layout/footer.html" ?>

</body>
</html>