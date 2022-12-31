<?php
session_start();
$user_id = $_SESSION['user_id'];
if($_POST['in_contact']==='' || $_POST['in_name']==='' || $_POST['in_address']===''){
  header("Content-Type: text/html; charset=UTF-8");
  echo "<script>alert('등록에 실패했습니다. 빠뜨리신 부분이 있습니다.');";
  echo "window.location.replace('insert_res.php');</script>";
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
  echo "window.location.replace('insert_res.php');</script>";
  exit;
}
$sql = "
  INSERT INTO restaurant
  (contact, name,  rate, address, id)
  VALUES (
    '{$_POST['in_contact']}',
    '{$_POST['in_name']}',
    NULL,
    '{$_POST['in_address']}',
    '$user_id'
    )
";
$result = mysqli_query($conn, $sql);
if($result === false){
  header("Content-Type: text/html; charset=UTF-8");
  echo "<script>alert('등록에 실패했습니다. 이미 있는 식당입니다.');";
  echo "window.location.replace('index.php');</script>";
  exit;
} else {
  echo "<script>alert('등록에 성공했습니다')</script>";
}
?>
<meta http-equiv="refresh" content="0;url=insert_res.php" />
