<?php
//echo '<pre>'; var_dump($_GET); die;

if(isset($_GET['id']))
{
    $id = $_GET['id'];

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

    $sql = "SELECT * from phonebook WHERE ID=" . $id;
    $retval = mysqli_query($conn, $sql);

    if(!$retval)
    {
        echo 'Could not enter data' . mysqli_error($conn);
        echo '<br />';
    }
    else
    {
        $row = mysqli_fetch_object($retval);
    }
}

$isEditMode = !empty($row->id);

//echo '<pre>'; var_dump($row); die;

//$isEditMode = true;
?>

<form action="<?php echo $isEditMode ? 'update.php?id=' . $row->id : 'store.php'?> "  method="post" enctype = "multipart/form-data">
    <div class="form-group">
        <label for="first_name">First Name</label>
        <input type="text" value="<?php echo $isEditMode ? $row->first_name : ' '?>"  name = "firstname1" class="form-control" id="first_name" placeholder="Enter Your First Name">
        <!--<small id="emailHelp" class="form-text text-muted">We'll never share aria-describedby="emailHelp" your email with anyone else.</small>-->
    </div>
    <div class="form-group">
        <label for="last_name">Last Name</label>
        <input type="text" value="<?php echo $isEditMode ? $row->last_name : ' '?>"  name = "lastname1" class="form-control" id="last_name" placeholder="Enter Your Last Name">
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="text" value="<?php echo $isEditMode ? $row->email : ' '?>" name = "email1" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <div class="form-group">
        <label for="phone_no">Phone No.</label>
        <input type="text" value="<?php echo $isEditMode ? $row->phone_no : ' '?>" name = "phoneno1" class="form-control" id="phone_no" placeholder="Enter Your Phone Number">
    </div>
    <div>
        <input type="file" name="image" />
    </div>
    <div class="form-group form-check">
        <input type="checkbox" class="form-check-input" id="terms_and_conditions">
        <label class="form-check-label" for="terms_and_conditions">Terms and Conditions</label>
    </div>
    <div style="text-align: center">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>

</form>

