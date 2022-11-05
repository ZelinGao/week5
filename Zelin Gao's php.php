<?php
session_start();
if (isset($_POST['sumit'])) {
    $FirstName = $_POST['FirstName'];
    $LastName =$_POST['LastName'];
    $Email=$_POST['Email'];
    $DOB=$_POST['DOB'];
    $password = $_POST['password'];
    $con = odbc_connect("project", "", "");
    $sql = "select*from test where Firstname='" . $FirstName . "' and password='" . $password . "'";
    $result = odbc_exec($con, $sql);
    $count = odbc_fetch_row($result);
    if ($count == 1) {
        echo "<h1>Congratulations!</h1>";
        echo "<h2>Your registration was success</h2>";
        echo "<h3>Details:</h3>"
        echo "Name:".$FiretName." ".$LastName."<br>;
        echo "Date of birth:".$DOB."<br>";
        echo "Email address: ";
		echo $Email."<br>";
        echo "<h3>Registered User:</h3>";
        echo "Name:".$FiretName." ".$LastName."<br>;
        echo "Email address: ";
		echo $Email."<br>";
		
        $SESSION['log']=1;
        header("refresh:2;url=welcome.php");
    } elseif ($count ==null) {
        echo "<h1>Duplicate Registration</h1>";
        echo "<h2>$FirstName.$LastName.","."you have previously registered!</h2>";
        echo "<h3>Name"."         "."Email"<br>";
        echo $FirstName.$LastName."   ".$Email;

        header("refresh:2;url=index.php");
    }
}
else 
{
    echo "<h1>Registratio Failed</h1>";
    echo $FirstName.$LastName."(".$Email.")".","."you are banned from registering for this workshop!";
    header("refresh:2;url=index.php");
}