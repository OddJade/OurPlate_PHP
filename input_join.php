<?php
if($_POST['id']===NULL || $_POST['password']===NULL || $_POST['name']===NULL){
  header("Content-Type: text/html; charset=UTF-8");
  echo "<script>alert('가입에 실패했습니다. 빠뜨리신 부분이 있습니다.');";
  echo "window.location.replace('index.php');</script>";
  exit;
}
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
  INSERT INTO member
  (id, password, name)
  VALUES (
    '{$_POST['id']}',
    '{$_POST['password']}',
    '{$_POST['name']}'
    )
";
$result = mysqli_query($conn, $sql);
if($result === false){
  header("Content-Type: text/html; charset=UTF-8");
  echo "<script>alert('가입에 실패했습니다. 이미 있는 계정입니다.');";
  echo "window.location.replace('index.php');</script>";
  exit;
} else {
  echo "<script>alert('회원 가입에 성공했습니다. 홈페이지로 돌아가 로그인을 해주세요')</script>";
}
?>
<meta http-equiv="refresh" content="0;url=index.php" />
