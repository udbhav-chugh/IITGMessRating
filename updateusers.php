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

$sql = "SELECT * FROM Users WHERE Designation='student'";
$result = $conn->query($sql);
$i=0;
?>

<div class="container-fluid">
        <div class="row">
          <div class="col-lg-2"></div>
          <div class="col align-self-center">
<br><br>


  <form action="updateusers.php" method="post">
    <div class="card">
      <div class="card-header">
        Add User
      </div>
      <div class="card-body">
      <p><input class="form-control" name='mmusername' placeholder="Username" type="text" size="50" required/></p>
      <p><input class="form-control" name='mmpassword' placeholder="Password" type="password" size="50" required/></p>
      <p><input class="form-control" name='roll' placeholder="Roll Number" type="text" size="20" required/></p>
      <p><input class="form-control" name='mmname' placeholder="Name" type="text" size="100" required/></p>
      <!-- <p><input class="form-control" name='hostelres' placeholder="Hostel Resided" type="text" size="30" required/></p> -->
      <p>
        <select class="form-control" id="select_1" name="hostelres">
          <option value="Manas">Manas</option>
          <option value="Dihing">Dihing</option>
          <option value="Barak">Barak</option>
          <option value="Siang">Siang</option>
          <option value="Kameng">Kameng</option>
          <option value="Lohit">Lohit</option>
          <option value="Brahmaputra">Brahmaputra</option>
          <option value="Umiam">Umiam</option>
          <option value="Kapili">Kapili</option>
          <option value="Dhansiri">Dhansiri</option>
          <option value="Married Scholars">Married Scholars</option>
        </select>
        </p>
      <!-- <p><input class="form-control" name='hostelsub' placeholder="Hostel Subscribed" type="text" size="30" required/></p> -->
      <p>
        <select class="form-control" id="select_2" name="hostelsub">
          <option value="Manas">Manas</option>
          <option value="Dihing">Dihing</option>
          <option value="Barak">Barak</option>
          <option value="Siang">Siang</option>
          <option value="Kameng">Kameng</option>
          <option value="Lohit">Lohit</option>
          <option value="Brahmaputra">Brahmaputra</option>
          <option value="Umiam">Umiam</option>
          <option value="Kapili">Kapili</option>
          <option value="Dhansiri">Dhansiri</option>
          <option value="Married Scholars">Married Scholars</option>
        </select>
        </p>
      <p><input class="form-control" name='prog' placeholder="Program" type="text" size="10" required/></p>
        <input class="btn btn-primary " name="add" type="submit" value="Add User"/>
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
                <?php echo $row["Username"] ?>
             </button>
           </h2>
         </div>

         <div id="collapse<?php  print $i ?>" class="collapse" aria-labelledby="heading<?php  print $i ?>" data-parent="#accordionExample">
           <div class="card-body">
             <form action="updateusers.php" method="post">
               <?php
                $tempusername=$row['Username'];
                $temproll=$row['RollNumber'];
                $tempname=$row['Name'];
                $temphostelres=$row['HostelReside'];
                $temphostelsub=$row['HostelSubscribed'];
               ?>
               <p><input class="form-control" name='mmusername<?php  print $i ?>' placeholder="Username" type="text" size="50" value="Username: <?php echo $tempusername?>" readonly/></p>
               <p><input class="form-control" name='roll<?php  print $i ?>' placeholder="Roll Number" type="text" size="20" value="Roll Number: <?php echo $temproll ?>" readonly/></p>
               <p><input class="form-control" name='mmname<?php  print $i ?>' placeholder="Name" type="text" size="100" value="Name: <?php echo $tempname ?>" readonly/></p>
               <p><input class="form-control" name='hostelres<?php  print $i ?>' placeholder="Hostel Resided" type="text" size="30" value="Hostel Resident<?php echo $temphostelres ?>" readonly/></p>
               <p><input class="form-control" name='hostelsub<?php  print $i ?>' placeholder="Hostel Subscribed" type="text" size="30" value="Hostel Subscribed<?php echo $temphostelsub ?>" readonly/></p>
                 <input class="btn btn-primary " name="delete<?php  print $i ?>" type="submit" value="Delete User"/>
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
     if(isset($_POST['delete'.$j])){
       $username=$_POST['mmusername'.$j];
       echo $username;
       $sql2 = "DELETE FROM Users WHERE Username='".$username."'";
       if ($conn->query($sql2) === TRUE) {
           header("Location: updateusers.php");
       }


     }
     $j=$j+1;
   }

   if(isset($_POST['add'])){
     $mmusername2=$_POST['mmusername'];
     $mmpassword2=md5($_POST['mmpassword']);
     $roll2=$_POST['roll'];
     $mmname2=$_POST['mmname'];
     $hostelres2=$_POST['hostelres'];
     $hostelsub2=$_POST['hostelsub'];
     $prog2=$_POST['prog'];
     $sql4="SELECT * FROM Users WHERE Username='".$mmusername2."'";

     if ($conn->query($sql4)->num_rows >0) {
       $message = "Username Exists";
       echo "<script type='text/javascript'>alert('$message');</script>";
     }else{
     $sql3 = "INSERT INTO Users (Username,Password,RollNumber,Name,HostelReside,HostelSubscribed,HostelNew,Program,Designation) VALUES ('".$mmusername2."','".$mmpassword2."','".$roll2."','".$mmname2."','".$hostelres2."','".$hostelsub2."','-','".$prog2."','student')";
     if ($conn->query($sql3) === TRUE) {
       header("Location: updateusers.php");
     }
   }

   }
 ?>

</div>
<div class="col-lg-2"></div>
</div>
</div>




<?php endblock() ?>
