<?php
 require("database.php");
    if(empty($_SESSION['user'])) 
    {
        header("Location: index.php");
        die("Redirecting to index.php");
// get correct file path
$fileName = $_GET['name'];
$filePath = 'uploads/'.$fileName;
// remove file if it exists
if ( file_exists($filePath) ) {
    unlink($filePath);
    header('Location:read.php');
}
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Remove script for Upload files</title>
</head>

<body>
</body>
</html>