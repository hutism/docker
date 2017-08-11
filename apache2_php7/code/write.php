<?php
require_once("./file.php");
session_start();
if(isset($_POST['write'])){
$username = $_POST['username'];
$title = $_POST['title'];
$comment = $_POST['comment'];
$date = date("Y-m-d");
$file = NULL;
if(is_uploaded_file($_FILES['upfile']['tmp_name']))
$file = file_upload($_FILES['upfile']);
$con = mysqli_connect('localhost','nit','docker123!@#','sample');
$result = mysqli_query($con, "INSERT INTO board (user,title,comment,file,date) VALUES
('$username','$title','$comment','$file','$date')");
if(!$result)
echo "<script>alert('fail save comment');</script>";
?>
<meta http-equiv='refresh' content='0; url=index.php'>
<?php
}
else{
?>
<form action="" method="post" enctype="multipart/form-data">
<table>
<tr>
<td>subject</td>
<td width="350"><input type="text" name="title" required/></td>
</tr>
<tr>
<td>name</td>
<?php
echo "<td><input type='text' name='username' value=".$_SESSION['username'].
" readonly/></td>"
?>
</tr>
<tr>
<td>content</td>
<td><textarea cols="80" rows="15" name="comment" wrap="off" required>
</textarea></td>
</tr>
<tr>
<td>attachment</td>
<td><input type="file" name="upfile"></td>
</tr>
</table>
<input type="submit" name="write" value="save" />
<input type="reset" value="reset" />
</form>
<?php
}
?>
