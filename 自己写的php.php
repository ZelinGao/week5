<?php
session_start();
if (isset($_POST['sumit'])) {
    $FirstName = $_POST['FirstName'];
    $LastName =$_POST['LastName'];
    $Email=$_POST['Email']；
    $BOD=$_POST['DOB'];
    $password = $_POST['password'];
    $con = odbc_connect("project", "", "");
    $sql = "select*from test where Firstname='" . $FirstName . "' and password='" . $password . "'";
    $result = odbc_exec($con, $sql);
    $count = odbc_fetch_row($result);
    if ($count == 1) {
        echo "login Success <br> Please Wait";
        $SESSION['log']=1;
        header("refresh:2;url=welcome.php");
    } elseif ($count ==null) {
        echo "invalid user";
        header("refresh:2;url=index.php");
    }
} else 
{
    echo "Invalid Request";
    header("refresh:2;url=index.php");
}