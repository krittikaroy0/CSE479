<?php

// Define directories
$uploadDir = "x/";
$allowedDocTypes = ["application/pdf"];

// Process upload if submitted
if (isset($_POST["submit"])) {
    // Handle file upload logic...
    $fileName = $_FILES["file"]["name"];
    $fileTmpName = $_FILES["file"]["tmp_name"];
    $fileType = $_FILES["file"]["type"];

    // Validate file type
    if (!in_array($fileType, $allowedDocTypes)) {
        echo "Error: Only PDF files are allowed.";
        return;
    }

    // Generate unique filename
    $uniqueFileName = uniqid() . ".pdf";

    // Move uploaded file
    if (move_uploaded_file($fileTmpName, $uploadDir . $uniqueFileName)) {
        echo "File uploaded successfully.";
    } else {
        echo "Error: Failed to upload file. Please try again.";
    }
}

// Handle file deletion
if (isset($_POST["delete"])) {
    $fileNameToDelete = $_POST["delete"];
    $filePathToDelete = $uploadDir . $fileNameToDelete;

    if (file_exists($filePathToDelete) && unlink($filePathToDelete)) {
        echo "File deleted successfully.";
    } else {
        echo "Error: Failed to delete file. Please try again.";
    }
}

// Handle file update (rename)
if (isset($_POST["update"])) {
    $oldFileName = $_POST["update"];
    $newFileName = $_POST["newName"];
    $oldFilePath = $uploadDir . $oldFileName;
    $newFilePath = $uploadDir . $newFileName;

    if (file_exists($oldFilePath) && !file_exists($newFilePath) && rename($oldFilePath, $newFilePath)) {
        echo "File updated successfully.";
    } else {
        echo "Error: Failed to update file. Please try again.";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Upload</title>
    <style>
      body {
        
    font-family: Arial, sans-serif;
    background-color: #f5f5f5;
    margin: 0;
    padding: 0;
}

.container {
    max-width: 800px;
    margin: 20px auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

form {
    margin-bottom: 20px;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

table, th, td {
    border: 1px solid #ddd;
}

th, td {
    padding: 10px;
    text-align: left;
}

th {
    background-color: #f2f2f2;
}

img {
    max-width: 100px;
    max-height: 100px;
}

button {
    padding: 8px 12px;
    cursor: pointer;
}

input[type="file"],
input[type="text"] {
    margin-bottom: 10px;
    padding: 8px;
    width: 100%;
}

input[type="file"] {
    border: 1px solid #ddd;
    border-radius: 4px;
}

input[type="file"]:hover {
    background-color: #f9f9f9;
}

button[type="submit"] {
    background-color: navy;
    color: white;
    border: none;
    border-radius: 4px;
}

button[type="submit"]:hover {
    background-color: #45a049;
}

button[type="submit"],
button[type="reset"] {
    margin-right: 10px;
}

input[type="text"] {
    border: 1px solid #ddd;
    border-radius: 4px;
}

input[type="text"]:focus {
    outline: none;
    border-color: #4caf50;
    box-shadow: 0 0 5px rgba(76, 175, 80, 0.5);
}

/* Responsive styling */
@media (max-width: 600px) {
    .container {
        padding: 10px;
    }

    table {
        margin-top: 10px;
    }
}

    </style>
</head>
<body>

    <form action="" method="post" enctype="multipart/form-data">
        <label for="file">Select PDF file:</label>
        <input type="file" id="file" name="file" accept=".pdf">
        <button type="submit" name="submit">Upload</button>
    </form>

    <?php
    // Display list of uploaded files
    $fileList = scandir($uploadDir);
    $fileList = array_filter($fileList, function ($file) {
        return $file !== "." && $file !== "..";
    });

    if (!empty($fileList)) {
        echo "<h3>Uploaded Files:</h3>";
        echo "<table>";
        echo "<tr><th>File</th><th>Action</th></tr>";
        foreach ($fileList as $fileName) {
            $filePath = $uploadDir . $fileName;
            echo "<tr>";
            echo "<td>";
            echo "<a href='" . $filePath . "' target='_blank'>" . $fileName . "</a>";
            echo "</td>";
            echo "<td>";
            echo "<form action='' method='post'>";
            echo "<input type='hidden' name='delete' value='$fileName'>";
            echo "<button type='submit'>Delete</button>";
            echo "</form>";
            echo "<form action='' method='post'>";
            echo "<input type='hidden' name='update' value='$fileName'>";
            echo "<label for='newName'>New Name:</label>";
            echo "<input type='text' name='newName' id='newName' required>";
            echo "<button type='submit'>Update</button>";
            echo "</form>";
            echo "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No files uploaded yet.";
    }
    ?>

</body>
</html>
