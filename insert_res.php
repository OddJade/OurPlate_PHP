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
  <form action="input_insert_res.php" method="POST">
    <h2>식당 등록</h2>
    <p><input type="text" name="in_name" placeholder="식당 이름"></p>
    <p><textarea name="in_address" placeholder="식당 주소"></textarea></p>
    <p><input type="text" name="in_contact" placeholder="식당 연락"></p>
    <p><input type="submit" value="등록"></p>
  </form>
</body>
</html>
