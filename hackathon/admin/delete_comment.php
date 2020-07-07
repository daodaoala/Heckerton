<?

    //전달받은 삭제할 코멘트의 정보
    $commentid = $_POST['delete_btn'];
    //세션변수에 저장된 정보 획득

    $user = $_SESSION['custid'];
    include './dbconn.php';
    //넘겨받음 정보를 통해 삭제할 코멘트 정보 조회 쿼리
    $query = "Select * from sejong_comment where comment_id = '$commentid'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);

    //자기 자신이 작성한 코멘트만 삭제 가능

      $del_query = "Delete from sejong_comment where comment_id = '$commentid'";
      mysqli_query($conn, $del_query);
      // 코멘트 테이블 재인덱싱
      $upd_query1 = "SET @cnt=0";
      $upd_query2 = "update sejong_comment SET comment_id=@cnt:=@cnt+1";
      // 오류시의 문제 코드 출력
      if(!mysqli_query($conn, $upd_query1)){
          echo "쿼리오류 발생 : " , mysqli_error($conn);
      }
      else{
          echo "쿼리정상";
      }
      if(!mysqli_query($conn, $upd_query2)){
          echo "쿼리오류 발생 : " , mysqli_error($conn);
      }
      else{
          echo "쿼리정상";
      }

?>
<script>
        // 코멘트 삭제후 상세 페이지로 리다이렉트
        location.href = './administration_page.php';
</script>
