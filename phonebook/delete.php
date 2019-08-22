<?php

$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$db = 'temp';
$id = $_GET['id'];

$conn = mysqli_connect($dbhost,$dbuser,$dbpass,$db);

if(!$conn)
{
    echo "Could not connect " . mysqli_error($conn);
    echo '<br />';
}
else
{
    echo 'connection successfully';
    echo '<br />';

    //$sql = ;

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