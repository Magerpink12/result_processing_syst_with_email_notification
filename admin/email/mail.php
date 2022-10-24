<?php

require_once "Mail.php"; // PEAR Mail package
require_once ('Mail/mime.php'); // PEAR Mail_Mime packge

extract($_GET);

 $from = "tedxp@tedxpompomari.com.ng"; //enter your email address
 $to = $email; //enter the email address of the contact your sending to
 $subject = "TEDxPompomari Ticket"; // subject of your email
 
	
$headers = array ('From' => $from,'To' => $to, 'Subject' => $subject);

// $text = ''; // text versions of email.
$html = "<html><body><p>Download the Ticket Below.</p></body></html>"; // html versions of email.

$crlf = "\n";

$mime = new Mail_mime($crlf);
// $mime->setTXTBody($text);
$mime->setHTMLBody($html);	
$mime->addAttachment('../print/tickets/' . $reference . '.pdf', $reference . '.pdf');
//do not ever try to call these lines in reverse order
$body = $mime->get();
$headers = $mime->headers($headers);

 $host = "localhost"; // your mail server i.e mail.mydomain.com
 $username = "tedxp@tedxpompomari.com.ng"; //  your email address (same as webmail username)
 $password = "Magerpink12@"; // your password (same as webmail password)

$smtp = Mail::factory('smtp', array ('host' => $host, 'auth' => true,
'username' => $username,'password' => $password));

$mail1 = $smtp->send($to, $headers, $body);

if (PEAR::isError($mail1)) {
echo("<p>" . $mail1->getMessage() . "</p>");
}
else {
// echo("<p>Message successfully sent!</p>");
 header("Location: ../booking/index.php");
 
// header("Location: http://www.example.com/");
}

 ?>
 
