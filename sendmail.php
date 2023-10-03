<?php
require("modules/Emails/mail.php");
require("modules/Emails/models/Mailer.php");

global $HELPDESK_SUPPORT_EMAIL_ID, $HELPDESK_SUPPORT_NAME;
$email="purveshramoliya5159@gmail.com";
$subject="how r you";
$contents="i am the king";

send_mail('', $email, $HELPDESK_SUPPORT_NAME, $HELPDESK_SUPPORT_EMAIL_ID, $subject, $contents,'');

	if($status == 1)
		echo "Mails sent successfully";
	else if($status == "")
		echo "No contacts matched".$status;
	else
		echo "Error while sending mails: ".$status;		
?>