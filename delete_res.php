<!doctype html>
<html>
<head>
  <title>OurPlate</title>
  <meta charset="utf-8">
</head>
<body>
  <h1>OurPlate</h1>
  <p><strong>OurPlate</strong>는 자신이 알고있는 맛집을 자유롭게 등록하고 사용자끼리 평가를 공유하는 서비스 입니다.</p>
  <br>
  <ol><strong><u>메뉴</u></strong>
  <li><a href="insert_res.php">식당등록</a></li>
  <li><a href="view_res.php">식당조회</a></li>
  <li><a href="delete_res.php">식당삭제</a></li>
  <li><a href="write_review.php">리뷰등록</a></li>
  <li><a href="view_review.php">리뷰조회</a></li>
  <li><a href="logout.php">로그아웃&홈으로</a></li>
  <ol>
  <br>
    <?php
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
    $sql = "SELECT name, address, contact, rate FROM restaurant";
    $result = mysqli_query($conn, $sql);
    if($result === false){
      header("Content-Type: text/html; charset=UTF-8");
      echo "<script>alert('조회에 실패했습니다.');";
      echo "window.location.replace('menu.php');</script>";
      exit;
    } else {
      while($row = mysqli_fetch_array($result)){
        echo "식당 이름: ".$row['name']."\t";
        echo "\t식당 주소: ".$row['address']."\t";
        echo "\t식당 연락처: ".$row['contact']."\t";
        echo "\t별점: ".$row['rate'];
        echo "</br>";
      }
    }
    ?>
    <br>
    <form action="input_delete_res.php" method="POST">
      <h2>식당 삭제</h2>
      <p><input type="text" name="contact" placeholder="삭제할 식당의 연락처"></p>
      <p><input type="submit"></p>
    </form>
</body>
</html>
