<?
      session_start();
      // 도서 번호를 GET 방식으로 받음
      $bookid = $_GET['bookidx'];
      //데이터베이스 접속
      include './dbconn.php';
      // 전달 받은 도서 번호와 일치하는 도서정보를 조회하는 쿼리문
      $query = "select * from book_info where book_id = '$bookid'";
      $result = mysqli_query($conn, $query);
      $book = mysqli_fetch_array($result);
      // 도서 정보 테이블과 도서 코멘트 테이블을 조인하여 필요한 정보를 조회하는 쿼리문
      $com_query = "select c.comment_id, u.user_id, c.comment, c.grade, c.input_time  from book_comment as c join user_info as u
      on c.c_userid = u.cust_id where c.c_bookid = '$bookid' order by c.input_time";
      $com_result = mysqli_query($conn, $com_query);
      //해당 도서의 평균 평점 계산
      if($com_result){
          $com_row = mysqli_num_rows($com_result);
          $avg = 0;
          if($com_row != 0){
              while($avg_row = mysqli_fetch_array($com_result)){
                  $avg = $avg + $avg_row['grade'];
              }

              $avg = $avg/$com_row;
              mysqli_data_seek($com_result, 0);
          }
      }

  ?>
