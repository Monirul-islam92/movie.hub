<?php  
$servername = "localhost";
$username = "root";
$password = "dgbhs2008";
$db = "mydatabase";

// Create connection
$conn = mysqli_connect($servername, $username, $password,$db);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
else{
	echo "Connected successfully";

}
   
$query = mysqli_query($conn, "SELECT * FROM user_review")
   or die (mysqli_error($conn));

while ($row = mysqli_fetch_array($query)) {
  echo
   "<tr>
    <td>{$row['IDNum']}</td>
    <td>{$row['LastName']}</td>
    <td>{$row['FirstName']}</td>
    <td>{$row['Position']}</td>
   </tr>;"

}

$conn->close();

?>