<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fileUrl = $_POST['fileUrl'];
    $fileName = basename($_POST['fileName']);

    // Ensure the directory exists
    $destinationDir = 'downloads/';
    if (!is_dir($destinationDir)) {
        mkdir($destinationDir, 0755, true);
    }

    $destinationPath = $destinationDir . $fileName;

    // Download the file to the server
    if (file_put_contents($destinationPath, file_get_contents($fileUrl))) {
        echo "File downloaded successfully: <a href='$destinationPath'>$fileName</a>";
    } else {
        echo "Failed to download file.";
    }
} else {
    echo "Invalid request method.";
}
?>
