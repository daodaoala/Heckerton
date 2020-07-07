<html>
<head>
  <?

include './dbconn.php';
    $Nameid = $_GET['nid'];
    $Studentid = $_GET['sid'];
    $Did = $_GET['did'];
    $Phoneid = $_GET['pid'];
    $Wantid = $_GET['wid'];

    //테이블에 삽입할 번호를 만드는 과정
    $query1 = "Select * from user_info";
    $result = mysqli_query($conn, $query1);
    $num = mysqli_num_rows($result) + 1;
    // 정보 삽입 쿼리
    $query2 = "INSERT INTO user_info values ('$num', '$Nameid', '$Studentid', '$Did', '$Phoneid', '$Wantid')";
    mysqli_query($conn, $query2);

?>
<script>
    //작업 완료후 이전 페잊로 이동
    alert('성공적으로 멘토링이 신청되었습니다');
    //history.go(-1);

    function btn(){
        alert('신청돠었습니다');
    }


</script>
</head>
<body>



</body>
</html>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>Freelancer - Start Bootstrap Theme</title>
  <!-- Favicon-->
  <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
  <!-- Font Awesome icons (free version)-->
  <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>
  <!-- Google fonts-->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
  <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
  <!-- Core theme CSS (includes Bootstrap)-->
  <link href="css/styles.css" rel="stylesheet" />
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


  <!--To Work with icons-->
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">


  <style>
  table, td,tr{
    border:1px solid black;
  }
  table{
    width:60%;
    height: 100px;
    margin :auto;
    text-align:center;
  }
    .map-container {
      overflow: hidden;
      padding-bottom: 56.25%;
      position: relative;
      height: 0;
    }

    .map-container iframe {
      left: 0;
      top: 0;
      height: 100%;
      width: 100%;
      position: absolute;
    }

    .card-inner {
      margin-left: 4rem;
    }

    .bg-primary {
      background-color: #1abc9c !important;
    }
  </style>
</head>

