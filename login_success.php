<meta charset="utf-8">
<?php
    if ( !isset($_POST['user_id']) || !isset($_POST['user_pw']) ) {
        header("Content-Type: text/html; charset=UTF-8");
        echo "<script>alert('아이디 또는 비밀번호가 빠졌거나 잘못된 접근입니다.');";
        echo "window.location.replace('login.php');</script>";
        exit;
    }
    $user_id = $_POST['user_id'];
    $user_pw = $_POST['user_pw'];
    $conn = mysqli_connect(
      'localhost',
      'root',
      '1111',
      'restaurant_service');
      if(mysqli_connect_errno()){
        header("Content-Type: text/html; charset=UTF-8");
        echo "<script>alert('DB서버와 연결에 실패했습니다.');";
        echo "window.location.replace('index.php');</script>";
        exit;
      }
    $sql = "
    SELECT id, name
    FROM member
    WHERE id = '$user_id' AND password = '$user_pw'";
    $result = mysqli_query($conn, $sql);
    if( $result === false ) {
        header("Content-Type: text/html; charset=UTF-8");
        echo "<script>alert('아이디 또는 비밀번호가 잘못되었습니다.');";
        echo "window.location.replace('login.php');</script>";
        exit;
    }
    /* If success */
    $row = mysqli_fetch_array($result);
    session_start();
    $_SESSION['user_id'] = $user_id;
    $_SESSION['user_name'] = $row['name'];
    echo "<script>alert('로그인 되었습니다.')</script>";
?>
<meta http-equiv="refresh" content="0;url=menu.php" />
