<!DOCTYPE html>
<html lang="en">
<?php
include "includes/db.php";
?>
<head>
    <meta charset="UTF-8">
    <title>login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="css/login.css" rel="stylesheet">
</head>
<body>
<div class="login-page">
<div class="form">
    <form action="opertions/login.php" method="post" class="form-group register-form">
        <img   src="images/logo.png" width="110px">
        <label id="logo" for="logo" class="container " >وزارة الداخلية</label>
        <input class="form-control" type="text"  placeholder="الاٍيميل">
        <input class="form-control" placeholder="كلمةالمرور">
        <button type="button" class="btn btn-primary" name="login-submit" id="login-submit">تسجيل الدخول</button>
    </form>
    </div>
    </div>
</body>
</html>