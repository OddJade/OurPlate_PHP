<?php
session_start();
$user_id = $_SESSION['user_id'];
if($_POST['contact']==='' || $_POST['rate']===''){
  header("Content-Type: text/html; charset=UTF-8");
  echo "<script>alert('등록에 실패했습니다. 빠뜨리신 부분이 있습니다.');";
  echo "window.location.replace('write_review.php');</script>";
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
  echo "window.location.replace('menu.php');</script>";
  exit;
}
$sql = "
  INSERT INTO review
  (contact, title, rate, body, id)
  VALUES (
    '{$_POST['contact']}',
    '{$_POST['title']}',
    '{$_POST['rate']}',
    '{$_POST['body']}',
    '$user_id'
    )
";
$result = mysqli_query($conn, $sql);
if($result === false){
  header("Content-Type: text/html; charset=UTF-8");
  echo "<script>alert('등록에 실패했습니다. 다시 시도해 주세요.');";
  echo "window.location.replace('write_review.php');</script>";
  exit;
} else {
  $contact = $_POST['contact'];
  $sql = "SELECT rate FROM review WHERE contact = '$contact'";
  $result = mysqli_query($conn, $sql);
  $sum = 0.0;
  $len = 0;
  while($row = mysqli_fetch_array($result)){
    $sum += (float)$row['rate'];
    $len++;
  }
  $avg = $sum / $len;
  $sql = "UPDATE restaurant SET rate='$avg' WHERE contact = '$contact'";
  mysqli_query($conn, $sql);
  echo "<script>alert('리뷰 등록에 성공했습니다.')</script>";
}
?>
<meta http-equiv="refresh" content="0;url=menu.php" />
