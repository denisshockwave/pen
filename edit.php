
<?php
session_start();
$username="";
$password="";

include 'database/config.php';
if(isset($_POST['submit'])){
$username=$_POST['username'];
$password=$_POST['password'];
$key=$_POST['id'];
print_r($_POST);
echo $username;
mysql_query("UPDATE  users SET username='$username' and password='$password' where id='$key'");

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

if(isset($_GET['id'])){
  $id=$_GET['id'];
$res=  mysql_query("select * from users where id='$id'");
$res=mysql_fetch_assoc($res);
$username=$res['username'];
$password=$res['password'];

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
<div class="col-md-6 col-md-offset-3" style="margin-top:10%;position:relative;">
<div class="panel panel-default">
<div class="panel-heading">
Modify user: You are logged in as <span class="badge badge-info"><?php echo $_SESSION['user'];  ?></span><span> <a href="logout.php">Logout</a>
</div>
<div class="panel-body">
<form action="" method="post">
  <input type="hidden" name="id" value="<?php if(isset($_GET['id'])){echo $_GET['id'];} ?>">
<label>Username</label>
<input type="text" name="username" value="<?php echo $username;  ?>" class="form-control">
<label>Password</label>
<input type="text" name="password" value="<?php echo $password;  ?>" class="form-control">
<br>
<input type="submit" name="submit" value="Modify">
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
