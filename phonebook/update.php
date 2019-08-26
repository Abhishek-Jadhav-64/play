<?php

session_start();

$id = $_GET['id'];
echo $_GET['id'];

require_once "includes/config.php";

$errors = [];

//first name
if(!isset($_POST['first_name']) || $_POST['first_name'] == '')
{
    $errors['first_name'] = 'First Name is invalid';
    //die($errors);
}
elseif(preg_match("/^[a-z]$/" , $_POST['first_name']))
{
    $errors['first_name'] = 'First Name has invalid characters';
}
else
{
    $fname = $_POST['first_name'];
}

//last name
if(!isset($_POST['last_name']) || empty($_POST['last_name']))
{
    $errors['last_name'] = "Last Name is invalid";
}
elseif (preg_match("/^[a-z]$/" , $_POST['last_name']))
{
    $errors['last_name'] = "Last Name has invalid characters";
}
else
{
    $lname = $_POST['last_name'];
}

//email
if($_POST['e-mail'] == "" || !isset($_POST['e-mail']))
{
    $errors['e-mail'] = "Email is empty";
}
elseif(!filter_var($_POST['e-mail'], FILTER_VALIDATE_EMAIL))
{
    $errors['e-mail'] = "Email is invalid";
}
else
{
    $email = $_POST['e-mail'];
}

//phone no
if($_POST['phone_no'] == "" || !isset($_POST['phone_no']))
{
    $errors['phone_no'] = "Phone No is empty";
}
elseif(preg_match("/^[0-9]$/" , $_POST['phone_no']) || !strlen($_POST['phone_no']) == 10)
{
    $errors['phone_no'] = "Phone No is invalid";
}

else
{
    $phoneno = $_POST['phone_no'];
}

if(!empty($errors)) {

    $_SESSION['errors'] = $errors;


    header('Location: edit.php?id='.$id);
    die();


}
//$conn = mysqli_connect($dbhost,$dbuser,$dbpass,$db);

try
{
    if(!$conn)
    {
        echo "Could not connect " . mysqli_error($conn);
        echo '<br />';
    }
    else
    {
        //echo 'connection successfully';
        echo '<br />';

        //$sql = ;

        $file = $_FILES['image'];

        $file['image']['tmp_name'] = "profile-pic-". (string) $id . '.' . pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
        //die($file('tmp_name'));
        $filename = $file['image']['tmp_name'];
        $filelocation = dirname(__DIR__) .'/phonebook/images/'. basename($filename);

        if (move_uploaded_file($_FILES['image']['tmp_name'], $filelocation)) {
            echo "File is valid, and was successfully uploaded.\n";
        } else {
            echo "Upload failed";
        }

        $retval = mysqli_query($conn, "UPDATE phonebook SET file_name='".$filename."',first_name='" . $fname . "', last_name='" . $lname . "',email='" . $email . "',phone_no='" . $phoneno. "' WHERE ID=" . $id);

        if(!$retval)
        {
            echo 'Could not enter data' . " " .mysqli_error($conn);
            $_SESSION['success'] = false;
            echo '<br />';
        }
        else
        {
            $_SESSION['success'] = true;
            echo 'Data entered';
            //echo '<br />';

        }
        //die("UPDATE phonebook SET first_name=" . $fname . ",last_name='" . $lname . "',email='" . $email . "',phone_no='" . $phoneno. "'WHERE ID=". $id);
        mysqli_close($conn);

        header('Location: index.php');
    }
}
catch(Exception $e)
{
    echo $e -> getMessage();
}


?>