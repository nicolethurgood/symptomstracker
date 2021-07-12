<?php
include "config.php";

$uname = mysqli_real_escape_string($con,$_POST['username']);
$password = mysqli_real_escape_string($con,$_POST['password']);

if ($uname != "" && $password != ""){

    $sql_query = "select count(*) as cntUser from Users where UserName='".$uname."' and Password='".$password."'";
    $result = mysqli_query($con,$sql_query);
    $row = mysqli_fetch_array($result);
    $count = $row['cntUser'];
    if($count > 0){
        $_SESSION['uname'] = $uname;

        $sql_query2 = "select * from Users where UserName='".$uname."' and Password='".$password."'";
        $result2 = mysqli_query($con,$sql_query2);
        $row2 = mysqli_fetch_array($result2);
        
        $_SESSION['IDNumber'] = $row2['IDNumber'];
        $_SESSION['StudentID'] = $row2['StudentID'];
        $_SESSION['Location'] = $row2['Location'];
        $_SESSION['TestReq'] = $row2['TestReq'];
        $_SESSION['TestComp'] = $row2['TestComp'];
        $_SESSION['EXEMPT'] = $row2['EXEMPT'];
        $_SESSION['VaccCom'] = $row2['VaccCom'];
        $_SESSION['Name'] = $row2['Name'];
        echo 1;
    }else{
        echo 0;
    }

}

?>