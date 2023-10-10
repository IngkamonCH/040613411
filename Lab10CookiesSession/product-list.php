<?php
include "connect.php";
session_start();
// ตรวจสอบว่ามีชื่อใน session หรือไม่ หากไม่มีให้ไปหน้า login อัตโนมัติ
if (empty($_SESSION["username"])) {
    header("location: login-form.php");
}


?>

<html>

<head>
    <meta charset="utf-8">
</head>

<body>
    <?php
    //Normal user
    if ($_SESSION["username"] == "baramee") {
        $stmt = $pdo->prepare("SELECT * FROM orders where username='baramee'");
        $stmt->execute();

        while ($row = $stmt->fetch()) {
            echo "หมายเลขการสั่งซื่อ: " . $row["ord_id"] . "<br>";
            echo "ชื่อผู้ใช้: " . $row["username"] . "  <br>";
            echo "วันที่สั่งซื้อ: " . $row["ord_date"] . "<br>";
            echo "สถานะ: " . $row["status"] . " <br>";
            echo "<hr>\n";
        }

    }
    //Admin
    if ($_SESSION["username"] == "somsak") {
        $stmt = $pdo->prepare("SELECT * FROM orders");
        $stmt->execute();

        while ($row = $stmt->fetch()) {
            echo "หมายเลขการสั่งซื่อ: " . $row["ord_id"] . "<br>";
            echo "ชื่อผู้ใช้: " . $row["username"] . "  <br>";
            echo "วันที่สั่งซื้อ: " . $row["ord_date"] . "<br>";
            echo "สถานะ: " . $row["status"] . " <br>";
            echo "<hr>\n";
        }
    } else {
        $stmt = $pdo->prepare("SELECT * FROM product");
        $stmt->execute();

        while ($row = $stmt->fetch()) {
            echo "ชื่อสินค้า: " . $row["pname"] . "<br>";
            echo "ราคา: " . $row["price"] . " บาท <br>";
            echo "<hr>\n";
        }

    }




    ?>
</body>

</html>