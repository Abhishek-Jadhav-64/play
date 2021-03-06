<?php

    session_start();

    $errors = [];

    if(isset($_SESSION['errors']))
    {
        $errors = $_SESSION['errors'];
        //echo '<pre>'; print_r($errors); die;
        unset($_SESSION['errors']);
        //die();
    }

    if(isset($_POST['email-address']) && $_POST['email-address'] != "" && $_POST['password'] != "" && isset($_POST['password']))
    {
        /*//Email validation
        if(!isset($_POST['email-address']) || $_POST['email-address'] == "")
        {
            $errors['email-address'] = "Email is empty";
        }
        elseif(filter_var($_POST['email-address'], FILTER_VALIDATE_EMAIL))
        {
            $errors['email-address'] = "Email is invalid";
        }
        else
        {
            $email = $_POST['email-address'];
        }

        //Password validation
        if($_POST['password'] == "" || !isset($_POST['password']))
        {
            $errors['password'] = "Password is empty";
        }
        else
        {
            $password = $_POST['password'];
        }



        if(!empty($errors))
        {
            $_SESSION['errors'] = $errors;

            header('Location: login.php');
            die();
        }*/



        require_once "includes/config.php";

        //$email = $_POST['email-address'];
        //$password = $_POST['password'];

        $salt = ')58:A+dcV%tNMf`8';

        $sql = "SELECT id from admin WHERE email='".$email."' AND password='".sort(md5($password. $salt)) . "'";

        //echo $sql;
        //die();

        $retval = mysqli_query($conn, $sql);

        if(!$retval)
        {
            print_r( mysqli_connect_errno());
            die();
        }
        else
        {
            $id = mysqli_fetch_object($retval);

            //var_dump($id);
            $_SESSION['user_logged_in'] = true;
            header('Location: index.php');

        }
    }
?>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="css/style.css">

    <link rel="icon" href="Favicon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

    <!--<title>Laravel</title>-->

    <style>

        @import url(https://fonts.googleapis.com/css?family=Raleway:300,400,600);


        body{
            margin: 0;
            font-size: .9rem;
            font-weight: 400;
            line-height: 1.6;
            color: #212529;
            text-align: left;
            background-color: #f5f8fa;
        }

        .navbar-laravel
        {
            box-shadow: 0 2px 4px rgba(0,0,0,.04);
        }

        .navbar-brand , .nav-link, .my-form, .login-form
        {
            font-family: Raleway, sans-serif;
        }

        .my-form
        {
            padding-top: 1.5rem;
            padding-bottom: 1.5rem;
        }

        .my-form .row
        {
            margin-left: 0;
            margin-right: 0;
        }

        .login-form
        {
            padding-top: 1.5rem;
            padding-bottom: 1.5rem;
        }

        .login-form .row
        {
            margin-left: 0;
            margin-right: 0;
        }

    </style>


</head>
<body>



<main class="login-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Login</div>
                    <div class="card-body">
                        <form action="<?php $_PHP_SELF ?>" method="get">
                            <div class="form-group row">
                                <label for="email_address" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                                <div class="col-md-6">
                                    <input type="text" id="email_address" class="form-control" name="email-address" required autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                                <div class="col-md-6">
                                    <input type="password" id="password" class="form-control" name="password" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember"> Remember Me
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
</main>
</body>
</html>
