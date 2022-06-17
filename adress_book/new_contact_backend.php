<?php

/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "mahalonian", "adress_project");

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Attempt select query execution
$sql = "SELECT * FROM cities";

if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){

      
            echo "  <select id='city' name='city' size='1'>";
        while($row = mysqli_fetch_array($result)){

                echo " <option value='". $row['city_name'] . "'>". $row['city_name'] ."</option>";  
          
        }
        echo "</select>";
        
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

// Close connection
mysqli_close($link);


   
if (isset($_POST['submit_contact'])) {
    validateForm();
}
   
if (isset($_POST['edit_contact'])) {
  validateEdit();
}


function validateForm(){
  
// define variables and set to empty values
$name = $email = $phone = $street_adress = $zip =$city= "";
$Err = "";

if (isset($_POST['submit_contact'])) {
    $Err = "Fill all details";
    $Err2='Write a valid number ';
  if (empty($_POST["names"])) {
   
    displayError($Err);
  } 
  else if (empty($_POST["first_name"])) {
    
    displayError($Err);
  } 
  else if (empty($_POST["email"])) {
   
    displayError($Err);
  } 
  else if (empty($_POST["phone"])) {
    
    displayError($Err);
  } 
  else if (empty($_POST["street_adress"])) {
   
    displayError($Err);
  } 
  else if (empty($_POST["zip"])) {
    
    displayError($Err);
  } 
  elseif (empty($_POST["city"])) {
    $Err = "city is required";
    displayError($Err);
    
  } 
  else {

    /*$first_name=$_POST['first_name'];
    $names=$_POST['names'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $street_adress=$_POST['street_adress'];
    $zip=$_POST['zip'];
    $city=$_POST['city'];
*/
    $first_name = test_input($_POST["first_name"]);
    $name = test_input($_POST["names"]);
    $city = test_input($_POST["city"]);
    $zip = test_input($_POST["zip"]);
    $street_adress = test_input($_POST["street_adress"]);
    $email = test_input($_POST["email"]);
    $phone = test_input($_POST["phone"]);

    filter_var($_POST["email"], FILTER_VALIDATE_EMAIL);



    add_contact($first_name,$name,$email,$phone,$street_adress,$zip,$city);
      }
  }
}
  function validateEdit(){
  
    // define variables and set to empty values
    $name = $email = $phone = $street_adress = $zip =$city= "";
    $Err = "";
    
    if (isset($_POST['edit_contact'])) {
        $Err = "Fill all details";
        $Err2='Write a valid number ';
      if (empty($_POST["names"])) {
       
        displayError($Err);
      } 
      else if (empty($_POST["first_name"])) {
        
        displayError($Err);
      } 
      else if (empty($_POST["email"])) {
       
        displayError($Err);
      } 
      else if (empty($_POST["phone"])) {
        
        displayError($Err);
      } 
      else if (empty($_POST["street_adress"])) {
       
        displayError($Err);
      } 
      else if (empty($_POST["zip"])) {
        
        displayError($Err);
      } 
      elseif (empty($_POST["city"])) {
        $Err = "city is required";
        displayError($Err);
        
      } 
      else {
    
        /*$first_name=$_POST['first_name'];
        $names=$_POST['names'];
        $email=$_POST['email'];
        $phone=$_POST['phone'];
        $street_adress=$_POST['street_adress'];
        $zip=$_POST['zip'];
        $city=$_POST['city'];
    */
        $first_name = test_input($_POST["first_name"]);
        $name = test_input($_POST["names"]);
        $city = test_input($_POST["city"]);
        $zip = test_input($_POST["zip"]);
        $street_adress = test_input($_POST["street_adress"]);
        $email = test_input($_POST["email"]);
        $phone = test_input($_POST["phone"]);
    
        filter_var($_POST["email"], FILTER_VALIDATE_EMAIL);
    
    
    
        edit_contact($first_name,$name,$email,$phone,$street_adress,$zip,$city);
          }
      }

}





function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  function displayError($error){
    echo 'error, '.$error;
  }

function add_contact($first_name,$names,$email,$phone,$street_adress,$zip,$city) {
     /* Attempt MySQL server connection. Assuming you are running MySQL
        server with default setting (user 'root' with no password) */
        $link = mysqli_connect("localhost", "root", "mahalonian", "adress_project");
        
        // Check connection
        if($link === false){
            die("ERROR: Could not connect. " . mysqli_connect_error());
        }

      
        
        // Attempt select query execution
        $sql = "INSERT INTO contacts(firstname, other_names, email, phone, street_address, zip_code, city) VALUES ('$first_name','$names','$email','$phone','$street_adress','$zip','$city');";
        if($result = mysqli_query($link, $sql)){
           
        echo '<script type="text/javascript">
        alert("succesful");
        </script>';
        header("Location: index.php", true, 301);
        exit();

         // echo "succesful";
        }

       
}
function edit_contact($first_name,$names,$email,$phone,$street_adress,$zip,$city) {

  //edit contact information
      /* Attempt MySQL server connection. Assuming you are running MySQL
        server with default setting (user 'root' with no password) */
        $link = mysqli_connect("localhost", "root", "mahalonian", "adress_project");
        
        // Check connection
        if($link === false){
            die("ERROR: Could not connect. " . mysqli_connect_error());
        }

        echo '<script type="text/javascript">
        alert("succesful");
        </script>';
        $contactId=$_GET['contactid'];
        // Attempt select query execution
        $sql = "UPDATE contacts SET firstname='$first_name',other_names='$names', email='$email', phone='$phone', street_address='$street_adress', zip_code='$zip', city='$city' WHERE contact_id = ".$contactId.";";
        if($result = mysqli_query($link, $sql)){
           
        echo '<script type="text/javascript">
        alert("succesful");
        </script>';
        header("Location: index.php", true, 301);
        exit();

         // echo "succesful";
        }
        else{
          echo '<script type="text/javascript">
          alert("err");
          </script>';
          header("Location: index.php", true, 301);
        }


}
?>