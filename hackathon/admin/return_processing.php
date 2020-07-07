<?
    session_start();
    //전달받은 주문번호
    $ordno = $_GET['order_id'];

    include '../dbconn.php';
    //주문, 지점 테이블을 조인하여 필요한 정보를 조회하는 쿼리
    $query = "Select o.*, s.store_name from orders as o left join store as s on o.o_storeid = s.store_id where order_id = '$ordno'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);
    
    //대여중인 경우에만 반납 가능
    if($row['state'] == "대여중"){
        //주문 정보 수정 쿼리문
        $upd_query1 = "Update orders SET state = '반납완료', return_date = now() where order_id = '$ordno'";
        $upd_result1 = mysqli_query($conn,$upd_query1);

        //반납된 지점, 수량, 도서 데이터
        $store = $row['store_name'];
        $quantity = $row['quantity'];
        $rentbook = $row['o_bookid'];
        //반납된 도서의 반납 재고 수량을 변경하는 쿼리문
        $upd_query2 = "Update rent_stock SET $store = $store + '$quantity' where book_id = '$rentbook'";
        echo $upd_query2;
        mysqli_query($conn, $upd_query2);
        echo "<script>alert('반납 처리가 완료되었습니다.');</script>";
    }
    else{
        echo "<script>alert('이미 반납 완료된 도서입니다.');</script>";
    }
    echo "<script>history.go(-1);</script>";
?>
