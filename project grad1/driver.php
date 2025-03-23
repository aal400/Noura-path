<?php
// إعدادات قاعدة البيانات
$servername = "localhost";
$username = "root"; // اسم المستخدم لقاعدة البيانات
$password = ""; // كلمة مرور قاعدة البيانات
$dbname = "your_database"; // اسم قاعدة البيانات

// إنشاء اتصال بقاعدة البيانات
$conn = new mysqli($servername, $username, $password, $dbname);

// التحقق من الاتصال
if ($conn->connect_error) {
    die("فشل الاتصال: " . $conn->connect_error);
}

// التحقق من إرسال النموذج
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    // تأمين البيانات
    $user = $conn->real_escape_string($user);
    $pass = $conn->real_escape_string($pass);

    // استعلام للتحقق من بيانات الاعتماد
    $sql = "SELECT * FROM users WHERE username='$user' AND password='$pass'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // نجاح تسجيل الدخول
        echo "مرحبا بك، " . $user;
        // هنا يمكنك إعادة توجيه المستخدم إلى الصفحة الرئيسية
        header("Location: homepage.php");
        exit();
    } else {
        // فشل تسجيل الدخول
        echo "اسم المستخدم أو كلمة المرور غير صحيحة.";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تسجيل الدخول</title>
</head>
<body>
    <h1>تسجيل الدخول</h1>
    <form method="post" action="">
        <label for="username">اسم المستخدم:</label>
        <input type="text" name="username" id="username" required>
        <br>
        <label for="password">كلمة المرور:</label>
        <input type="password" name="password" id="password" required>
        <br>
        <input type="submit" value="تسجيل الدخول">
    </form>
</body>
</html>