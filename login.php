<?php


include 'database/config.php';

$status="";
function loginUser($username,$password)
{
  global $dbcon;
  $query="select * from users where username='$username' and password='$password'";
  $res=mysql_query($query);
  $data=mysql_fetch_array($res);

  if(!$data)
  {
    return false;
  }
  else
  {
    return $data;
  }

}

if(isset($_POST['submit']))
{
  $username=$_POST['username'];
  $password=$_POST['password'];
  $data=loginUser($username,$password);

  if($data)
  {
      session_start();
    $_SESSION['user']=$data['username'];
    $_SESSION['id']=$data['id'];
    header("Location: dashboard.php");
  }else
  {
    $status="Username does not exist";

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
  Login  to your account
</div>
<div class="panel-body">
<form  action="" method="POST">
  <?php
    if($status){


   ?>
  <div class="alert alert-danger">
    <?php echo $status; ?>
  </div>
   <?php
}
    ?>
    <br>
<label>Username</label>
<input type="text" value="" name="username" class="form-control">
<label>Password</label>
<input type="password" value=""  name="password" class="form-control">
<br>
<input type="submit" name="submit" value="Log in" class="btn btn-default">
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
