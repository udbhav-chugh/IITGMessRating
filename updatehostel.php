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

$sql = "SELECT * FROM Hostels";
$result = $conn->query($sql);
$i=0;
?>


<div class="container-fluid">
        <div class="row">
          <div class="col-lg-2"></div>
          <div class="col align-self-center">
            <br><br><br>


  <form action="updatehostel.php" method="post">
    <div class="card">
      <div class="card-header">
        Add Hostel
      </div>
      <div class="card-body">

      <p><input class="form-control" name='hname' placeholder="Hostel Name" type="text" size="20" required/></p>
      <p><input class="form-control" name='mmusername' placeholder="Username" type="text" size="50" required/></p>
      <p><input class="form-control" name='mmpassword' placeholder="Password" type="password" size="50" required/></p>
      <p><input class="form-control" name='mmname' placeholder="Name" type="text" size="50" required/></p>
      <p><input class="form-control" name='mmcontact' placeholder="Contact Number" type="number" size="20" required/></p>
        <input class="btn btn-primary " name="add" type="submit" value="Add Hostel"/>
        </div>
      </div>

  </form>

<div class="accordion" id="accordionExample">
   <?php while($row = $result->fetch_assoc()) {

 ?>

       <div class="card">
         <div class="card-header" id="heading<?php  print $i ?>" >
           <h2 class="mb-0">
             <button class="btn btn-light collapsed" type="button" data-toggle="collapse" data-target="#collapse<?php  print $i ?>" aria-expanded="false" aria-controls="collapse<?php  print $i ?>" >
                <?php echo $row["Name"] ?>
             </button>
           </h2>
         </div>

         <div id="collapse<?php  print $i ?>" class="collapse" aria-labelledby="heading<?php  print $i ?>" data-parent="#accordionExample">
           <div class="card-body">
             <form action="updatehostel.php" method="post">
               <?php
                $temphname=$row['Name'];
                $tempusername=$row['MMUsername'];
                $tempname=$row['MMName'];
                $tempcontact=$row['MMContactNumber'];
               ?>
               <label >Hostel Name</label>
               <p><input class="form-control" name='hname<?php  print $i ?>' placeholder="Hostel Name" type="text" size="20" value=<?php echo $temphname ?> readonly/></p>
               <label >Username</label>
             <p><input class="form-control" name='mmusername<?php  print $i ?>' placeholder="Username" type="text" size="50" value=<?php echo $tempusername ?> required/></p>
              <label >Full Name</label>
             <p><input class="form-control" name='mmname<?php  print $i ?>' placeholder="Name" type="text" size="50" value="<?php echo $tempname ?>" required/></p>
             <label >Contact Number</label>
             <p><input class="form-control" name='mmcontact<?php  print $i ?>' placeholder="Contact Number" type="number" size="20" value=<?php echo $tempcontact ?> required/></p>
             <input class="btn btn-primary" name="update<?php  print $i ?>" type="submit" value="Update"/>
             </form>
           </div>
         </div>
       </div>
     <?php
     $i=$i+1;
   } ?>


 </div>

 <?php
   $j=0;
   while($j<$i){
     if(isset($_POST['update'.$j])){
       $hname=$_POST['hname'.$j];
       $mmusername=$_POST['mmusername'.$j];
       $mmname=$_POST['mmname'.$j];
       $mmcontact=$_POST['mmcontact'.$j];
       $sql2 = "UPDATE Hostels SET MMUsername='".$mmusername."', MMName='".$mmname."', MMContactNumber='".$mmcontact."' WHERE Name='".$hname."'";
       if ($conn->query($sql2) === TRUE) {
           header("Location: updatehostel.php");
       }


     }
     $j=$j+1;
   }

   if(isset($_POST['add'])){
     $hname2=$_POST['hname'];
     $mmusername2=$_POST['mmusername'];
     $mmpassword2=md5($_POST['mmpassword']);
     $mmname2=$_POST['mmname'];
     $mmcontact2=$_POST['mmcontact'];
     $sql4="SELECT * FROM Hostels WHERE MMUsername='".$mmusername2."'";

     if ($conn->query($sql4)->num_rows >0) {
       $message = "Username Exists";
       echo "<script type='text/javascript'>alert('$message');</script>";
     }
     else{
     $sql3 = "INSERT INTO Hostels (Name,MMUsername,MMPassword,MMName,MMContactNumber) VALUES ('".$hname2."','".$mmusername2."','".$mmpassword2."','".$mmname2."','".$mmcontact2."')";
     if ($conn->query($sql3) === TRUE) {
       header("Location: updatehostel.php");
     }
   }
   }
 ?>

</div>
<div class="col-lg-2"></div>
</div>
</div>

<br><br>


<?php endblock() ?>
