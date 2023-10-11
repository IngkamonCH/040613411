<?php
$keyword = $_GET["keyword"];
$conn = mysqli_connect("localhost", "root", "", "blueshop");

// if ($conn) {
// mysql_select_db("blueshop");
// mysql_query("SET NAMES utf8");
// } else {
// echo mysql_errno();
// }
$sql = "SELECT * FROM member WHERE username LIKE'%$keyword%'";
$objQuery = mysqli_query($conn,$sql);
?>
<table border="1">
<?php while($row = mysqli_fetch_array($objQuery)): ?>
<tr>
<td><a href="formno2.php?pid=<?php echo $row["username"]?>"><?php echo
$row["username"]?></a></td>
<td><img src="img/<?php echo $row["username"] ?>.jpg" width="100"></td>
<td><?php echo $row["name"]?></td>
<td><?php echo $row["address"] ?></td>
<td><?php echo $row["mobile"]?></td>
<td><?php echo $row["email"]?></td>

</tr>
<?php endwhile;?>
</table>