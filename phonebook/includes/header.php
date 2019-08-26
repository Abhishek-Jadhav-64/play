<?php

session_start();

if(!isset($_SESSION['user_logged_in']))
{
    header('Location: login.php');
}

?>

<!doctype html>

<html>
<head>
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <style>
        label {
            padding-left: 10px;
            margin-top: 5px;
        }

        small {
            padding-left: 10px;
            margin-top: 5px;
        }

        input{
            margin: 10px;
        }

        div {
            border-radius: 5px;
            background-color: #ffffff;
            padding: 10px;
        }
    </style>

</head>
<body>
