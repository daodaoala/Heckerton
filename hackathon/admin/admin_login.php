<?
    session_start();
    include '../dbconn.php';

    $id = $_POST['admin_id'];
    $pwd = $_POST['admin_password'];

    $query = "Select * from admin where admin_id = '$id'";
    $result = mysqli_query($conn, $query);  //result는 테이블의 형태로 저장
    $num = mysqli_num_rows($result);        //변수의 열의 개수를 반환
    $row = mysqli_fetch_array($result);


    if(!$num){
        echo "<script>alert('아이디가 일치하지 않습니다.'); location.href = './admin_login_page.html'; </script>";
    }
    else{
        if($row['admin_pw'] = $pwd){
            $_SESSION['adminid'] = $row['admin_id'];
            $_SESSION['is_admin_login'] = 1;
            echo "<script>location.href = 'administration_page.php';</script>";
        }
        else{
            echo "<script>alert('비밀번호가 일치하지 않습니다.); location.href = './admin_login_page.html';</script>";
        }
    }
?>
