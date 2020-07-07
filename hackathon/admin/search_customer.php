<?php
    include './dbconn.php';

    $search_data = $_GET['search_word'];

    $query = "select * from user_info where cust_id like '%$search_data%' or  user_name like '%$search_data%'";
    $result = mysqli_query($conn, $query);
    //$row = mysqli_fetch_array($result);

    while($row = mysqli_fetch_array($result)){
        echo "<div class = 'con-result'><a class = 'result-ank' href = detail_page.html>";
        echo $row['title'], $row['writer'], $row['publiser'];
        echo "</a></div>";
    }
?>