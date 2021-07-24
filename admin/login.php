<?php 
    include '../classes/adminlogin.php'
?>
<?php 
    $login = new adminlogin();
   if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $adminEmail = $_POST['adminEmail'];
        $adminPassword = md5($_POST['adminPassword']);
        $login_check = $login->login_admin($adminEmail,$adminPassword);
   }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        Đăng nhập
    </title>
    <link rel="shortcut icon" href="./images/logo-mb.png" type="image/png">
    <!-- GOOGLE FONT -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
    <!-- login css  -->
    <link rel="stylesheet" href="css/login.css">
</head>

<body>
    <div class="main">
        <form action="login.php" method="POST" class="form" id="form-1">
            <h3 class="heading">Đăng nhập</h3>
            <span>
                <?php 
                if(isset($login_check))
                {
                    echo $login_check;
                }
                ?>
            </span>
            <div class="spacer"></div>
            <div class="form-group">
                <label for="email" class="form-label">Email</label>
                <input id="email" name="adminEmail" type="text" placeholder="VD: email@domain.com" class="form-control">
                <span class="form-message"></span>
            </div>
            <div class="form-group">
                <label for="password" class="form-label">Mật khẩu</label>
                <input id="password" name="adminPassword" type="password" placeholder="Nhập mật khẩu"
                    class="form-control">
                <span class="form-message"></span>
            </div>
            <input class="form-submit" name="login" type="submit" value="Đăng nhập">
        </form>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <!-- APP JS -->
    <script src="./js/app.js"></script>

</body>

</html>