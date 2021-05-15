<?php
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: login_teacher.php");
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
  <style>
    .bs-example {
      margin: 20px;
    }
  </style>
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
      <a href="teacher_home.php" class="navbar-brand">
      <img src="../PCCOE_LOGO.jpg" alt="PCET Trust Logo" style="width:80px; height:75px; margin:0px 10px">
      </a>
      <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav">
          <a href="add_student.php" class="nav-item nav-link ">Add Student</a>
          <a href="delete_stud.php" class="nav-item nav-link " tabindex="-1">Delete Student</a>
          <a href="update_stud.php" class="nav-item nav-link">Update Student</a>
          <a href="search_student.php" class="nav-item nav-link">Search Student</a>
          <a href="assignment.php " class="nav-item nav-link">Send Assignment/Timetable</a>
          <a href="asg_received.php" class="nav-item nav-link " tabindex="-1">Assignments Received</a>
          <a href="notice.php" class="nav-item nav-link">Send Notice</a>
        </div>
        <div class="navbar-nav ml-auto">
        <a href="../login_teacher.php" class="nav-item nav-link">Logout</a>
        </div>
      </div>
    </nav>
    <?php echo "<div id='name'> Name: ". $_SESSION['fName']." ". $_SESSION['lName']. "<br>
          Email: ". $_SESSION['email'].
          "</div>";?>
    <div id="student-heading">
        Students List
    </div>

        <table>
            <tr>
            <th>Roll No.</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Branch</th>
            <th>Gender</th>
            <th>Email id</th>
            <th>Mobile No.</th>
            <th>Date of birth</th>
            <th>Address</th>
            </tr>
            <?php
            // Connecting to the Database
                $servername = "localhost:3308";
                $username = "root";
                $password = "";
                $database = "students";

                // Create a connection
                $conn = mysqli_connect($servername, $username, $password, $database);
                // Die if connection was not successful
                if (!$conn){
                    die("Sorry we failed to connect: ". mysqli_connect_error());
                }
                else{
                    // echo "Connection was successful<br>";
                }

                $sql = "SELECT * FROM `student`";
                $result = mysqli_query($conn, $sql);

                // Display the rows returned by the sql query
                    while($row = mysqli_fetch_assoc($result)){
                        echo '<tr><td>'.$row['roll'].'</td><td>'.$row['fName'].'</td><td>'.$row['lName'].'</td><td>'.$row['branch'].'</td><td>'.$row['gender'].'</td><td>'.$row['email'].'</td><td>'.$row['mobile'].'</td><td>'.$row['dob'].'</td><td>'.$row['address'].'</td></tr>';
                    }
            ?>
        </table>

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
        #name {
          text-align : right;
          margin : 15px;
          font-size : 20px;
          font-weight : bold;
          background-color: aliceblue;
          margin-left: 1150px;
          padding: 5px;
          border: solid blue;
          border-radius: 12px;
        }
        .bs-example #student-heading {
          text-align: center;
          font-weight: bolder;
          font-size: 50px;
          margin: 30px 550px;
          background-color: #8807ff;
          border-radius: 40px;
          color: white;
        }
        table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
        border : solid;
        }

        td, th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
        border : solid;
        }

        tr:nth-child(even) {
        background-color: #dddddd;
        }
        #id {
            text-align:center;
        }
        .contact-us #contact-heading{
          text-align: center;
          font-weight: bolder;
          font-size: 50px;
        }
        .contact-us{
          text-align: center;
          margin: 70px;
          padding: 20px
        }
        .social-icon {
          margin: 80px 40px;
        }
        .contact-us .social-icon img{
            transform: scale(0.5);
            transition:0.5s;
            width: 100px;
            height: 100px;
        }
        .contact-us .social-icon img:hover{
          transform: scale(0.5) translateY(-25px);
        }
        .contact-us p{
          font-size:35px;
          margin:15px;
          font-weight:bold;
        }
      }
    </style>
    <hr>
    <div class="contact-us">
      <p id="contact-heading">Contact Us</p>
      <a class="social-icon" href="https://www.facebook.com/PCCOENigadi/" target="_blank">
        <img src="http://www.pccoepune.com/images/fb.png" alt="fb_pccoe">
      </a>
      <a class="social-icon" href="https://www.linkedin.com/company/pccoe-pune?trk=biz-companies-cym" target="_blank">
        <img alt="Pimpri Chinchwad college of engineering is the best engg college in Pune." class="marginleft10"
          src="http://www.pccoepune.com/images/Linkedin-icon.png">
      </a>
      <a class="social-icon" href="https://twitter.com/pccoe_pune" target="_blank">
        <img alt="PCCOE is the best Engineering Institute in Pimpri Chinchwad Pune." class="marginleft10"
          src="http://www.pccoepune.com/images/twitter.png">
      </a>
      <a class="social-icon" href="https://www.instagram.com/pccoepune/" target="_blank">
        <img alt="PCCOE, the famous Engineering College in Pune provides the placement in the most reputed companies."
          class="marginleft10" src="http://www.pccoepune.com/images/insta-icon.png" width="32px" height="31px">
      </a>
      <a class="social-icon" href="https://www.youtube.com/channel/UCQiPDETOiteTLmAvvPk1WjA" target="_blank">
        <img alt="PCCOE, best engineering college in Pune offers good courses with good placement." class="marginleft10"
          src="http://www.pccoepune.com/images/youtube-icon.png" width="32px" height="31px">
      </a>
      <p style="color:black">PCCOE, Pune </p>
    </div>
  <hr>
  
</body>

</html>
