<?
    //관리자 로그아웃
    session_start();
    unset($_SESSION['adminid']);
    $_SESSION['is_admin_login'] = 0;

    echo "<script>alert('로그아웃 되었습니다.')</script>";
    echo "<script>location.href = './admin_login_page.html';</script>";
?>
