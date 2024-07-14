<?php
include "konneksi.php";

// Definisikan variabel 
$err = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $nama = $_POST['nama'];

    // Validasi input
    if (empty($username) || empty($password) || empty($nama)) {
        $err .= "<li>Username, nama, dan password harus diisi.</li>";
    } else {
        // Enkripsi kata sandi
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Simpan ke database
        $sql = "INSERT INTO user (username, password, nama) VALUES ('$username', '$hashed_password', '$nama')";
        if (mysqli_query($conn, $sql)) {
            echo "Registrasi berhasil!";
        } else {
            $err .= "<li>Error: " . $sql . "<br>" . mysqli_error($conn) . "</li>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
</head>
<body>
<div class="container my-4">    
    <div id="registerbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
        <div class="panel panel-info">
            <div class="panel-heading">
                <div class="panel-title">Register</div>
            </div>      
            <div style="padding-top:30px" class="panel-body">
                <?php if (!empty($err)) { ?>
                    <div id="register-alert" class="alert alert-danger col-sm-12">
                        <ul><?php echo $err ?></ul>
                    </div>
                <?php } ?>                
                <form id="registerform" class="form-horizontal" action="" method="post" role="form">
                <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input id="register-nama" type="text" class="form-control" name="nama" value="<?php echo isset($nama) ? $nama : '' ?>" placeholder="Nama">
                    </div>       
                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input id="register-username" type="text" class="form-control" name="username" value="<?php echo isset($username) ? $username : '' ?>" placeholder="Username">                                        
                    </div>
                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input id="register-password" type="password" class="form-control" name="password" placeholder="Password">
                    </div>
                    
                    <div class="form-group">
                        <div class="col-sm-12 controls">
                            <input type="submit" class="btn btn-success" value="Daftar"/>
                        </div>
                    </div>
                </form>    
            </div>                     
        </div>  
    </div>
</div>
</body>
</html>