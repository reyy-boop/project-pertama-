<?php 
include "konneksi.php";
session_start();
//atur variabel
$err        = "";
$username   = "";
$ingataku   = "";

if (isset($_SESSION['session_username'])) {
    header("Location: index.php");
    exit();
}

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($username) || empty($password)) {
        $err .= "<li>Silakan masukkan username dan juga password.</li>";
    } else {
        $sql1 = "SELECT * FROM user WHERE username = '$username'";
        $q1 = mysqli_query($conn, $sql1);
        $r1 = mysqli_fetch_array($q1);

        if (empty($r1['username'])) {
            $err .= "<li>Username <b>$username</b> tidak tersedia.</li>";
        } elseif (!password_verify($password, $r1['password'])) {
            $err .= "<li>Password yang dimasukkan tidak sesuai.</li>";
        } else {
            // Simpan session
            $_SESSION['session_username'] = $username;

            header("Location: index.php");
            exit();
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
    <title>Login</title>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <style><
    .bg-cover {
    background-image: url('image/hospital.jpg'); /* Path ke gambar */
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center ;
    height: 100vh; /* Tinggi penuh viewport */
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
   
}
</style>

</head>

<body>
<div class= "bg-cover">
<div class="container my-4">    
    <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
        <div class="panel panel-info" >
            <div class="panel-heading">
                
            </div>      
            <div style="padding-top:30px" class="panel-body" >
            <div class="panel-title">Login dan Masuk Ke Sistem</div>
                <?php if($err){ ?>
                    <div id="login-alert" class="alert alert-danger col-sm-12">
                        <ul><?php echo $err ?></ul>
                    </div>
                <?php } ?>                
                <form id="loginform" class="form-horizontal" action="" method="post" role="form">       
                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input id="login-username" type="text" class="form-control" name="username" value="<?php echo $username ?>" placeholder="username">                                        
                    </div>
                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input id="login-password" type="password" class="form-control" name="password" placeholder="password">
                    </div>
                    <div style="margin-top:10px" class="form-group">
                        <div class="col-sm-12 controls">
                            <input type="submit" name="login" class="btn btn-success" value="Login"/>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-sm-12 controls text-bg-dark">
                            <p>Belum punya akun? <a href="register.php">Daftar di sini</a></p>
                        </div>
                    </div>
                    
                </form>    
            </div>                     
        </div>  
    </div>
</div>
</div>
</body>
</html>
