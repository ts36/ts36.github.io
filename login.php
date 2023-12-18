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

// 獲取登入表單提交的數據
$username = $_POST["username"];
$password = $_POST["password"];

// 從 users 表中檢索用戶信息
$sql = "SELECT * FROM users WHERE username='$username'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // 有匹配的用戶名，檢查密碼
    $row = $result->fetch_assoc();
    if (password_verify($password, $row["password"])) {
        echo "登入成功";
    } else {
        echo "密碼錯誤";
    }
} else {
    echo "用戶不存在";
}

// 關閉連接
$conn->close();
?>
