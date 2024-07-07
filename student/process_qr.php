<?php
if (isset($_GET['data'])) {
    $scannedData = urldecode($_GET['data']);
    // Process the scanned data as per your requirements
    // For example, you can store it in a database or display it on the page.
    echo "Scanned QR Code Data: " . $scannedData;
} else {
    echo "No data received.";
}
?>
