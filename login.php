<!DOCTYPE html>
<?php session_start(); ?>
<html>
    <head>
        <meta charset="utf-8" />
        <title>OurPlate</title>
    </head>
    <body>
        <h1><a href="index.php">OurPlate</a></h1>
        <p><strong>OurPlate</strong>는 자신이 알고있는 맛집을 자유롭게 등록하고 사용자끼리 평가를 공유하는 서비스 입니다.</p>
        <br>
        <h2>로그인</h2>
        <?php if(!isset($_SESSION['user_id']) || !isset($_SESSION['user_name'])) { ?>
        <form method="POST" action="login_success.php">
            <p>아이디: <input type="text" name="user_id" /></p>
            <p>비밀번호: <input type="password" name="user_pw" /></p>
            <p><input type="submit" value="로그인" /></p>
        </form>
        <?php } else {
            $user_id = $_SESSION['user_id'];
            $user_name = $_SESSION['user_name'];
            echo "<p><strong>$user_name</strong>($user_id)님은 이미 로그인하고 있습니다. ";
            echo "<a href=\"index.php\">[돌아가기]</a> ";
            echo "<a href=\"logout.php\">[로그아웃]</a></p>";
        } ?>
    </body>
</html>
