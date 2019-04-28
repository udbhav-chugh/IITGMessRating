<!-- <!doctype html> -->
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
  integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


  <title>IITG - Mess Rating System</title>
</head>

<body>


<div>

  <?php
  session_start();

  $servername = "localhost";
$username = "root";
$password = "";
$dbname = "IITGMessRating";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

      if(isset($_POST['login']))
      {
        $uname=$_POST['username'];
        $upassword=$_POST['password'];
        $sql = "SELECT * FROM Users WHERE Username='".$uname."' AND Designation='student'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {

        while($row = $result->fetch_assoc()) {
            // if(.$row["Password"].==$upassword){
            if($row["Password"]==md5($upassword) ){
              $_SESSION['Username'] = $uname;
              $_SESSION['Designation'] = 'student';
              header("Location: profile.php");
            }
            else {

              $message = "Invalid Password";
              echo "<script type='text/javascript'>alert('$message');</script>";
            }
        }

        } else {
          $message = "Invalid Username";
          echo "<script type='text/javascript'>alert('$message');</script>";
        }
      }

      if(isset($_POST['loginmm']))
      {
        $uname=$_POST['username'];
        $upassword=$_POST['password'];
        $sql = "SELECT * FROM Hostels WHERE MMUsername='".$uname."'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {

        while($row = $result->fetch_assoc()) {
            // if(.$row["Password"].==$upassword){
            if($row["MMPassword"]==md5($upassword) ){
              $_SESSION['Username'] = $uname;
              $_SESSION['Designation'] = 'mm';
              header("Location: profile.php");
            }
            else {
              $message = "Invalid Password";
              echo "<script type='text/javascript'>alert('$message');</script>";
            }
        }

        } else {
          $message = "Invalid Username";
          echo "<script type='text/javascript'>alert('$message');</script>";
        }
      }

      if(isset($_POST['logina']))
      {
        $uname=$_POST['username'];
        $upassword=$_POST['password'];
        $sql = "SELECT * FROM Users WHERE Username='".$uname."' AND Designation='admin'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {

        while($row = $result->fetch_assoc()) {
            // if(.$row["Password"].==$upassword){
            if($row["Password"]==md5($upassword)){
              $_SESSION['Username'] = $uname;
              $_SESSION['Designation'] = 'admin';
              header("Location: profile.php");
            }
            else {

              $message = "Invalid Password";
              echo "<script type='text/javascript'>alert('$message');</script>";
            }
        }

        } else {
          $message = "Invalid Username";
          echo "<script type='text/javascript'>alert('$message');</script>";
        }
      }
    $conn->close();
   ?>

</div>


  <div class="container-fluid">
          <div class="row">
            <div class="col-lg-2"></div>
            <div class="col align-self-center">

                <div id="accordion">
  <div class="card">
    <div class="card-header" id="headingOne">
      <h5 class="mb-0">
        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          Student
        </button>
      </h5>
    </div>

    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
      <div class="card-body">
        <form action="home.php" method="post">
        <p><input class="form-control" name='username' placeholder="Username" type="text" size="50" required/></p>
        <p><input class="form-control" name='password' placeholder="Password" type="password" size="50" required/></p>
        <input class="btn btn-primary" name="login" type="submit" value="Login"/>
        </form>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingTwo">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          Mess Manager
        </button>
      </h5>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
      <div class="card-body">
        <form action="home.php" method="post">
        <p><input class="form-control" name='username' placeholder="Username" type="text" size="50" required/></p>
        <p><input class="form-control" name='password' placeholder="Password" type="password" size="50" required/></p>
        <input class="btn btn-primary" name="loginmm" type="submit" value="Login"/>
        </form>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingThree">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          Admin
        </button>
      </h5>
    </div>
    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
      <div class="card-body">
        <form action="home.php" method="post">
        <p><input class="form-control" name='username' placeholder="Username" type="text" size="50" required/></p>
        <p><input class="form-control" name='password' placeholder="Password" type="password" size="50" required/></p>
        <input class="btn btn-primary" name="logina" type="submit" value="Login"/>
      </form>
      </div>
    </div>
  </div>
</div>




</div>
<div class="col-lg-2"></div>
</div>
</div>

  <!-- {% block your_content %}
  {% endblock %} -->
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
  integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
  crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
  integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
  crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
  integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
  crossorigin="anonymous"></script>
  <!-- {% block scripts %}
  {% endblock %} -->
</body>

</html>
