<?php

$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$db = 'temp';

$conn = mysqli_connect($dbhost,$dbuser,$dbpass,$db);

//die(dirname(__DIR__));

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

    /*if(!(isset($_POST['firstname1']) && isset($_POST['lastname1']) && isset($_POST['email1']) && isset($_POST['phoneno1'])))
    {

    }*/
    $r1 = 10;
    $r = mysqli_query($conn, "SELECT MAX(id) AS max_id FROM phonebook");

    if(!$r)
    {
        echo "error";
    }
    else
    {
        $r1 = mysqli_fetch_object($r);
        //print_r($r1);
    }




    $int_id = $r1->max_id;
    $int_id+=1;
    //die("asfah" .$int_id);

    $fname = $_POST['firstname1'];
    $lname = $_POST['lastname1'];
    $email = $_POST['email1'];
    $phoneno = $_POST['phoneno1'];

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
        $errors[]="extension not allowed, please choose a JPEG or PNG file.";
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
    }
    else
    {
        //echo 'Data entered';
        //echo '<br />';
    }

    mysqli_close($conn);

    header('Location: index.php');
}
?>