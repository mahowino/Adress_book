<?php

   $contactId=$Firstname=$othername=$email=$street_location=$city=$zip=$phone='';
  $link = mysqli_connect("localhost", "root", "mahalonian", "adress_project");

  // Check connection
  if($link === false){
      die("ERROR: Could not connect. " . mysqli_connect_error());
  }
  
  $contactId=$_GET['contactid'];
$sql = "SELECT * FROM adress_project.contacts where contact_id=".$contactId.";";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){

        while($row = mysqli_fetch_array($result)){
        $contactId=$row['contact_id'];
        $Firstname=$row['firstname'];
        $othername=$row['other_names'] ;
        $email=$row['email'];
        $street_location= $row['street_address'];
        $city= $row['city'] ;
        $zip=$row['zip_code'];
        $phone=$row['phone'];
       
    }
       
        mysqli_free_result($result);
    }
    else{
        echo "No records matching your query were found.";
    }
}
else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}


 
    

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Edit contact</title>
  <link rel="icon" type="png/jpeg" href="logo.png">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.css" />
  <link rel="stylesheet" type='text/css' href="add_contact.css">
</head>
<body>
  <div class="container">
    <h1 class="brand"><span>Address</span> Book</h1>
    <div class="wrapper animated bounceInLeft">
      <div class="company-info">
        <h3>Programmer contact</h3>
        <ul>
          <li><i class="fa fa-road"></i>  Nairobi Kenya</li>
          <li><i class="fa fa-phone"></i>  +254769694842</li>
          <li><i class="fa fa-envelope"></i>  mahowino@gmail.com</li>
        </ul>
      </div>
      <div class="contact">
        <h3>Edit contact</h3>
        <form method="POST" >
         
          <p>
            <label>First Name</label>
            <input type="text" name="first_name" value="<?php echo  $Firstname; ?>">
          </p>
          <p>
            <label>Other names</label>
            <input type="text" name="names" value="<?php echo  $othername; ?>">
          </p>
          <p>
            <label>Email Address</label>
            <input type="email" name="email" value="<?php echo  $email; ?>">
          </p>
          <p>
            <label>Phone Number</label>
            <input type="text" name="phone" value="<?php echo  $phone; ?>">
          </p>
          <p>
            <label>Street</label>
            <input type="text" name="street_adress" value="<?php echo  $street_location; ?>">
          </p>
          <p>
            <label>Zip code</label>
            <input type="text" name="zip" value="<?php echo  $zip; ?>">
          </p>
         
          <p>      
          <label for="city">City</label>
          
          <?php
          include('new_contact_backend.php');
          ?>
        </p>
          <p class="full">
            <button type="submit" name="edit_contact"
                class="submit_contact" value="edit_contact" >Edit contact</button>
          </p>
      
        </form>
      </div>
    </div>
  </div>
</body>
</html>