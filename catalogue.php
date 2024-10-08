<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catalogue</title>
</head>
<body>
    
<table border=1>
    <tr>
        <td>
            Titre
        </td>
        <td>
            Auteur
        </td>
        <td>
            Genre
        </td>
    </tr>
<?php 
// Include the necessary files for database connection and header
include("mysql.php");  // Assume this initializes a PDO connection in $bdd
include("templates/header.php");

try {
    // Define the query
    $query = "SELECT * FROM bandesdessinees";
    
    // Execute the query using PDO
    $stmt = $bdd->query($query);  // $bdd is a PDO object
    
    // Fetch and display the results
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['Titre']) . "</td>";
        echo "<td>" . htmlspecialchars($row['Auteur']) . "</td>";
        echo "<td>" . htmlspecialchars($row['Genre']) . "</td>";
        echo "</tr>";
    }
} catch (PDOException $e) {
    // Handle query failure
    echo "Error: " . $e->getMessage();
}

// No need to explicitly close the PDO connection; it closes automatically when the script ends
?>
</table>
</body>
</html>