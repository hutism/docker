<?php
if(isset($_POST['login'])){
$username = $_POST['username'];
$password = $_POST['password'];
$con = mysqli_connect('localhost','nit','docker123!@#','sample');
$result = mysqli_query($con, "SELECT*FROM users WHERE username='$username' AND
password='$password'");
if(mysqli_num_rows($result) == 0)
echo "<script>alert('Invalid username or password');</script>";
else{
session_start();
$_SESSION['username'] = $username;
}
}
else {
session_start();
session_destroy();
}
?>
<meta http-equiv='refresh' content='0; url=index.php'>
