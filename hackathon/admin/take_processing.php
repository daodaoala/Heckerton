<?
    //전달받은 주문번호
    $ordno = $_GET['order_id'];

    include '../dbconn.php';
    //주문번호와 일치하는 데이터 검색
    \

    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);

    //결제완료 상태인 경우에만 수행
    if($row['state'] == "결제완료"){
        //타입에 따라 변경하는 데이터가 다름
        if($row['type'] == "대여"){
            $state = "대여중";
            echo "<script>alert('대여 처리가 완료되었습니다');</script>";
        }
        else{
            $state = "수령완료";
            echo "<script>alert('수령 처리가 완료되었습니다');</script>";
        }
        //주문정보 수정 쿼리
        $upd_query = "Update orders SET state = '$state', take_date = sysdate() where order_id = '$ordno'";
        $upd_result = mysqli_query($conn,$upd_query);

    }
    else{
        echo "<script>alert('이미 수령완료 혹은 대여중인 도서입니다.');</script>";
    }
    echo "<script>history.go(-1);</script>";

?>
