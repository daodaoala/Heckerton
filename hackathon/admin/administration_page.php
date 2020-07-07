<?
session_start();
if($_SESSION['is_admin_login'] == 0){
  echo "<script>alert('관리자 로그인이 필요한 서비스입니다.'); location.href = './admin_login_page.html';</script>";
}
$search_user = "";
$search_book = "";
?>
<!DOCTYPE html>
<html lang=ko dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>관리자 페이지 : 슬기로운세종생활</title>
    <style>
      *{
              margin : 0; padding : 0;
              background-color : white;
      }
      #wrapper{
              margin : 0 auto;
      }
      @media (min-width : 768px){
              #wrapper{
                  width : 725px;
              }
      }
      @media (min-width : 992px){
              #wrapper{
                  width : 940px;
              }
      }
      @media (min-width : 1200px){
              #wrapper{
                  width : 1120px;
              }
      }
      .info-wrapper{
            display : grid;
            grid-template-columns : 220px auto;
            width : 1090px;
            /*border : 1px solid black;*/
      }
      #aside-wrapper{
          margin-right :10px;
      }
      #list-wrapper{
          border : 1px solid black;
      }
      .side-menu{
          list-style:none;
      }
      li{
          border : 1px solid black;
          padding : 5px;
      }
      .side-button{
          width : 200px;
          font-size : 1.3em;
          text-decoration: none;
          border : none;
      }
      .info{
          border : 2px solid black;
          padding : 10px;
      }
      #search-user-info{
          display:block;
      }
      #book-management{
          display:none;
      }
      #rent-condition{
          display:none;
      }
      #stock-management{
          display:none;
      }
      .my-comment{
          text-decoration : none;
      }
      .yes-btn{
          width : 3em;
      }
      th, td{
        padding-left : 5px;
        padding-right : 5px;
      }
    </style>
    <script>
      var current_content = 1;

      function hiddenContents(content){
        if(content == 1){
          document.getElementById("search-user-info").style.display = "none";
        }
        else if(content == 2){
          document.getElementById("sejong-comment").style.display = "none";
        }
        else{
          document.getElementById("sejong-delete").style.display = "none";

        }
      }

      function viewContents(content){
        if(content == 1 && content != current_content){
          document.getElementById("search-user-info").style.display = "block";
          hiddenContents(current_content);
          current_content = 1;
        }
        else if(content == 2 && content != current_content){
          document.getElementById("sejong-comment").style.display = "block";
          hiddenContents(current_content);
          current_content = 2;
        }
        else{
          document.getElementById("sejong-delete").style.display = "block";
          hiddenContents(current_content);
          current_content = 3;
        }
      }

    </script>
  </head>
  <body>
    <iframe id = 'nav' src = 'admin_navbar.html' width = 100% height = 50px scrolling =  'no'></iframe>
    <div id = "wrapper">
      <?
        include '../dbconn.php';
        //로그인 한 관리자 정보
        $admin = $_SESSION['adminid'];
        //관리자 ID를 통해 관리 지점 조회
        $query = "select * from sejong_comment";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_array($result);
      ?>
      <h3>외국인유학생 관리자모드 </h3>
      <div class = "info-wrapper">
        <div id = "aside-wrapper">
          <div id = "list-wrapper">
            <ul class="side-menu">
              <li><button type = "button" class = "side-button" onclick = "viewContents(1)">강의평 관리</button></li>
              <li><button type = "button" class = "side-button" onclick = "viewContents(2)">멘토링 관리</button></li>
              <li><button type = "button" class = "side-button" onclick = "viewContents(3)">삭제 관리</button></li>

            </ul>
          </div>
        </div>
        <div id = "main-info">
          <div class = "info" id = "search-user-info">
            <form action = "administration_page.php" method = "GET">
              <h4>강의평 및 강의 검색</h4>
              <input id= "search" name = "search_user" value = "" style = "width : 300px;">
              <button id = "submit" type = "submit" name = "click"  value = "검색">검색</button>
            </form>
            <br>
            <?
              //검색으로 전달된 회원 정보
              $search_user = $_GET['search_user'];
              if($search_user != ""){
                //검색 결과로부터 일치하는 회원정보를 조회하는 쿼리
                $cust_query = "Select * from sejong_comment where grade = '$search_user' or comment like '%$search_user%'";
                if(!mysqli_query($conn, $cust_query)){
                  echo "쿼리오류 발생 : " , mysqli_error($conn);
                }
                $cust_result = mysqli_query($conn, $cust_query);
                $cust_row = mysqli_fetch_array($cust_result);
                $user = $cust_row['c_userid'];
                ?>
                <h3> 강의평 정보 </h3>
                <!-- 고객 정보 테이블-->
                <table border = "1" align = "center">
                  <th>평점</th>
                  <th>댓글</th>

                  <tr>
                    <td><? echo $cust_row['grade'];?></td>
                    <td><? echo $cust_row['comment'];?></td>
                  </tr>
                </table>
                <br>

                <br>
            <?
              }
            ?>

          </div>

          <!-- 도서 추가 -->
          <div id = "main-info">
            <div class = "info" id = "sejong-comment">
              <form action = "administration_page.php" method = "GET">
                <h4>사용자 아이디 및 학번 검색</h4>
                <input id= "search" name = "search_user" value = "" style = "width : 300px;">
                <button id = "submit" type = "submit" name = "click"  value = "검색">검색</button>
              </form>
              <br>
              <?
                //검색으로 전달된 회원 정보
                $search_user = $_GET['search_user'];
                if($search_user != ""){
                  //검색 결과로부터 일치하는 회원정보를 조회하는 쿼리
                  $cust_query = "Select * from user_info where user_id = '$search_user' or user_name like '%$search_user%'";
                  if(!mysqli_query($conn, $cust_query)){
                    echo "쿼리오류 발생 : " , mysqli_error($conn);
                  }
                  $cust_result = mysqli_query($conn, $cust_query);
                  $cust_row = mysqli_fetch_array($cust_result);
                  $user = $cust_row['cust_id'];
                  ?>
                  <h3> 외국인 정보 </h3>
                  <!-- 고객 정보 테이블-->
                  <table border = "1" align = "center">
                    <th>사용자아이디</th>
                    <th>학번</th>

                    <tr>
                      <td><? echo $cust_row['user_id'];?></td>
                      <td><? echo $cust_row['user_name'];?></td>
                    </tr>
                  </table>
                  <br>
                  </table>

                  <br>
              <?
                }
              ?>
            </div>
            <div id = "main-info">
              <div class = "info" id = "sejong-delete">
                <form action = "administration_page.php" method = "GET">
                  <h4>삭제관리</h4>

                </form>
                <br>
                <div id = "book-review">
                <!-- $com_query로 조회한 코멘트 정보 출력 -->
                <?
                    // 코멘트 테이블에서 유저 정보로 접근하기 위해 조인을 사용
                    $com_query = "select c.comment_id, u.user_id, c.comment, c.grade, c.input_time
                    from sejong_comment as c join user_info as u on c.c_userid = u.cust_id where c.c_userid = '1' order by c.input_time";
                    $com_result = mysqli_query($conn, $com_query);

                  //  echo "전체 유저 평점 : ",sprintf('%0.2f',$avg);
                    while($com_row = mysqli_fetch_array($com_result)){
                        ?>
                        <div class = "com-wrapper">
                            <div class = "com-id">
                                <? echo $com_row['user_id']; ?>
                            </div>
                            <div class = "com-grade">
                            <? echo "평점 : ", $com_row['grade']; ?>
                            </div>
                            <div class = "comment">
                                 <? echo $com_row['comment'] ?>
                            </div>
                            <div class = "comment-time">
                                <? echo $com_row['input_time'] ?>
                            </div>
                            <div>
                                <!-- 코멘트 삭제를 위해 이를 수행하는 php 파일 호출 -->
                                <form action = './delete_comment.php' method = "post">
                                    <button id = "sumbit" name = "delete_btn" value = <? echo $com_row['comment_id']; ?>>삭제</button>
                                </form>
                            </div>
                        </div>
                <?
                    }
                    // 세션 변수에 도서 아이디를 저장
                    $_SESSION['bookid'] = $bookid;
                ?>
                <!--코멘트 입력을 위한 텍스트 박스 -->

                </div>
              </div>
        </div>
      </div>
    </div>
  </body>
</html>
