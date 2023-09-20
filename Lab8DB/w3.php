<?php include "connect.php"; ?>
<html>

<body>
<?php
 $stmt = $pdo->prepare("SELECT * FROM member");
 $stmt->execute();
 while ($row = $stmt->fetch()) {
 echo "ชื่อสมาชิก: " . $row["name"] . "<br>";
 echo "ที่อยู่: " . $row["address"] . "<br>";
 echo "อีเมลล์: " . $row["email"] . "<br>";
 echo "<img src='member_photo/" .$row["username"].".jpg' width='100'><br><hr>";
 } ?>
</body>