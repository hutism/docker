<?php
require_once("./file.php");
if(!isset($_GET["id"])){
echo "<script>alert('Invalid access page');</script>";
echo "<meta http-equiv='refresh' content='0; url=index.php'>";
}
$id = $_GET['id'];
$con = mysqli_connect('localhost','nit','docker123!@#','sample');
$result = mysqli_query($con, "SELECT * FROM board WHERE id=".$id);
if(mysqli_num_rows($result) == 0){
echo "<script>alert('Invalid access page');</script>";
echo "<meta http-equiv='refresh' content='0; url=index.php'>";
}
$row = mysqli_fetch_array($result)
?>
<html>
<body>
<table width="800" border="1px" cellpadding="2" style="border-collapse: collapse">
<tr>
<td align="center">subject</td>
<td><?=$row[title]?></td>
</tr>
<tr>
<td align="center">name</td>
<td><?=$row[user]?></td>
</tr>
<tr>
<td align="center">date</td>
<td><?=$row[date]?></td>
</tr>
<tr>
<td align="center">content</td>
<td><?=str_replace("\r\n", "<br/>", $row[comment])?></td>
</tr>
<tr>
<td align="center">attachment</td>
<td>
<?php
echo "<a href='./download.php?file=$row[file]'>".substr(strstr($row[file], '@'),1)."</a>";
?>
</td>
</tr>
</table>
<input type="button" value="back" onclick="location.href='index.php'">
</body>
</html>
