<?php


$id = $_GET['id'];
echo $_GET['id'];
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$db = 'temp';


$conn = mysqli_connect($dbhost,$dbuser,$dbpass,$db);

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


        $fname = $_POST['firstname1'];
        $lname = $_POST['lastname1'];
        $email = $_POST['email1'];
        $phoneno = $_POST['phoneno1'];

        $file = $_FILES['image'];

        $file['tmp_name'] = "profile-pic-". (string) $int_id . '.' . pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
        //die($file('tmp_name'));
        $filename = $file['tmp_name'];
        $filelocation = dirname(__DIR__) .'/phonebook/images/'. basename($filename);


        $retval = mysqli_query($conn, "UPDATE phonebook SET  first_name='" . $fname . "', last_name='" . $lname . "',email='" . $email . "',phone_no='" . $phoneno. "' WHERE ID=" . $id);

        if(!$retval)
        {
            echo 'Could not enter data' . " " .mysqli_error($conn);
            echo '<br />';
        }
        else
        {
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