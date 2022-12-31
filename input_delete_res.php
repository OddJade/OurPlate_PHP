<?php
session_start();
$user_id = $_SESSION['user_id'];
if($_POST['contact']==NULL){
  header("Content-Type: text/html; charset=UTF-8");
  echo "<script>alert('삭제에 실패했습니다. 빠뜨리신 부분이 있습니다.');";
  echo "window.location.replace('view_res.php');</script>";
  exit;
}
$contact = $_POST['contact'];
$conn = mysqli_connect(
  'localhost',
  'root',
  '1111',
  'restaurant_service');
if(mysqli_connect_errno()){
  header("Content-Type: text/html; charset=UTF-8");
  echo "<script>alert('DB서버와 연결에 실패했습니다.');";
  echo "window.location.replace('view_res.php');</script>";
  exit;
}
$sql = "SELECT * FROM restaurant WHERE contact = '$contact'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
if($result === false){
  header("Content-Type: text/html; charset=UTF-8");
  echo "<script>alert('삭제에 실패했습니다. 없는 식당입니다.');";
  echo "window.location.replace('menu.php');</script>";
  exit;
} else if($row['id'] != $user_id){
  header("Content-Type: text/html; charset=UTF-8");
  echo "<script>alert('삭제에 실패했습니다. 본인이 등록한 식당만 삭제할 수 있습니다.');";
  echo "window.location.replace('menu.php');</script>";
} else{
  $sql = "DELETE FROM restaurant WHERE contact = '$contact'";
  $result = mysqli_query($conn, $sql);
  if($result == false){
    header("Content-Type: text/html; charset=UTF-8");
    echo "<script>alert('삭제에 실패했습니다. 다시 시도해 주세요');";
    echo "window.location.replace('menu.php');</script>";
    exit;
  }else {
    echo "<script>alert('삭제에 성공했습니다')</script>";
  }
}
?>
<meta http-equiv="refresh" content="0;url=view_res.php" />
