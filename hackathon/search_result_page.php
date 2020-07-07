<html>
<head>
    <?
        //데이터 베이스 접속
        include './dbconn.php';

        //GET으로 검색 단어 받음
        $search_data = $_GET['search_word'];
        //검색 단어를 통해 일치하는 데이터가 있는지 조회하는 쿼리문
        $query = "select * from sejong_comment where grade like '%$search_data%' or comment like '%$search_data%'";
        $result = mysqli_query($conn, $query);
        $num = mysqli_num_rows($result);
    ?>
    <title><? echo $search_data; ?> : 통합검색</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


</head>
<body>

    <div id = wrapper>
        <div id = "re-search">
            <!--메인화면과 동일한 검색창 자기 자신으로 리다이렉트 -->
            <form action = "search_result_page.php">
                <input id= "search" name = "search_word" placeholder= "&nbsp원하는 책을 검색하세요.">
                <button id = "submit" type = "submit" name = "click" value = "검색">검색</button>
            </form>
        </div>
        <div id = "search-result">
            <!-- 쿼리문의 결과 테이블의 row 길이에 따라 검색 결과 개수 출력 -->
            <div id = result-count>"<? echo $search_data; ?>" 검색 결과 : <? if($search_data == ""){echo 0;}else{echo $num;} ?>건</div>
            <br><hr><br>
            <div>
            <?
                //검색 데이터와 일치하는 row를 한줄씩 출력
                // 앵커 태그의 이동주소에 해당 도서의 번호를 get 방식으로 보냄
                if($search_data != ""){
                    while($row = mysqli_fetch_array($result)){
                        ?><div class = 'con-result'><a class = 'result-ank' ><?
                        echo   $row['comment'];
                        echo "</a></div>";
                    }
                }
                else{
                    ?>
                        <div class = 'con-result'>검색 결과가 없습니다.</div>
                    <?
                }
            ?>
            </div>
        </div>
    </div>
</body>
</html>
