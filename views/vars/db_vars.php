<?php

require_once '../../database.php';

// KohaBarcode data
$sql = "SELECT COUNT(barcode) as count FROM items WHERE withdrawn_on IS NULL";
$result = $koha->query($sql);
$row = $result->fetch_assoc();
$kohaTotal = ($row) ? $row['count'] : 0;

// Inventory 2024 data
$sql = "SELECT COUNT(barcode) as count FROM inventory_2024 WHERE barcode IS NOT NULL";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$Inventory2024 = ($row) ? $row['count'] : 0;

// Missing Records data
$query = "SELECT * FROM missing_records";
$result = $conn->query($query);

// Check if the query was successful
if ($result === false) {
    die("Error executing the query: " . $conn->error);
}

// Store all the rows in an array
$missingRecordsData = [];
while ($row = $result->fetch_assoc()) {
    $missingRecordsData[] = $row;
}

?>
