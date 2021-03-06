<?php

require_once "config.php";

if(!$conn)
{
    echo "Could not connect " . mysqli_error($conn);
    echo '<br />';
}
else {
    //echo 'connection successfully';
    //echo '<br />';
}

$sql = "SELECT * from phonebook"; //WHERE user_id=.$user_id;

$retval = mysqli_query($conn, $sql);
if(!$retval)
{
    echo 'Could not enter data' . mysqli_error($conn);
    echo '<br />';
}

/*while ($row = mysqli_fetch_array($retval, MYSQLI_ASSOC))
{
    var_dump($row);
}*/


?>

<?php if(isset($_SESSION['success']) && $_SESSION['success'] == true)
{
    echo '<div class=\"alert alert-dark\" role=\"alert\">This is a dark alert—check it out!</div>';
    $_SESSION['success'] = null;
}

else
{
    $_SESSION['success'] = null;
}
?>

<table class="table table-striped" style="margin-top: 50px">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Image</th>
        <th scope="col">First Name</th>
        <th scope="col">Last Name</th>
        <th scope="col">EMail</th>
        <th scope="col">Phone No.</th>
        <th scope="col">Actions</th>
    </tr>
    </thead>
    <tbody>

<?php while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC)): ?>

            <tr>
                <td><?php echo $row['id'] ?></td>
                <td><img style="width: 100px" src="images/<?php echo $row['file_name'] /*isset($row['file_name']) ? $row['file_name'] : "temp.jpeg"*/ ;?>"></td>
                <td><?php echo $row['first_name'] ?></td>
                <td><?php echo $row['last_name'] ?></td>
                <td><?php echo $row['email'] ?></td>
                <td><?php echo $row['phone_no']?></td>
                <td><a href="edit.php?id=<?php echo $row['id']?>">Edit</a> | <a href="delete.php?id=<?php echo $row['id']?>">Delete</a></td>
            </tr>

<?php endwhile; ?>

    </tbody>


</table>

<button style="margin-left: 10px" onclick="window.location.href = 'new.php'" class="btn btn-primary">Add New Entry</button>
<button type="button" onclick="document.location.href='logout.php'" style="margin-left: 10px" class="btn btn-secondary">Logout</button>
