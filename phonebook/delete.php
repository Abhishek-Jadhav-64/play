<?php

$id = $_GET['id'];

require_once "includes/config.php";

if(!$conn)
{
    echo "Could not connect " . mysqli_error($conn);
    echo '<br />';
}
else
{
    echo 'connection successfully';
    echo '<br />';

    $r = mysqli_query($conn, "SELECT file_name from phonebook WHERE id=". $id);

    //$sql = ;

    if(!$r)
    {

    }
    else
    {
        $r1 = mysqli_fetch_object($r);

        //var_dump($r1);
        $fname = $r1 -> file_name;
        $filelocation = dirname(__DIR__) . "/phonebook/images/".$fname;
        if (file_exists($filelocation)) {
            unlink($filelocation);
            echo 'File '.$fname.' has been deleted';
        } else {
            echo 'Could not delete '.$filename.', file does not exist';
        }

    }



    /*if (array_key_exists('delete_file', $_POST)) {
        $filename = $_POST['delete_file'];

    }*/


    $retval = mysqli_query($conn, "DELETE FROM phonebook WHERE ID=" . $id);

    if(!$retval)
    {
        echo 'Could not remove data' . " " .mysqli_error($conn);
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