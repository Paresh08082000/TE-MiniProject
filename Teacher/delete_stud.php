<!DOCTYPE html>
<html lang="en" dir="ltr">

    <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../Registration.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Delete</title>
    </head>
    <?php

  if(isset($_POST['delete']))
    {
        $fName = $_POST['fName'];
        $lName = $_POST['lName'];
        $email = $_POST['email'];

        // Connecting to the Database
        $servername = "localhost:3308";
        $username = "root";
        $password = "";
        $database = "students";

         // Create a connection
         $conn = mysqli_connect($servername, $username, $password, $database);

            $sql = "DELETE FROM `student` WHERE `fName`='$fName' AND `lName`='$lName' AND `email`='$email' ";
            $result = mysqli_query($conn, $sql);

        if($result){
          echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Success!</strong> Your entry has been Deleted successfully!
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
          </div>';
        }
        else{
            echo "The record was not inserted successfully because of this error ---> ". mysqli_error($conn);
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Error!</strong> We are facing some technical issue and your entry was not submitted successfully! We regret the inconvinience caused!
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>';
        }
        mysqli_close($conn);
      }
    
  ?>

    <body>
    <div id="college-title">
    <h1 id="college-name">
      <img src="http://www.pccoepune.com/images/PCET Logo 2_new.png" alt="PCET Trust Logo" style="width:75px; height:75px; margin:0px 10px">
      <b>Pimpri Chinchwad College of Engineering, Pune</b>
      <img src="http://www.pccoepune.com/images/PCET Logo 2_new.png" alt="PCET Trust Logo" style="width:75px; height:75px; margin:0px 10px">
    </h1>
  </div>
        <img class="bg" src="../bg.jpg" alt="background_img">
    <div class="wrapper">
        <div class="title">
        Delete Form
        </div>
        <p><center><b>Write First name, Last name and Email of student whose record you want to delete</b></center></p>

        <form class="" action="delete_stud.php" method="post">
            <div class="form">
                <div class="inputfield">
                <label>First Name</label>
                <input type="text" name="fName" class="input" >
                </div>
                <div class="inputfield">
                <label>Last Name</label>
                <input type="text" name="lName" class="input" >
                </div>
                <div class="inputfield" >
                <label>Email Address</label>
                <input type="email" name="email" class="input" >
                </div>
                <div class="inputfield">
                <input type="submit" name="delete" value="DELETE" class="btn">
                </div>
                <div class="inputfield">
                <input type="button" value="Go Back" onclick="history.back()" class="btn">
                </div>
            </div>
        </form>
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
          font-size: 3rem;
          line-height: 2rem;
          animation: mymove 10s infinite;
          position: relative;
          text-shadow: 2px 2px 4px #000000; 
        }
        @keyframes mymove {
          from {left: 1200px;;}
          to {left: 75px;;}
        }
      </style>
  </body>
</html>

