<?
  session_start();
  //이전 페이지의 폼으로 부터 전달받은 데이터
  $admin = $_SESSION['adminid'];
  $book = $_GET['book'];
  $stock = $_GET['rent-stock'];
  $type = $_GET['stock-submit'];

  include '../dbconn.php';
  //지점의 지점 번호를 구하기 위한 과정
  $store_query = "select a.*, s.store_name from admin as a left join store as s on s.store_id = a.admin_store where admin_id = '$admin'";
  $store_result = mysqli_query($conn, $store_query);
  $store_row = mysqli_fetch_array($store_result);
  $store = $store_row['store_name'];

  //데이터 타입에 따라 변경할 재고 테이블 결정
  if($type == "rent" ){
    $table = "rent_stock";
    $stock = $_GET['rent-stock'];
  }
  else{
    $table = "book_stock";
    $stock = $_GET['buy-stock'];
  }
  // 재고 테이블의 재고 수정 쿼리
  $query = "update $table set $store = '$stock' where book_id = $book";
  $result = mysqli_query($conn, $query);
  echo mysqli_error($conn);
?>
<script>
  alert("재고 수량 변경이 완료되었습니다.");
  history.go(-1);
</script>
ㅁ