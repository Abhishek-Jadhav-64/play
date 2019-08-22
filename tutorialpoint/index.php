<?php

    function demo()
    {
        $no1 = 10;
        $no2 = 20;


        if($no2 > $no1)
        {
            echo $no2 - $no1;

        }
        elseif($no1 > $no2)
        {
            echo $no1 + $no2;
        }
        else
        {
            echo $no1;

        }

        echo "<br />";
        $temp = array("Hello", "World", "Wassup");

        foreach ($temp as $i)
        {
            if($i == "Wassup")
            {
                break;
            }

            echo "$i ";
        }

        echo "<br />";

        for($i = 0; $i < 3; $i++)
        {
            echo "$temp[$i] <br />";
        }

        echo "<br />";
        echo "<br />";

        $demo = $temp[0];
        echo $demo;
        echo "<br />";


        for($i = 0 ; $i < strlen($demo); $i++)
        {
            //echo substr($demo, $i, 1);
            echo $demo[$i]. " ";
        }

        for($i = 0 ; $i < strlen($temp[0]); $i++)
        {
            echo substr($temp[0], $i, 1);
        }

        echo "<br />";

        echo $temp[0] . " " . $temp[1];

        $salaries = array("Abhishek" => 1000, "0xBIT" => 2000, "Tanmay" => 3000);

        echo "<br />";

        /*for ($i = 0; $i < strlen($salaries); $i++)
        {
            echo $salaries[$i] . " ";
        }*/

        echo $salaries["Abhishek"];
    }


    function getBrowser()
    {
        $user_agent = $_SERVER['HTTP_USER_AGENT'];
        $browser_name = 'NA';
        $platform = 'NA';

        $version = "";

        //Platform name
        if(preg_match('/linux/i', $user_agent))
        {
            $platform = 'Linux';
        }
        elseif(preg_match('/macintosh|mac os x/i', $user_agent))
        {
            $platform = "Mac";
        }
        elseif(preg_match('/windows|win32/i',$user_agent))
        {
            $platform = 'Windows';
        }

        //Browser name
        if(preg_match('/MSIE/i', $user_agent) && !preg_match('/Opera/i', $user_agent))
        {
            $browser_name = 'Internet Explorer';
            $ub = 'MSIE';
        }
        elseif(preg_match('/Firefox/i',$user_agent))
        {
            $browser_name = 'Mozilla Firefox';
            $ub = 'Firefox';
        }
        elseif(preg_match('/Chrome/i',$user_agent))
        {
            $browser_name = 'Google Chrome';
            $ub = 'Chrome';
        }
        elseif(preg_match('/Safari/i',$user_agent))
        {
            $browser_name = 'Apple Safari';
            $ub = 'Safari';
        }
        elseif(preg_match('/Opera/i',$user_agent))
        {
            $browser_name = 'Opera';
            $ub = 'Opera';
        }

        $known = array('version', $ub, 'other');
        $pattern = '#(?<browser>' . join('|', $known) . ')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';

        if(!preg_match_all($pattern, $user_agent, $matches))
        {

        }

        $i = count($matches['browser']);

        if($i != 1)
        {
            if(strripos($user_agent, "Version") < strripos($user_agent, $ub))
            {
                $version = $matches['version'][0];
            }
            else
            {
                $version = $matches['version'][1];
            }
        }
        else
        {
            $version = $matches['version'][0];
        }

        if($version == null || $version == "")
        {
            $version = "?";
        }

        return array('useragent' => $user_agent,
                     'name' => $browser_name,
                     'version' => $version,
                     'platform' => $platform,
                     'pattern' => $pattern

            );
    }

    $ua = getBrowser();

    $yourbrowser = "Your Browser: " . $ua['name'] . " " .
                    $ua['version'] . " on " . $ua['platform'] .
                    " reports: <br /> " . $ua['useragent'];

    //print_r($yourbrowser);

?>

<?php

if(isset($_POST["name"]) && isset($_POST["age"]))
{
    if($_POST["name"] || $_POST["age"])
    {
        if(preg_match("/[^A-Za-z'-]/", $_POST['name']))
        {

        }

        echo "Welcome " . $_POST['name'] . "<br />" . "You are ". $_POST['age']. " years old.";

        exit();
    }
}


?>