<body id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
    <div class="container">
      <img class="ai" src="assets/img/portfolio/school.png" width="120" height="100" /><a class="navbar-brand js-scroll-trigger" href="./index.html">Sejong<br>University</a>
      <button class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
        aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#portfolio">Department Information</a></li>
          <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#about">lecture room</a></li>
          <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#contact">Mentoring</a></li>
          <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#contact1">Open Chat Room</a></li>
          <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#contact2">Lecture evaluation</a></li>
          <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#contact3">second hand</a></li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- Masthead-->
  <header class="masthead bg-primary text-white text-center">


  <?
      $korea_query = "select * from korea_info";
      $korea_result = mysqli_query($conn, $korea_query);

      while($com_row = mysqli_fetch_array($korea_result)){
        if($com_row['k_department']==$Did&&$Did==1){
          ?>
          <table border="1">
          <tr>
            <th>Department</th>
            <th>Name</th>
            <th>Student number</th>
            <th>Hobby</th>
            <th>Application status</th>
          </tr>
          <tr>
            <td><? echo "Department of Business Administration"; ?></td>
            <td><? echo  $com_row['k_name']; ?></td>
            <td><? echo $com_row['k_user_id'] ?></td>
            <td><? echo $com_row['k_tel'] ?></td>
            <td><button onclick="javascript:btn()"><? echo "Application" ?></button></td>
          </tr>

        </table>
        <br>
          <?
      }
      else if($com_row['k_department']==$Did&&$Did==2){
        ?>
        <table border="1">
        <tr>
          <th>Department</th>
          <th>Name</th>
          <th>Student number</th>
          <th>Hobby</th>
          <th>Application status</th>
        </tr>
        <tr>
          <td><? echo "Department of Economics"; ?></td>
          <td><? echo  $com_row['k_name']; ?></td>
          <td><? echo $com_row['k_user_id'] ?></td>
          <td><? echo $com_row['k_tel'] ?></td>
        <td><button onclick="javascript:btn()"><? echo "Application" ?></button></td>
        </tr>

      </table>
      <br>
        <?
      }
      else if($com_row['k_department']==$Did&&$Did==3){
        ?>
        <table border="1">
        <tr>
          <th>Department</th>
          <th>Name</th>
          <th>Student number</th>
          <th>Hobby</th>
          <th>Application status</th>
        </tr>
        <tr>
          <td><? echo "Department of Social Sciences"; ?></td>
          <td><? echo  $com_row['k_name']; ?></td>
          <td><? echo $com_row['k_user_id'] ?></td>
          <td><? echo $com_row['k_tel'] ?></td>
          <td><button onclick="javascript:btn()"><? echo "Application" ?></button></td>
        </tr>

      </table>
      <br>
        <?
      }
      else if($com_row['k_department']==$Did&&$Did==4){
        ?>
        <table border="1">
        <tr>
          <th>Department</th>
          <th>Name</th>
          <th>Student number</th>
          <th>Hobby</th>
          <th>Application status</th>
        </tr>
        <tr>
          <td><? echo "Department of Life Sciences"; ?></td>
          <td><? echo  $com_row['k_name']; ?></td>
          <td><? echo $com_row['k_user_id'] ?></td>
          <td><? echo $com_row['k_tel'] ?></td>
        <td><button onclick="javascript:btn()"><? echo "Application" ?></button></td>
        </tr>

      </table>
      <br>
        <?
      }
      else if($com_row['k_department']==$Did&&$Did==5){
        ?>
        <table border="1">
        <tr>
          <th>Department</th>
          <th>Name</th>
          <th>Student number</th>
          <th>Hobby</th>
          <th>Application status</th>
        </tr>
        <tr>
          <td><? echo "Department of Computer Science"; ?></td>
          <td><? echo  $com_row['k_name']; ?></td>
          <td><? echo $com_row['k_user_id'] ?></td>
          <td><? echo $com_row['k_tel'] ?></td>
        <td><button onclick="javascript:btn()"><? echo "Application" ?></button></td>
        </tr>

      </table>
      <br>
        <?
      }
      else if($com_row['k_department']==$Did&&$Did==6){
        ?>
        <table border="1">
        <tr>
          <th>Department</th>
          <th>Name</th>
          <th>Student number</th>
          <th>Hobby</th>
          <th>Application status</th>
        </tr>
        <tr>
          <td><? echo "Department of Software"; ?></td>
          <td><? echo  $com_row['k_name']; ?></td>
          <td><? echo $com_row['k_user_id'] ?></td>
          <td><? echo $com_row['k_tel'] ?></td>
          <td><button onclick="javascript:btn()"><? echo "Application" ?></button></td>
        </tr>

      </table>
      <br>
        <?

      }

    }
  ?>
  </header>
  <!-- Portfolio Section-->







  <!-- Footer-->
  <footer class="footer text-center">
    <div class="container">
      <div class="row">
        <!-- Footer Location-->
        <div class="col-lg-4 mb-5 mb-lg-0">
          <h4 class="text-uppercase mb-4">Location</h4>
          <p class="lead mb-0">
            05006 seoulteugbyeolsi gwangjingu
            <br />
            neungdonglo 209(gunjadong) sejongdaehaggyo
          </p>
        </div>
        <!-- Footer Social Icons-->
        <div class="col-lg-4 mb-5 mb-lg-0">
          <h4 class="text-uppercase mb-4">Sejong University related site</h4>
          <a class="btn btn-outline-light btn-social mx-1" href="https://www.facebook.com/groups/isasejong"><i class="fab fa-fw fa-facebook-f"></i></a>
          <a class="btn btn-outline-light btn-social mx-1" href="https://www.instagram.com/sejong_ili/"><i class="fab fa-fw fa-linkedin-in"></i></a>
          <a class="btn btn-outline-light btn-social mx-1" href="http://ili.sejong.ac.kr/index.do"><i class="fab fa-fw fa-asterisk"></i></a>
          <a class="btn btn-outline-light btn-social mx-1" href="http://oia.sejong.ac.kr/index.do"><i class="fab fa-fw fa-dribbble"></i></a>
        </div>
        <!-- Footer About Text-->
        <div class="col-lg-4">
          <h4 class="text-uppercase mb-4">The GuideBook for International Students</h4>
          <a href="C:\Users\권설아\Desktop\Project1\assets\img\portfolio\TheGuidebookforInternationalStudents_170307.pdf">Click here!</a>
        </div>
      </div>
    </div>
  </footer>
  <!-- Copyright Section-->
  <div class="copyright py-4 text-center text-white">
    <div class="container"><small>Copyright © Your Website 2020</small></div>
  </div>
  <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes)-->
  <div class="scroll-to-top d-lg-none position-fixed">
    <a class="js-scroll-trigger d-block text-center text-white rounded" href="#page-top"><i class="fa fa-chevron-up"></i></a>
  </div>
  <!-- Portfolio Modals-->
  <!-- Portfolio Modal 1-->
  <div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-labelledby="portfolioModal1Label" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fas fa-times"></i></span>
        </button>
        <div class="modal-body text-center">
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-lg-8">
                <!-- Portfolio Modal - Title-->
                <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0" id="portfolioModal1Label">
                  <소프트웨어융합대학>
                </h2>
                <!-- Icon Divider-->
                <div class="divider-custom">
                  <div class="divider-custom-line"></div>
                  <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                  <div class="divider-custom-line"></div>
                </div>
                <!-- Portfolio Modal - Image-->
                <img class="img-fluid rounded mb-5" src="assets/img/portfolio/cabin.png" alt="" />
                <!-- Portfolio Modal - Text-->
                <h1>컴퓨터공학과</h1>
                <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia neque assumenda ipsam nihil, molestias magnam, recusandae quos quis inventore quisquam velit asperiores, vitae? Reprehenderit soluta, eos quod
                  consequuntur itaque. Nam.</p>
                <button class="btn btn-primary" data-dismiss="modal">
                  <i class="fas fa-times fa-fw"></i>
                  Close Window
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Portfolio Modal 2-->
  <div class="portfolio-modal modal fade" id="portfolioModal2" tabindex="-1" role="dialog" aria-labelledby="portfolioModal2Label" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fas fa-times"></i></span>
        </button>
        <div class="modal-body text-center">
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-lg-8">
                <!-- Portfolio Modal - Title-->
                <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0" id="portfolioModal2Label">
                  <전자정보공학대학>
                </h2>
                <!-- Icon Divider-->
                <div class="divider-custom">
                  <div class="divider-custom-line"></div>
                  <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                  <div class="divider-custom-line"></div>
                </div>
                <!-- Portfolio Modal - Image-->
                <img class="img-fluid rounded mb-5" src="assets/img/portfolio/cake.png" alt="" />
                <!-- Portfolio Modal - Text-->
                <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia neque assumenda ipsam nihil, molestias magnam, recusandae quos quis inventore quisquam velit asperiores, vitae? Reprehenderit soluta, eos quod
                  consequuntur itaque. Nam.</p>
                <button class="btn btn-primary" data-dismiss="modal">
                  <i class="fas fa-times fa-fw"></i>
                  Close Window
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Portfolio Modal 3-->
  <div class="portfolio-modal modal fade" id="portfolioModal3" tabindex="-1" role="dialog" aria-labelledby="portfolioModal3Label" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fas fa-times"></i></span>
        </button>
        <div class="modal-body text-center">
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-lg-8">
                <!-- Portfolio Modal - Title-->
                <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0" id="portfolioModal3Label">
                  <인문과학대학>
                </h2>
                <!-- Icon Divider-->
                <div class="divider-custom">
                  <div class="divider-custom-line"></div>
                  <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                  <div class="divider-custom-line"></div>
                </div>
                <!-- Portfolio Modal - Image-->
                <img class="img-fluid rounded mb-5" src="assets/img/portfolio/circus.png" alt="" />
                <!-- Portfolio Modal - Text-->
                <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia neque assumenda ipsam nihil, molestias magnam, recusandae quos quis inventore quisquam velit asperiores, vitae? Reprehenderit soluta, eos quod
                  consequuntur itaque. Nam.</p>
                <button class="btn btn-primary" data-dismiss="modal">
                  <i class="fas fa-times fa-fw"></i>
                  Close Window
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Portfolio Modal 4-->
  <div class="portfolio-modal modal fade" id="portfolioModal4" tabindex="-1" role="dialog" aria-labelledby="portfolioModal4Label" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fas fa-times"></i></span>
        </button>
        <div class="modal-body text-center">
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-lg-8">
                <!-- Portfolio Modal - Title-->
                <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0" id="portfolioModal4Label">
                  <생명과학대학>
                </h2>
                <!-- Icon Divider-->
                <div class="divider-custom">
                  <div class="divider-custom-line"></div>
                  <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                  <div class="divider-custom-line"></div>
                </div>
                <!-- Portfolio Modal - Image-->
                <img class="img-fluid rounded mb-5" src="assets/img/portfolio/game.png" alt="" />
                <!-- Portfolio Modal - Text-->
                <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia neque assumenda ipsam nihil, molestias magnam, recusandae quos quis inventore quisquam velit asperiores, vitae? Reprehenderit soluta, eos quod
                  consequuntur itaque. Nam.</p>
                <button class="btn btn-primary" data-dismiss="modal">
                  <i class="fas fa-times fa-fw"></i>
                  Close Window
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Portfolio Modal 5-->
  <div class="portfolio-modal modal fade" id="portfolioModal5" tabindex="-1" role="dialog" aria-labelledby="portfolioModal5Label" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fas fa-times"></i></span>
        </button>
        <div class="modal-body text-center">
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-lg-8">
                <!-- Portfolio Modal - Title-->
                <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0" id="portfolioModal5Label">
                  <자연과학대학>
                </h2>
                <!-- Icon Divider-->
                <div class="divider-custom">
                  <div class="divider-custom-line"></div>
                  <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                  <div class="divider-custom-line"></div>
                </div>
                <!-- Portfolio Modal - Image-->
                <img class="img-fluid rounded mb-5" src="assets/img/portfolio/safe.png" alt="" />
                <!-- Portfolio Modal - Text-->
                <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia neque assumenda ipsam nihil, molestias magnam, recusandae quos quis inventore quisquam velit asperiores, vitae? Reprehenderit soluta, eos quod
                  consequuntur itaque. Nam.</p>
                <button class="btn btn-primary" data-dismiss="modal">
                  <i class="fas fa-times fa-fw"></i>
                  Close Window
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Portfolio Modal 6-->
  <div class="portfolio-modal modal fade" id="portfolioModal6" tabindex="-1" role="dialog" aria-labelledby="portfolioModal6Label" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fas fa-times"></i></span>
        </button>
        <div class="modal-body text-center">
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-lg-8">
                <!-- Portfolio Modal - Title-->
                <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0" id="portfolioModal6Label">
                  <경영경제대학>
                </h2>
                <!-- Icon Divider-->
                <div class="divider-custom">
                  <div class="divider-custom-line"></div>
                  <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                  <div class="divider-custom-line"></div>
                </div>
                <!-- Portfolio Modal - Image-->
                <img class="img-fluid rounded mb-5" src="assets/img/portfolio/submarine.png" alt="" />
                <!-- Portfolio Modal - Text-->
                <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia neque assumenda ipsam nihil, molestias magnam, recusandae quos quis inventore quisquam velit asperiores, vitae? Reprehenderit soluta, eos quod
                  consequuntur itaque. Nam.</p>
                <button class="btn btn-primary" data-dismiss="modal">
                  <i class="fas fa-times fa-fw"></i>
                  Close Window
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Bootstrap core JS-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
  <!-- Third party plugin JS-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
  <!-- Contact form JS-->

  <!-- Core theme JS-->
  <script src="js/scripts.js"></script>
</body>

</html>
