

<!DOCTYPE html>
<html>
  
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Adress book</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
  
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@500&display=swap" rel="stylesheet">
  
    <script src='app.js' type='module'></script>
   

</head>

<body>
<script lang="Javascript">
   
</script>

<div class="main">
    <div class="header">
        <div class="header-title">
           
                <h1>Address book</h1>
                <br>
                <div class="svg-half">
                    <img src="https://i.pravatar.cc/75" />
                    <svg>
                      <linearGradient id="gradiant">
                        <stop offset="0%" style="stop-color: #ff5722;" />
                        <stop offset="100%" style="stop-color: #cddc39;" />
                      </linearGradient>
                      <path d="M0,38 a1,1 0 0,0 75,0" />
                    </svg>
                  </div>
                  <br><br>
               
                <h4>Creater Name:<span>Mahalon Owino</span></h4>
               
                
        </div>
        <div class="links">
        <a onclick=open_alert_json() href='index.php?json_export=true'> Export in JSON </a>
        <a onclick=open_alert_xml() href='index.php?xml_export=true'> Export in xml </a>
            <a href='add_contact.php'> new contact</a>
            <?php
           include('mainpageBackend.php');
            if (isset($_GET['xml_export'])) {
              export_contact_in_xml();
                       
            }
            if (isset($_GET['json_export'])) {
              export_contact_in_json();
                       
            }
            if (isset($_GET['contact_delete'])) {
              deleteContact();
              
                    
             }

            ?>
        </div>
        <script>
             
            function open_alert_xml(){
              alert('xml file downloaded succesfully, check folder for it');
            }
            function open_alert_json(){
              alert('JSON file downloaded succesfully, check folder for it');
            }

            function delete_contact(){
              alert('contact deleted confirmed');
              }
              //,otherNames,email,location,city,zip,phone
              function open_layout_edit_text(id,firstname,otherNames,email,location,city,zip,phone){


                document.querySelector('.bg_modal').style.display='flex';
              const element = document.getElementById("firstName").value='new heading '+otherNames;
             

               }
                        
          
          
                          
          </script>
    </div>
    
    
    <div class="table">
    <table class="contactList">
       
          
            
    <?php


$link = mysqli_connect("localhost", "root", "mahalonian", "adress_project");

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Attempt select query execution
$sql = "SELECT * FROM contacts";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){

        echo "<table class='contactList'>";
            echo "<tr>";
                //echo "<th>id</th>";
                echo "<th>First Name</th>";
                echo "<th>Other Names</th>";
                echo "<th>email</th>";
                echo "<th>Street adress</th>";
                echo "<th>City</th>";
                echo "<th>zip code</th>";
                echo "<th>phone</th>";
            echo "</tr>";
        while($row = mysqli_fetch_array($result)){
        
          //,'.$othername.','.$email.','.$street_location.','.$city.','.$zip.','.$phone.'
          //,".'"'.$othername.'"'.",".'"'.$email.'"'.",".'"'.$street_location.'"'.",".'"'.$city.'"'.",".'"'.$zip.'"'.",".'"'.$phone.'"'."
          //,".'"'.$email.'"'."
            echo "<tr >";
            
          //  "<tr onclick=open_layout_edit_text( $contactId,$contactId)>
            
                //echo "<td>" . $row['contact_id'] . "</td>";
                echo "<td>" . $row['firstname'] . "</td>";
                echo "<td>" . $row['other_names'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>" . $row['street_address'] . "</td>";
                echo "<td>" . $row['city'] . "</td>";
                echo "<td>" . $row['zip_code'] . "</td>";
                echo "<td>" . $row['phone'] . "</td>";
                echo"<td><a id='edit_btn' href='edit_contact.php?contactid=" . $row['contact_id'] ."'>Edit</a><td>";
                echo"<td><a id='edit_btn' onclick=delete_contact() href='index.php?contact_delete=true&contactid=" . $row['contact_id'] ."'>Delete</a><td>";
              
               
            echo "</tr>";
        }
        echo "</table>";
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
?>

        
    </table>
</div>
</div>
    <script type="module" src='main.js'> 

</script>#
<div class="bg_modal">
  
    <div class="contact">
        <div class="close">+</div>
        <h3>View contact</h3>
        <form method="POST" >
         
          <p>
            <label>First Name</label>
            <input type="text" name="first_name"  id="firstName">
          </p>
          <p>
            <label>Other names</label>
            <input type="text" name="names"  id="otherNames">
          </p>
          <p>
            <label>Email Address</label>
            <input type="email" name="email"  id="email">
          </p>
          <p>
            <label>Phone Number</label>
            <input type="text" name="phone" id="phone">
          </p>
          <p>
            <label>Street</label>
            <input type="text" name="street_adress" id="street_adress">
          </p>
          <p>
            <label>Zip code</label>
            <input type="text" name="zip"  id="zip">
          </p>
         
          <p>      
          <label for="city">City</label>
          
          <?php
          include('new_contact_backend.php');
          ?>
        </p>
          <p class="full">
            <button type="submit" name="submit_contact"
                class="submit_contact" value="submit_contact" >Edit</button>
          </p>

          <p class="full">
            <button type="submit" name="submit_contact"
                class="submit_contact" value="submit_contact" >Delete</button>
          </p>

          
      
        </form>
      </div>
   

</div>

</body>
</html>