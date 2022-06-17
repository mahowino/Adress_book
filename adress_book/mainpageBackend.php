<?php
function export_contact_in_xml(){
  

$link = mysqli_connect("localhost", "root", "mahalonian", "adress_project");

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$sql = mysqli_query($link,"SELECT * FROM contacts ORDER BY firstname ASC");

$xml = "<root_contact>";

while($row = mysqli_fetch_array($sql))
{
  
   $xml .= '<contact  firstname="'. $row['firstname'] .'" other_names="'. $row['other_names'] .'" email="'. $row['email'] .'" adress="'. $row['street_address'] .'" city="' . $row['city'] .'" zip_code="' . $row['zip_code'] .'" mobile_number="'. $row['phone'] .'" />';
}

$xml .= "</root_contact>";

$sxe = new SimpleXMLElement($xml);
$dom = new DOMDocument('1,0');
$dom->preserveWhiteSpace = false;
$dom->formatOutput = true;
$dom->loadXML($sxe->asXML());

echo $dom->saveXML();

$dom->save('contacts.xml');

}

function export_contact_in_json(){
 
$link = mysqli_connect("localhost", "root", "mahalonian", "adress_project");

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$sql = "SELECT * FROM contacts ORDER BY firstname ASC";

$result = $link->query($sql);
$posts = $result->fetch_all(MYSQLI_ASSOC);

$response = json_encode([
    'contacts' => $posts,
]);

file_put_contents('contacts.json', json_encode($posts));


}

function open_dialog_editor(){

}

function deleteContact(){
    
               
               $link = mysqli_connect("localhost", "root", "mahalonian", "adress_project");

               // Check connection
               if($link === false){
                   die("ERROR: Could not connect. " . mysqli_connect_error());
               }
               
               $contactId=$_GET['contactid'];
             $sql = "DELETE FROM contacts WHERE contact_id=".$contactId."";

             if ($link->query($sql) === TRUE) {
               echo "Record deleted successfully";
             } else {
               echo "Error deleting record: " . $conn->error;
             }

             $link->close();
             
}


?>
