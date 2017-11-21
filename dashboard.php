
<?php
session_start();
include 'database/config.php';
if(isset($_GET['key'])){
$key=$_GET['key'];
mysql_query("DELETE FROM users where id='$key'");

}
if(!isset($_SESSION['user']))
{

header("Location:login.php");
}


// if(isset($_GET['submit'])){
//   $search=$_GET['search']
// $sql="SELECT * from users where username='$search'";]
// $res=mysql_query($sql);
// $data=mysql_fetch_array($res);
// }
 ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>PENETRATION TESTING</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

  </head>
  <body style="background:#eee;">

<div class="container">
  <div class="row">
    <div class="col-md-3" style="margin-top:10%;position:relative;">
<div class="panel panel-default">
<div class="panel-heading">

</div>
<div class="panel-body">
<table class="table table-responsive">
<tr>

<th>
  Username</th>
  <th> <form method="POST" action=""><label>Search username</label>
<Input style="width:150px;"  type="text" name="username" placeholder="Search Username">
    <input style="width:150px;"  class="btn btn-primary" type="submit" name="search" value="search">
   </form> </td>
</tr>
<tr>


</tr>

</table>
</div>
</div>
</div>

    <div class="col-md-6" style="margin-top:10%;position:relative;">
<div class="panel panel-default">
<div class="panel-heading">
My users: You are logged in as <span class="badge badge-info"><?php echo $_SESSION['user'];  ?></span><span> <a href="logout.php">Logout</a>
</div>
<div class="panel-body">
<table class="table table-responsive table-striped">

<tr>
<td>#</td>
<td>Username</td>
<td>Password</td>
</tr>
<?php
$res="";

if(isset($_POST['search'])){

  $username=$_POST['username'];


  $res=mysql_query("select * from users where username='$username'");
}else{
$res=mysql_query("select * from users");
}

$count=0;
while ($row = mysql_fetch_array($res,MYSQL_ASSOC))
{
  $count++;
 ?>
<tr>
  <td><?php echo $count;  ?></td>
<td><?php echo $row['username'];  ?></td>
<td><?php echo $row['password'];  ?></td>
<td><a class="btn " href="edit.php?id=<?php echo $row['id']; ?>">EDIT</a>
<td><a class="btn " href="dashboard.php?key=<?php echo $row['id']; ?>">Delete</a

</tr>
<?php

}

 ?>
</table>
</div>

  </div>

</div>
</div>

</div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