<html>
    <head>
        <link rel="stylesheet" href="css/bootstrap.min.css">

    </head>
    <body>

    <?php

        if(isset($_COOKIE["Name"]))
        {
           $_POST["Name"] = $_COOKIE["Name"];
        }

    ?>

    <form action="<?php $_PHP_SELF ?>" method="post">
        Name: <input type="text" name = "Name" />
        <input type="submit" />
    </form>

    <br />

    <?php if(isset($_POST["Name"])  && $_POST["Name"] == "Abhishek"):

        if(!isset($_COOKIE["Name"]))
        {
            setcookie("Name" , $_POST["Name"], time()+ 300, "", "",0);
        }

        ?>
        <form action="<?php $_PHP_SELF ?>" method="post">
            Name: <input type="text" name = "name" />
            Age: <input type = "text" name="age"/>
            <input type="submit" />
            <br />

            <?php echo "Hi my name is {$_POST['Name']} <br />"; ?>
            <?php //echo 'Hi my name is {$_POST["Name"]} <br />'; ?>
        </form>

    <?php endif; ?>

    <script>
        
        function deletecookies(name1) {
            document.cookie = name1 + '=;expires=Thu, 01 Jan 1970 00:00:01 GMT;';
        }
        
    </script>

    <script type="text/javascript" src="temp.js">

        helloWorld()

    </script>

    <form action="<?php $_PHP_SELF ?>" method="post">

        <button type = "button" onclick="deletecookies("Name")">Delete</button>

    </form>

    <form action="<?php $_PHP_SELF ?>" method="post">
        <div class="form-group">
            <label for="first_name">First Name</label>
            <input type="text" name = "firstname1" class="form-control" id="first_name" aria-describedby="emailHelp" placeholder="Enter Your First Name">
            <!--<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>-->
        </div>
        <div class="form-group">
            <label for="last_name">Last Name</label>
            <input type="text" name = "lastname1" class="form-control" id="last_name" placeholder="Enter Your Last Name">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" name = "email1" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <label for="last_name">Phone No.</label>
            <input type="text" name = "phoneno1" class="form-control" id="phone_no" placeholder="Enter Your Phone Number">
        </div>
        <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="terms_and_conditions">
            <label class="form-check-label" for="terms_and_conditions">Terms and Conditions</label>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>

    </form>

        <?php

        $dbhost = 'localhost';
        $dbuser = 'root';
        $dbpass = '';
        $db = 'temp';

        $conn = mysqli_connect($dbhost,$dbuser,$dbpass,$db);

        if(!$conn)
        {
            echo "Could not connect " . mysqli_error($conn);
        }
        else
        {
            echo 'connection successfully';

            //$sql = ;

            $fname = $_POST['firstname1'];
            $lname = $_POST['lastname1'];
            $email = $_POST['email1'];
            $phoneno = $_POST['phoneno1'];

            $retval = mysqli_query($conn, "INSERT INTO phonebook (id, first_name, phone_no) VALUES(null, '$fname' ,'$lname' , '$email', '$phoneno')");

            if(!$retval)
            {
                echo 'Could not enter data' . mysqli_error($conn);
            }
            else
            {
                echo 'Data entered';
            }

            mysqli_close($conn);
        }
        ?>



    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">EMail</th>
            <th scope="col">Phone No.</th>
        </tr>
        </thead>
        <tbody>




        </tbody>
    </table>

    </body>
</html>

<?php

    function delete_cookie()
    {
        if(isset($_POST["Name"]))
        {
            setcookie( "name", "", time()- 60, "/","", 0);
        }
    }

?>

<?php
    //DIfferent ways to use functions
    function sayHello()
    {
        echo "Hello<br />";
    }
    function printMe($param = NULL)
    {
        print $param;
    }

    function addSix(&$num)
    {
        $num += 6;
    }

    $function_holder = "sayHello";
    //$function_holder();


    //Date examples

    echo "<br />";

    echo date("m/d/y");
?>

<?php

    /*$dbhost = 'localhost';
    $dbuser = 'root';
    $dbpass = '';
    $db = 'temp';

    $conn = mysqli_connect($dbhost,$dbuser,$dbpass,$db);

    if(!$conn)
    {
        echo "Could not connect " . mysqli_error($conn);
    }
    else
    {
        echo 'connection successfully';

        //$sql = ;


        //$retval = mysqli_query($conn, "INSERT INTO phonebook (id, first_name, phone_no) VALUES(null, 'Abhishek' , '9090909090')");

        /*if(!$retval)
        {
            echo 'Could not enter data' . mysqli_error($conn);
        }
        else
        {
            echo 'Data entered';
        }

        mysqli_close($conn);
    }

    /*$sql = "SELECT * from phonebook";

    $retval = mysqli_query($conn, $sql);
    if(!$retval)
    {
        echo 'Could not enter data' . mysqli_error($conn);
    }

    while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC))
    {
        echo "ID :{$row['id']}  <br> ".
            "FIRST NAME : {$row['first_name']} <br> ".
            "LAST NAME : {$row['last_name']} <br> ".
            "EMAIL : {$row['email']} <br> ".
            "PHONE NO : {$row['phone_no']} <br> ".
            "--------------------------------<br>";


        echo "<tr><td>{$row['id']}</td>
            <td>{$row['first_name']}</td>
            <td>{$row['last_name']}</td>
            <td>{$row['email']}</td>
            <td>{$row['phone_no']}</td></tr>\n";


    }*/

?>

<?php



?>











