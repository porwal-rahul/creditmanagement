<?php

$con=mysqli_connect("localhost","id9888987_grip","grip123","id9888987_grip");
//mysqli_select_db($con,"users");
$amt=intval($_POST['amount']);
$femail=$_POST['femail'];

$sql = "SELECT * FROM users where email="."'".$_POST['femail']."'";
$result2 = $con->query($sql);
foreach ($result2 as $r){
$fuser=$r;
}
$sql = "SELECT * FROM users where email="."'".$_POST['email']."'";
$result = $con->query($sql);
foreach ($result as $r1){
$user=$r1;
}

if($result&&(mysqli_num_rows($result) > 0)&&(0<=($user['current_credit']-$amt))){
    $new_cur=$user['current_credit']+$amt;
    $new_cur2=$fuser['current_credit']-$amt;
    $sql="update users set current_credit="."'".$new_cur."'"."where email="."'".$_POST['email']."'";
    $con->query($sql);
    $sql="update users set current_credit="."'".$new_cur2."'"."where email="."'".$_POST['femail']."'";
    $con->query($sql);
    $sql="insert into transaction values("."'".$_POST['femail']."',"."'".$_POST['email']."',".$amt.")";
    $con->query($sql);
    echo "<script> window.location.href='show_all_users.php'</script>";
	
	}
else if($result&&(mysqli_num_rows($result) > 0)&&(0>($user['current_credit']-$_POST['amount']))){
	echo "<script> alert('User don't have enough credit');window.location.href='show_all_users.php'</script>";
}
else {
	echo "<script> alert('Email id does not exist in our system please try again');window.location.href='show_all_users.php'</script>";
	
}

?>
