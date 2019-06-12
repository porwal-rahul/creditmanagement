<?php

$con=mysqli_connect("localhost","id9888987_grip","grip123","id9888987_grip");
//mysqli_select_db($con,"users");

$email="'".$_POST['userinfo']."'";

$sql = "SELECT * FROM users where email=".$email."";
$result = $con->query($sql);
foreach ($result as $r){
$user=$r;
}

?>
<!DOCTYPE html>
<html>
<title> Book Your </title>
<head>
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
  margin:10px;
}
table {
  border-collapse: collapse;
  
}

table, th, td {
  border: 1px solid black;
  padding: 15px;
  text-align: left;
}
label {
  padding: 15px;
  display: inline-block;
  background-color: #4CAF50;
  cursor: pointer;
  color: white;
  border: none;
  border-radius: 4px;
 // padding-left:10px;
}

label:hover {
 background-color: #45a049;
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
  margin-left:150px;
}

input[type=submit]:hover {
  background-color: #45a049;
}


.container {
  border-style:outset;
  border-width: 1px;
  background-color: white;
  padding-left: 10px;
  padding-right: 10px;
  padding-top: 25px;
  margin-left:300px;
  float:left;
}
.container2 {
  border-style:outset;
  border-width: 1px;
  background-color: white;
  padding-left: 50px;
  padding-right: 50px;
  padding-top: 0px;
  margin-left:300px;
  margin-top:30px;
  
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
.row {
  
  display: table;
  clear: both;
  margin:10px
}


@media screen and (max-width: 600px) {
  .col-25, .col-75, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
}


.chip img {
  float: left;
  margin: 0 10px 0 -25px;
  height: 150px;
  width: 150px;
  border-radius: 50%;
  margin-left:150px;
  margin-bottom: 20px;
}

#overlay {
  position: fixed;
  display: none;
  width: 100%;
  height: 100%;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: rgba(0,0,0,0.5);
  z-index: 2;
  cursor: pointer;
}

#text{
  position: absolute;
  top: 50%;
  left: 50%;
  font-size: 30px;
  color: white;
  transform: translate(-50%,-50%);
  -ms-transform: translate(-50%,-50%);
}
</style>
</head>
<body>


<div class= 'container' >

  <form action='show_all_users.php'>
 <div class='row' > 
    <div class='chip'>
  <img src='img_avatar.png' alt='Person' width='100' height='100'>
  
   </div>
   <div class='row'>
     User name: <?php echo $user['name'] ;
     ?>
     
   </div>
   <div class='row'>
     Email ID: <?php echo $user['email'];?>
     
   </div>
   <div class="row">
     Address: <?php echo $user['address'];?>
     
   </div>
   <div class="row">
     Curent Credit: <?php echo $user['current_credit'];?>
     
   </div>
   <div class="row">
      <label onclick="on()"> Tranfer credit</label> <input type="submit"  value="View all users" >
   </div>
    </form>

</div>

    
 

</div>
</div>
<br>

<div class='container2'>
    <h4>Transaction History</h4>
<table>
        <thead>
            <tr>
                <td>From</td>
                <td>TO</td>
                <td>Credit</td>
            </tr>
        </thead>
        <tbody >
        <?php
            $sql = "SELECT * FROM transaction where from_user="."'".$user['email']."'";
            $result = $con->query($sql);
            
            if($result&&mysqli_num_rows($result) > 0 ){
                while($row = mysqli_fetch_array($result)) {
                ?>
                    <tr>
                        <td><?php echo $row['from_user']?></td>
                        <td><?php echo $row['to']?></td>
                        <td><?php echo $row['credit']?></td>
                    </tr>
    
                <?php
                }
                
            }
            ?>
            </tbody>
            </table>

</div>
<div id="overlay" >
  <div id="text">
  	<form action="transfer.php" method="post">
  		Transfer credit from:
  		<input type="text" name="femail" value="<?php echo $_POST['userinfo']?>" readonly >
  		Transfer credit to:
  		<input type="text" name="email" placeholder="Email id" >
  		Credit :
  		<input type="text"  name="amount" placeholder="Amount to transfer">
  		<input type="submit"  value="Transfer" >
  		<span onclick="off()"> close</span> 
  	</form>
  </div>
</div>
<script>
function on() {
  document.getElementById("overlay").style.display = "block";
}

function off() {
  document.getElementById("overlay").style.display = "none";
}
</script>
</body>
</html>
