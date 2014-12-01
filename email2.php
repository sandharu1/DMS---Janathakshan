<!--E mail automatic sending system based duedates for DocMonSys by sandharu1 -->

<?php
require("database.php");
// MySQL pdo code to pull the fields.  pull the dates that are 1 days from expiration. 
$sql = "SELECT alerts.EmailAddress, alerts.FullName, alerts.Title, projects.PID, donor.DID, contract.ConID, program.ProID, prostages.PStage, prostages.ProDueDate, contract.ProID, projects.DID, contract.PID from alerts, projects
										INNER JOIN donor ON projects.DID = donor.DID 
                                        INNER JOIN contract ON projects.PID = contract.PID
                                        INNER JOIN program ON contract.ProID = program.ProID 
                                        INNER JOIN prostages ON program.ProID = prostages.ProID WHERE ProDueDate = DATE_ADD(CURDATE(),INTERVAL 1 DAY)";
$result = $db->query($sql);
// Define the variables and columns (loop the array)
while($row = $result->fetch(PDO::FETCH_ASSOC)) {
    $email = $row["EmailAddress"];
    $fullname = $row["FullName"];
    $title = $row["Title"];
    $pid = $row["PID"];
    $conid = $row["ConID"];
    $proid = $row["ProID"];
    $pstage = $row["PStage"];
    $date_exp = $row["ProDueDate"];
    
// Mail code to e-mail based on the records pulled from above code.
$to = "sandharu1@gmail.com, " . $email . " ";
$subject = "DueDate reminder - " . $pstage . " " ;
$message = "Hi " .$title . " - ". $fullname .  
"\n \nThe ". $pstage . " is going to expire on " . $date_exp . "\n \nMore info -\nProject ID -  ". $pid . " \nContract ID -  ". $conid . " \nProgram ID -  ". $proid . "\n \nPlease contact manager for future matters. 
If you allready complete this stage, plz update info and skip this massege \n \nThank you. \n \n \n *** This is an automatically generated email, please do not reply ***";
$from = "auto-admin@janathakshan-dms.comuf.com";
$headers = "From:" . $from;
mail($to,$subject,$message,$headers);
}
echo "Mail Sent.";
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>mail function</title>
</head>

<body>
</body>
</html>