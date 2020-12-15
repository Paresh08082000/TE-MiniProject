<?php
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: login_student.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Home</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Passion+One:wght@700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Frank+Ruhl+Libre:wght@300&display=swap" rel="stylesheet">
</head>


<body>
<div id="college-title">
    <h1 id="college-name">
      <img src="http://www.pccoepune.com/images/PCET Logo 2_new.png" alt="PCET Trust Logo" style="width:75px; height:75px; margin:0px 10px">
      <b>Pimpri Chinchwad College of Engineering, Pune</b>
      <img src="http://www.pccoepune.com/images/PCET Logo 2_new.png" alt="PCET Trust Logo" style="width:75px; height:75px; margin:0px 10px">
    </h1>
  </div>
  <div class="bs-example">
    <nav class="navbar navbar-expand-md navbar-light bg-light">
      <a href="student_home.php" class="navbar-brand">
        <img src="../PCCOE_LOGO.jpg" alt="PCET Trust Logo" style="width:80px; height:75px; margin:0px 10px">
      </a>
      <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav">
          <a href="notice.php" class="nav-item nav-link ">Message Received</a>
          <a href="assignment.php" class="nav-item nav-link">Assignment/Timetable Received</a>
          <a href="submit_asg.php" class="nav-item nav-link">Submit Assignment</a>
          <a href="faculty.php" class="nav-item nav-link">Faculty list</a>
          <a href="http://www.pccoerp.com/cloudems/index.php"  target="_blank" class="nav-item nav-link">ERP Login</a>
        </div>
        <div class="navbar-nav ml-auto">
        <a href="../login_student.php" class="nav-item nav-link">Logout</a>
        </div>
      </div>
    </nav>
    <div class="welcome">
    Welcome <br> 
    <?php echo "<em><div id='name'>". $_SESSION['fName']." ". $_SESSION['lName']. "</div></em>";?>
    </div>
  </div>
    <style>
          #college-title {
        margin-top: 10px;
        width: 1430px;
        background-color: #c5d6e5;
        padding: 10px;
        width: 100%;
        }

        #college-name {
          color: #e71919;
          font-size: 3.2rem;
          line-height: 2rem;
          animation: mymove 10s infinite;
          position: relative;
          text-shadow: 2px 2px 4px #000000; 
        }
        @keyframes mymove {
          from {left: 1200px;;}
          to {left: 75px;;}
        }
        .bs-example {
          background-color: #e9ecef;
          margin-top: 5px;
        }
      .welcome {
        font-family: 'Passion One', cursive;
        margin: auto;
        padding: 30px;
        font-size:120px;
        text-align:center;
        font-weight:bold;
      }
      .welcome #name {
        font-family: 'Frank Ruhl Libre', serif;
        padding : 10px;
        font-size : 40px;
        color : blue;
      }
    </style>
</body>


</html>
