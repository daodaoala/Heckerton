<?
    session_start();
    include './dbconn.php';
    //비로그인시 코멘트 작성 불가

    $custid = $_SESSION['custid'];
    $grade = $_POST['grade'];
    $comment = $_POST['comment'];

    //테이블에 삽입할 번호를 만드는 과정
    $query1 = "Select * from sejong_comment";
    $result = mysqli_query($conn, $query1);
    $num = mysqli_num_rows($result) + 1;
    // 정보 삽입 쿼리
    $query2 = "INSERT INTO sejong_comment values ('$num', '$custid', '$grade', '$comment',  sysdate())";
    mysqli_query($conn, $query2);


?>
    <script>
        // 데이터 삽입후 상세페이지로 리다이렉트
        location.href = './index.html';
    </script>
