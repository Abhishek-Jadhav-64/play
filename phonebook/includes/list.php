<?php
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$db = 'temp';

$conn = mysqli_connect($dbhost,$dbuser,$dbpass,$db);

if(!$conn)
{
    echo "Could not connect " . mysqli_error($conn);
    echo '<br />';
}
else {
    //echo 'connection successfully';
    //echo '<br />';
}

$sql = "SELECT * from phonebook";
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
                <td><img style="width: 150px" src="images/<?php echo $row['file_name'] /*isset($row['file_name']) ? $row['file_name'] : "temp.jpeg"*/ ;?>"></td>
                <td><?php echo $row['first_name'] ?></td>
                <td><?php echo $row['last_name'] ?></td>
                <td><?php echo $row['email'] ?></td>
                <td><?php echo $row['phone_no']?></td>
                <td><a href="edit.php?id=<?php echo $row['id']?>">Edit</a> | <a href="delete.php?id=<?php echo $row['id']?>">Delete</a></td>
            </tr>

<?php endwhile; ?>

    </tbody>
</table>
