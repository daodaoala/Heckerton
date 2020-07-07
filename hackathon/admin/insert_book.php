<?
  //이전 페이지의 폼으로 부터 전달받은 데이터 
  $title = $_GET['title'];
  $writer = $_GET['writer'];
  $publisher = $_GET['publisher'];
  $price = $_GET['price'];
  $intro = $_GET['intro'];

  include '../dbconn.php';
  // 도서 테이블의 삽입될 인덱스 구하기
  $query1 = "Select * from book_info";
  $result = mysqli_query($conn, $query1);
  $num = mysqli_num_rows($result) + 1;
  // 전달 받은 데이터를 도서테이블에 삽입
  $query2 = "INSERT INTO book_info values ('$num', '$title', '$writer', '$publisher', '$price', '$intro')";
  mysqli_query($conn, $query2);
  echo mysqli_error($conn);
  // 새로 추가된 도서에 관해 재고 정보 생성
  $query3 = "Select * from book_stock";
  $result1 = mysqli_query($conn, $query3);
  $num1 = mysqli_num_rows($result) + 1;

  $query4 = "INSERT INTO book_stock(stock_no,book_id) values('$num1', '$num')";
  $query5 = "INSERT INTO rent_stock(rent_stock_no,book_id) values('$num1', '$num')";
  mysqli_query($conn, $query4);
  echo mysqli_error($conn);
  mysqli_query($conn, $query5);
  echo mysqli_error($conn);
?>
<script>
  alert('도서 등록이 완료되었습니다.');
  history.go(-1);
</script>
