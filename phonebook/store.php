<?php

session_start();

$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$db = 'temp';

$conn = mysqli_connect($dbhost,$dbuser,$dbpass,$db);



//$lname = $_POST['last_name'];
//$email = $_POST['e-mail'];
//$phoneno = $_POST['phone_no'];

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
if($_POST['e-mail'] == "" || isset($_POST['e-mail']))
{
    $errors['e-mail'] = "Email is empty";
}
elseif(filter_var($_POST['e-mail'], FILTER_VALIDATE_EMAIL))
{
    $errors['e-mail'] = "Email is invalid";
}
else
{
    $email = $_POST['e-mail'];
}

//phone no
if($_POST['phone_no'] == "" || isset($_POST['phone_no']))
{
    $errors['phone_no'] = "Phone No is empty";
}
elseif(preg_match("/^[0-9]$/" , $_POST['phone_no']) || strlen($_POST['phone_no']) == 10)
{
    $errors['phone_no'] = "Phone No is invalid";
}

else
{
    $phoneno = $_POST['phone_no'];
}


if(!empty($errors))
{

    $_SESSION['errors'] = $errors;


    header('Location: new.php');
    die();
}



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

    /*if(!(isset($_POST['first_name']) && isset($_POST['last_name']) && isset($_POST['e-mail']) && isset($_POST['phone_no'])))
    {

    }*/
    //$r1 = 10;
    $r = mysqli_query($conn, "SELECT `AUTO_INCREMENT` AS ID
                              FROM INFORMATION_SCHEMA.TABLES
                              WHERE TABLE_SCHEMA = 'temp'
                              AND TABLE_NAME   = 'phonebook'");

    if(!$r)
    {
        echo "error";
    }
    else
    {
        $r1 = mysqli_fetch_object($r);
        //print_r($r1);
    }




    $int_id = $r1->ID;
    //$int_id+=1;
    //die("asfah" .$int_id);



    //if($_FILES['image'])
    //{
        //$filename = $_FILES['image']['name'];
        $file = $_FILES['image'];

        $file['tmp_name'] = "profile-pic-". (string) $int_id . '.' . pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
        //die($file('tmp_name'));
        $filename = $file['tmp_name'];
        $filelocation = dirname(__DIR__) .'/phonebook/images/'. basename($filename);

    //die($filelocation);

    //}



    /*$extensions= array("jpeg","jpg","png");

    if(in_array($file_ext,$extensions)=== false){
        $errorsss[]="extension not allowed, please choose a JPEG or PNG file.";
    }*/

    if (move_uploaded_file($_FILES['image']['tmp_name'], $filelocation)) {
        echo "File is valid, and was successfully uploaded.\n";
    } else {
        echo "Upload failed";
    }

    //die("INSERT INTO phonebook (id, file_name ,first_name, last_name, email, phone_no) VALUES(null,'$filename','$fname' ,'$lname' , '$email', '$phoneno')");
    $retval = mysqli_query($conn, "INSERT INTO phonebook (id, file_name ,first_name, last_name, email, phone_no) VALUES(null,'$filename','$fname' ,'$lname' , '$email', '$phoneno')");

    if(!$retval)
    {
        echo 'Could not enter data' . " " .mysqli_error($conn);
        echo '<br />';
        $_SESSION['success'] = false;
    }
    else
    {

        $_SESSION["success"] = true;
        //echo 'Data entered';
        //echo '<br />';
    }

    mysqli_close($conn);

    header('Location: index.php');
}
?>