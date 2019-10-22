
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>بلاغ جديد</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/request_form.css" rel="stylesheet">

</head>
<body>
<div class="request_form">
<form   action="server.php "   method="POST">
    <h2>تسجيل فردجديد</h2>
    <input class="form-control" type="text" name="id_game" id="id_game" placeholder="رقم الهوية"><br>
    <input class="form-control" type="text" name="name" id="name" placeholder="الاُسم"><br>
    <input class="form-control" type="text" name="email" id="email" placeholder="الايميل"><br>
    <input class="form-control" type="text" name="car_color" id="car_color" placeholder=""><br>
    <input class="form-control" type="text_" name="person_desc" id="person_desc" placeholder=""><br>
    <input class="form-control" type="text" name="req_desc" id="req_desc" placeholder="تفاصيل البلاغ"><br>
    <input class="form-control" type="text" name="code_no" id="code_no" placeholder="كود النداء"><br>
    <select  name="req_st" id="req_st" form-control">
        <option selected>عاجل جدا</option>
        <option>عاجل</option>
        <option>عادى</option>
    </select>
    <button id="req_sub" name="submit" type="submit" class="btn btn-primary">ارسال البلاغ</button>

</form>
</div>



<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>