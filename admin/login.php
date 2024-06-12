<?php
if (!file_exists ('config/db.php')){
    header("location: install/paso1.php");
    exit;
}

// checking for minimum PHP version
if (version_compare(PHP_VERSION, '5.3.7', '<')) {
    exit("Sorry, Simple PHP Login does not run on a PHP version smaller than 5.3.7 !");
} else if (version_compare(PHP_VERSION, '5.5.0', '<')) {
    require_once("libraries/password_compatibility_library.php");
}

require_once("config/db.php");
require_once("classes/Login.php");

$login = new Login();

if ($login->isUserLoggedIn() == true) {
    header("location: index.php");
} else {
    $page_title="LaCumbre | Login";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $page_title;?></title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <style>
        .login-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            height: 100vh;
        }
        .login-logo img {
            width: 250px;
            height: 250px;
        }
        .login-box {
            width: 400px;
        }
    </style>
</head>
<body class="hold-transition login-page">
    <div class="container login-container">
        <div class="login-logo">
            <a href="login.php">
                <img src="img/lacumbre.png" alt="LaCumbre Logo">
            </a>
        </div>
        <div class="login-box">
            <div class="login-box-body">
                <p class="login-box-msg">Inicio de sesión</p>
                <?php
                if (isset($login)) {
                    if ($login->errors) {
                        echo '<div class="alert alert-danger alert-dismissible" role="alert"><strong>Error!</strong>';
                        foreach ($login->errors as $error) {
                            echo $error;
                        }
                        echo '</div>';
                    }
                    if ($login->messages) {
                        echo '<div class="alert alert-success alert-dismissible" role="alert"><strong>Aviso!</strong>';
                        foreach ($login->messages as $message) {
                            echo $message;
                        }
                        echo '</div>';
                    }
                }
                ?>
                <form action="login.php" method="post">
                    <div class="form-group has-feedback">
                        <input type="text" name="user_name" class="form-control" placeholder="Correo electrónico" required>
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password" name="user_password" class="form-control" placeholder="Contraseña" required>
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <div class="row">
                        <div class="col-xs-8">
                        </div>
                        <div class="col-xs-4">
                            <button type="submit" name="login" class="btn btn-primary btn-block btn-flat">Entrar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
<?php
}
?>
