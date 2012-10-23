<?php 
if(empty($row['user_account'])) {
$txt = '<tr><td>Title</td><td>'.$_POST['title'].'</td></tr>
		<tr><td>Name</td><td>'.$_POST['name'].'</td></tr>
		<tr><td>Contact Number</td><td>'.$_POST['contactno'].'</td></tr>
		<tr><td>Email Address</td><td>'.$_POST['email2'].'</td></tr>';
} else {
$txt = '<tr><td>Sportsmail User Name</td><td><a href="http://oursportsplace.com/members/'.$row['user_account'].'/profile/">'.$row['user_account'].'</a></td></tr>';
}

$email2 = $row['wp_users']['display_name'];;
$to  =	"$email2";
// subject
$subject = 'Club/Team/Group Contact';

// message
$message = '
<html>
<head>
  <title>Club/Team/Group Contact Request</title>
</head>
<body>
<table>
	'.$txt.'
	<tr><td>Message</td><td>'.$_POST['message'].'</td></tr>
</table>
</body>
</html>
';

// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Additional headers
$headers .= 'To: '.$row['wp_users']['display_name'].' <'.$row['wp_users']['user_email'].'>' . "\r\n";
$headers .= 'From: '.$row['user_account'].' <'.$_POST['email2'].'>' . "\r\n";

// Mail it
mail($to, $subject, $message, $headers);
?>

<script>
	alert("Club/Team/Group application has been sent!");
	window.location = "?msg=success";
</script>