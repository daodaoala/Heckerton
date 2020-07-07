<?php
    include './dbconn.php';

    $search_data = $_GET['search_word'];

    $query = "select * from sejong_comment where title like '%$search_data%'";
    $result = mysqli_query($conn, $query);
    //$row = mysqli_fetch_array($result);

    while($row = mysqli_fetch_array($result)){
        echo "<div class = 'con-result'><a class = 'result-ank' href = index.html>";
        echo $row['grade'], $row['comment'];
        echo "</a></div>";
    }


?>
