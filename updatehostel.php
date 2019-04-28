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
               <p><input class="form-control" name='hname<?php  print $i ?>' placeholder="Hostel Name" type="text" size="50" value=<?php echo $temphname ?> readonly/></p>
             <p><input class="form-control" name='mmusername<?php  print $i ?>' placeholder="Username" type="text" size="50" value=<?php echo $tempusername ?> required/></p>
             <p><input class="form-control" name='mmname<?php  print $i ?>' placeholder="Name" type="text" size="50" value=<?php echo $tempname ?> required/></p>
             <p><input class="form-control" name='mmcontact<?php  print $i ?>' placeholder="Contact Number" type="text" size="20" value=<?php echo $tempcontact ?> required/></p>
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
           echo "Record updated successfully";
           header("Location: updatehostel.php");
       } else {
           echo "Error updating record: " . $conn->error;
       }


     }
     $j=$j+1;
   }
 ?>




<?php endblock() ?>
