<?php 
// Include the necessary files for database connection and header
include("mysql.php");
include("templates/header.php");

// Define the query
$query = "SELECT * FROM bandesdessinees";

// Execute the query on the database
$result = mysqli_query($conn, $query);

// Check if the query was successful
if ($result) {
    // Fetch and display the results
    while ($row = mysqli_fetch_assoc($result)) {
        echo "Title: " . $row['title'] . "<br>";
        echo "Author: " . $row['author'] . "<br>";
        echo "Year: " . $row['year'] . "<br>";
        echo "-----------------------------<br>";
    }
} else {
    // Handle query failure
    echo "Error: " . mysqli_error($conn);
}

// Close the connection to the database
mysqli_close($conn);
?>
