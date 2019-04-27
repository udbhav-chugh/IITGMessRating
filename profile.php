<?php include 'navbar.php' ?>

<?php startblock('content') ?>

<div class="container-fluid">
  <div class="row">
    <div class="col-lg-2"></div>
    <div class="col">

      <br><br><br>

      <?php
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

      $sql = "SELECT * FROM Users WHERE Username='baran170102035'";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
          echo '<div class="card">
          <div class="card-header">
          Profile
          </div>
          <div class="card-body">
          <h5 class="card-title">'.$row["Name"].'</h5>
          <h6 class="card-subtitle mb-2 text-muted">'.$row["Username"].'</h6>
          <p class="card-text">
          <b>Roll No:</b> '.$row["RollNumber"].'<br>
          <b>Hostel Residence:</b> '.$row["HostelReside"].'<br>
          <b>Current Hostel Mess Subscribed:</b> '.$row["HostelSubscribed"].'<br>
          <b>Program:</b> '.$row["Program"].'<br>
          <b>Designation:</b> '.$row["Designation"].'<br>
          </p>
          </div>
          </div>

          ';
        }
      } else {
        echo "0 results";
      }

      $sql = "SELECT * FROM Users WHERE Username='baran170102035'";

      $conn->close();
      ?>

      <br>
      <div class="card">
        <div class="card-header">
          Change Next Month Mess
        </div>
        <div class="card-body">
        </div>
      </div>

    </div>
    <div class="col-lg-2"></div>
  </div>
</div>
<!-- <div class="container-fluid">
<div class="row">
<div class="col-lg-2"></div>
<div class="col">

<br><br><br><br>
<div class="card">
<div class="card-body">
<h5 class="card-title">Card title</h5>
<h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
<a href="#" class="card-link">Card link</a>
<a href="#" class="card-link">Another link</a>
</div>
</div>

</div>
<div class="col-lg-2"></div>
</div>
</div> -->
<?php endblock() ?>
