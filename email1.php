<!--E mail automatic sending system based duedates for DocMonSys by sandharu1 -->
<?php
require("database.php");
//developed by sandharu1 -TeamV3
// MySQL PDO code to pull the fields I need and only pull the due dates that are 7 days from expiration. logic is on where statement. this for financial stage.
$sql = "SELECT alerts.EmailAddress, alerts.FullName, alerts.Title, projects.PID, donor.DID, contract.ConID, financial.FinID, finstages.FStage, finstages.TraDueDate, contract.FinID, projects.DID, contract.PID from alerts, projects
										INNER JOIN donor ON projects.DID = donor.DID 
                                        INNER JOIN contract ON projects.PID = contract.PID
                                        INNER JOIN financial ON contract.FinID = financial.FinID 
                                        INNER JOIN finstages ON financial.FinID = finstages.FinID WHERE TraDueDate = DATE_ADD(CURDATE(),INTERVAL 7 DAY)";
$result = $db->query($sql);
// Define the variables and columns (loop the array)
while($row = $result->fetch(PDO::FETCH_ASSOC)) {
    $email = $row["EmailAddress"];
    $fullname = $row["FullName"];
    $title = $row["Title"];
    $pid = $row["PID"];
    $conid = $row["ConID"];
    $finid = $row["FinID"];
    $fstage = $row["FStage"];
    $date_exp = $row["TraDueDate"];
    
// Mail code to e-mail based on the records pulled from above code. final mail funtion.
$to = "sandharu1@gmail.com, " . $email . " ";
$subject = "DueDate Reminder - " . $fstage . " " ;
$message = "Hi " .$title . " - ". $fullname .  
"\n \nThe ". $fstage . " is going to due on " . $date_exp . "\n \n___More info___\nProject ID -  ". $pid . " \nContract ID -  ". $conid . " \nfinancial ID -  ". $finid . "\n \nPlease contact manager or any responce person for future matters. 
If you allready complete this stage, plz update info and skip this massege. \n \nThank you.. \n \nRegrds \nAutoAdmin\nDocMonSys - Janathakshan. \n \n *** This is an automatically generated email, please do not reply ***";
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
<title>mail function - DocMonSys</title>
</head>

<body>
</body>
</html>