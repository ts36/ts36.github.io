<?php
$serverName = "travel98.database.windows.net";  // 填入您的 SQL Server 伺服器名稱
$database = "travel";
$uid = "tsouadmin";         // 填入您的 SQL Server 使用者名稱
$pass = "Qq0989260287";         // 填入您的 SQL Server 密碼


// 創建連接
$conn = new mysqli($servername, $username, $password, $dbname);

// 檢查連接是否成功
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// 獲取註冊表單提交的數據
$username = $_POST["username"];
$password = password_hash($_POST["password"], PASSWORD_DEFAULT);  // 對密碼進行哈希處理
$email = $_POST["email"];

// 插入數據到 users 表中
$sql = "INSERT INTO users (username, password, email) VALUES ('$username', '$password', '$email')";

if ($conn->query($sql) === TRUE) {
    echo "註冊成功";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// 關閉連接
$conn->close();
?>
