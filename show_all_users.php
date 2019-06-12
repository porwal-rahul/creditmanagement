<?php

/*$connection = new Mongo(getenv("PROD_MONGODB"));
$database = $connection->selectDB('cm');
$collection = $database->selectCollection('users');
$user=$collection->find(); 
-*/
$con=mysqli_connect("localhost","id9888987_grip","grip123","id9888987_grip");
//mysqli_select_db($con,"users");
$sql = "SELECT email,name FROM users";
$user = $con->query($sql);
?>
<!DOCTYPE html>
<html>
<title> Book Your </title>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
  box-sizing: border-box;
}

input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}

label {
  padding: 12px 12px 12px 0;
  display: inline-block;
}

input[type=submit] {
  background-color: #4CAF50;
  color: white;
  padding: 15px;
  margin: 150px
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: right;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.block {
  border-style:ridge;
  border-width: 2px;
  background-color: white;
  padding-left: 10px;
  padding-right: 20px;
  padding-top: 25px;
  margin :20px;
  padding-bottom:50px;
  float:left;
}

.container {
  border-style:outset;
  border-width: 1px;
  
  background-color: white;
  padding-left: 50px;
  padding-right: 50px;
  padding-top: 25px;
  
  float:left;
}

.col-25 {
  float: left;
  width: 25%;
  margin-top: 6px;
}

.col-75 {
  float: left;
  width: 75%;
  margin-top: 6px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
  float: left;
}


@media screen and (max-width: 600px) {
  .col-25, .col-75, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
}
.chip {
  display: inline-block;
  padding: 0 25px;
  height: 50px;
  width:270px;
  font-size: 16px;
  line-height: 50px;
  border-radius: 25px;
  background-color: #f1f1f1;
  
}

.chip img {
  float: left;
  margin: 0 10px 0 -25px;
  height: 50px;
  width: 50px;
  border-radius: 50%;
}
</style>
</head>
<body>


<div class="container">

<?php
foreach ($user as $u){
?>

<div class="block">
	<div class="row" > 
		<div class="chip">
	  		<img src="img_avatar.png" alt="Person" width="96" height="96">
	  		<?php echo $u['name'];?>
	  		<div class="row">
	  			<form action="view_user_info.php" method="post">
	  			<input type="hidden" name="userinfo" value='<?php echo $u['email'];?>'>
	  			<input type="submit"  value="View user" >
	  			</form> 
	  		</div>
	  	</div>	
	</div>
</div>  

<?php
 } ?>

    
 


</div>
</body>
</html>

