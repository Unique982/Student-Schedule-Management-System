<?php 
   include './database/config.php';
if(isset($_POST['set'])){
$faculty =mysqli_real_escape_string($conn,$_POST['faculty']);
$course =mysqli_real_escape_string($conn,$_POST['course']);
$subject =mysqli_real_escape_string($conn,$_POST['subject']);
$room =mysqli_real_escape_string($conn,$_POST['room']);
$start_time =mysqli_real_escape_string($conn,$_POST['start_time']);
$end_time =mysqli_real_escape_string($conn,$_POST['end_time']);

 $query ="INSERT INTO `schedule` (`faculty`, `course`, `subject`, `room`, `start_time`, `end_time`) VALUES
 ('$faculty', '$course', '$subject', '$room', '$start_time', '$end_time')";
 $result= mysqli_query($conn,$query)or die("Query failed");
 if($result){
  header("Location:schedule.php");
  echo "schedule  is added successfully";
}
}


?>
<!doctype html>
<html lang="en">
  <head>
    <title>Schedule</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
     <div class="container">
      <div class="row">
        <div class="col-md-10 mx-auto">
          <div class="card bg-light">
            <div class="card-header bg-primary text-light text-center">
             Set Schedule
            </div>
            <div class="card-body">
              <form action="" method="POST">
                <div class="form-group">
                <label>Faculty</label>
            <select name="faculty" id="faculty" class="form-control">
            <option disabled selected>Select Faculty</option>
               <?php 
               $sql = "SELECT * FROM faculty";
               $result = mysqli_query($conn,$sql) or die("query failed");
               if(mysqli_num_rows($result)){
                  while($row = mysqli_fetch_array($result)){
                 echo "<option value='{$row['faculty_name']}'>{$row['faculty_name']}</option>";
                  }
               }
               ?>
            </select>
                </div>

                <div class="form-group">
                <label>Course</label>
            <select name="course" id="course" class="form-control">
            <option disabled selected>Select Course</option>>
                <?php
                
                $sql = "SELECT * FROM course";
                $result = mysqli_query($conn,$sql) or die(" Query Failed");
                if(mysqli_num_rows($result)) {
                while($row = mysqli_fetch_array($result)){
                  echo "<option value='{$row['course_name']}'>{$row['course_name']}</option>";
                }
                }

                ?>
            </select>

                </div>

                <div class="form-group">
                <label>Subject</label>
            <select name="subject" id="subject" class="form-control">
                <option disabled selected>Select Subject</option>
               <?php
               $sql = "SELECT * FROM add_subject";
               $result = mysqli_query($conn,$sql) or die("Query failed");
               if(mysqli_num_rows($result)){
                while($row = mysqli_fetch_array($result)){
                  echo "<option value='{$row['subject_name']}'>{$row['subject_name']}</option>";
                }
               }
               
               ?>
            </select>
                </div>

              <div class="form-group">
              <label>Room</label>
            <select name="room" id="room" class="form-control">
            <option disabled selected>Select Class</option>
                <?php 
                $sql = "SELECT * FROM class";
                $result = mysqli_query($conn,$sql) or die("Query failed");
                if(mysqli_num_rows($result)){
                  while($row = mysqli_fetch_array($result)){
                    echo "<option value='{$row['class_code']}'>{$row['class_code']}</option>";
                  }
                }
                ?>
            </select>
              </div>  

              <div class="form-group">
              <label>Start Time:</label>
              <select name="start_time" id="start_time" class="form-control">
            <option disabled selected>Select Start Time</option>
            <?php
                $sql = "SELECT * From`time`";
                $result =mysqli_query($conn,$sql) or die('Query failed');
                if(mysqli_num_rows($result)){
                  while($row = mysqli_fetch_array($result)){
                    echo "<option value='{$row['start_time']}'>{$row['start_time']}</option>";
                  }
                }
                ?>
            </select>
              </div>
              <div class="form-group">
              <label>End Time</label>
            <select name="end_start" id="end_start" class="form-control">
            <option disabled selected>Select End Time</option>
                <?php 
                $sql = "SELECT * FROM time";
                $result = mysqli_query($conn,$sql) or die("Query failed");
                if(mysqli_num_rows($result)){
                  while($row = mysqli_fetch_array($result)){
                    echo "<option value='{$row['end_time']}'>{$row['end_time']}</option>";
                  }
                }
                ?>
            </select>
              </div>
              <div class="form-group">
              <button type="submit" name="set" class="btn btn-outline-warning text-dark">SET</button>
              </div>
              </form>
            </div>
          </div>
        </div>
      </div>
     </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>

    
        
        