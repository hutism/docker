<html>

<body>

<?php

session_start();

if(!isset($_SESSION['username'])){

?>

<form action="login.php" method="post">

Username : <input type="text" name="username" size="10" required/>

Password : <input type="password" name="password" size="10" required/>

<input type="submit" name="login" value="Login" />

</form>

<?php

}

else{

echo "Welcome ".$_SESSION['username'];

?>

<input type="button" value="Logout" onclick="location.href='login.php' ">

<input type="button" value="Write" onclick="location.href='write.php' ">

<?php

}

?>

<br/><br/>

<table width="580" border="1px" cellpadding="2" style="border-collapse: collapse">

<thead>

<tr align="center">

<th width="50">number</th>

<th width="400">title</th>

<th width="80">name</th>

<th width="90">date</th>

</tr>

</thead>

<tbody>

<?php

$con = mysqli_connect('localhost','nit','docker123!@#','sample');

$result = mysqli_query($con, "SELECT * FROM board ORDER BY id DESC");

while ($row = mysqli_fetch_array($result)) {

?>

<tr align="center">

<td><?=$row[id]?></td>

<td>

<a href="view.php?id=<?=$row[id]?>">

<?=$row[title]?>

</a>

</td>

<td><?=$row[user]?></td>

<td><?=$row[date]?></td>

</tr>

<?php

}

?>

</tbody>

</table>

</body>

</html>
