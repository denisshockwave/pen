<?php
include 'database/config.php';
$error="";
$userExists="";
$passExists="";
$status="";
function checkExists($column,$data)
{
  global $dbcon ;
  $query="SELECT username from users where ".$column."='$data'";

  $result=mysql_query($query);
  $count=mysql_num_rows($result);

  if($count !=0)
    return True;
  else
    return false;

}
if ( isset($_POST['submit']))
{

// $username=strip_tags(trim(htmlspecialchars($_POST['username'])))
// $password=strip_tags(trim(htmlspecialchars($_POST['password'])))
$username=$_POST['username'];
$password=$_POST['password'];
if(checkExists("username",$username)) //check if username Exists
  $userExists=$username." Exists";
if(checkExists("password",$password)) //check if password exists
  $passExists=$password." Exists";

if(!$passExists && !$userExists)
{
  $query="INSERT into users (username,password) values('$username','$password')";
  $result=mysql_query($query);
  if($result)
  {
    $status="Successful registration.Please login in to access your dashboard and enjoy our services";
  }
  else{
    $status="Something went wrong with the Connection";
  }
}



}

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
    <div class="col-md-4 col-md-offset-4" style="margin-top:10%;position:relative;">
<div class="panel panel-default">
<div class="panel-heading">
Register your account  <a href="login.php"> Login</a>
</div>
<div class="panel-body">
<form  action="" method="POST">
  <?php
    if($status){


   ?>
  <div class="alert alert-success">
    <?php echo $status; ?>
  </div>
   <?php
}
    ?>
    <br>
<label>Username</label>
<br>
<span style="color:red"><?php echo $userExists; ?></span>
<input type="text"  name="username" class="form-control">
<label>Password</label><br>
<span style="color:red"><?php echo $passExists;  ?></span>
<input type="password"  name="password" class="form-control">
<br>
<input type="submit" name="submit" class="btn btn-default">
</form>

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
