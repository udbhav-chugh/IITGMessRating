<?php
    include 'nav_bar_admin.php';
?>

<?php startblock('content') ?>

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

$sql = "SELECT * FROM Users WHERE HostelNew<>'-'";
$result = $conn->query($sql);?>

<br>

<?php
if ($result->num_rows > 0) {
  $i=1;
?>

  <table class="table">
    <thead class="thead-dark">

  <tr>
      <th scope="col">#</th>
      <th scope="col">Username</th>
      <th scope="col">Full Name</th>
      <th scope="col">Current Mess</th>
      <th scope="col">New Mess</th>
    </tr>
    </thead>
      <tbody>

<?php 
while($row = $result->fetch_assoc()) {
  $username=$row["Username"];
  $name=$row["Name"];
  $messsub=$row["HostelSubscribed"];
  $messnew=$row["HostelNew"];
?>
  
    <tr>
      <th scope="row"><?php echo $i; $i=$i+1; ?></th>
      <td><?php echo $username?></td>
      <td><?php echo $name?></td>
      <td><?php echo $messsub?></td>
      <td><?php echo $messnew?></td>
    </tr>

<?php
  }
?>
    </tbody>
  </table>
    <form action="updatemess.php" method="post">
    <div class="card align-items-center">
      <div class="card-body">

     <input class="btn btn-primary " name="update" type="submit" value="Update Mess"/>
     </div>
     </div>

  </form>
<?php
}
else{


?>
  <h1 align="center"> No Mess Changes this month yet</h1>
<?php 
  }
?>



<?php

if(isset($_POST['update']))
{

  $result2 = $conn->query($sql);
  if ($result2->num_rows > 0) {
    while($row2 = $result2->fetch_assoc()) {
      $hostelnew=$row2["HostelNew"];
      $user=$row2["Username"];
      echo "lol";
     $sql3= "UPDATE Users SET HostelSubscribed='$hostelnew' , HostelNew='-' WHERE Username='$user'";
     if ($conn->query($sql3) === TRUE) {
       header("Location: updatemess.php");
     } 
    }

  }

}

?>









<?php endblock() ?>
