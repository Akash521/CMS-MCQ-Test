 <?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "quiz_new";
$que_id=$_GET['que_id'];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// sql to delete a record
$sql = "DELETE FROM mst_question WHERE que_id=".$que_id;

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?> 
    

