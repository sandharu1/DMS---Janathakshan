<!--E mail automatic sending system based duedates for DocMonSys by sandharu1 -->

<?php
require("database.php");
//developed by sandharu1 -TeamV3
// MySQL pdo code to pull the fields.  pull the dates that are 7 days from expiration. This for Proposal.
$sql = "SELECT alerts.EmailAddress, alerts.FullName, alerts.Title, projects.PID, donor.DID, projects.ProposalDueDate, projects.PName, projects.Response from alerts, projects
										INNER JOIN donor ON projects.DID = donor.DID 
                                        WHERE ProposalDueDate = DATE_ADD(CURDATE(),INTERVAL 7 DAY)";
$result = $db->query($sql);
// Define the variables and columns (loop the array)
while($row = $result->fetch(PDO::FETCH_ASSOC)) {
    $email = $row["EmailAddress"];
    $fullname = $row["FullName"];
    $title = $row["Title"];
    $pid = $row["PID"];
    $pname = $row["PName"];
    $date_exp = $row["ProposalDueDate"];
    $response = $row["Response"];
    
// Mail code to e-mail based on the records pulled from above code.
$to = "sandharu1@gmail.com, " . $email . " ";
$subject = "DueDate Reminder - " . $pname . " " ;
$message = "Hi " .$title . " - ". $fullname .  
"\n \nThe ". $pname . " is going to due on " . $date_exp . "\n \n___More info___\n\nProject ID -  ". $pid . " \nProject Name -  ". $pname . " \nProject Response person -  ". $response . "\n 
 \nPlease contact manager or any this proposal responce person for future matters. 
If you allready complete this proposal, plz update info and skip this massege. \n \nThank you.. \n\nRegards \nAutoAdmin\nDocMonSys - Janathakshan.\n
\n\n *** This is an automatically generated email, please do not reply ***";
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
<title>mail function(Proposal Duedate)</title>
</head>

<body>
</body>
</html>