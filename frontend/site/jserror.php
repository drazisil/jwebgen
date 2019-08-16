<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

// Report all PHP errors
//error_reporting(-1);

date_default_timezone_set('America/Chicago');

include('Mail.php'); 
include('Mail/mime.php'); 
include('Mail/mail.php');     // adds the enhanced send function 

$text = 'JS Error from JWebGen'; 
$html = '<html><body>Error occurred > '.date('l jS \of F Y h:i:s A').'<pre>'; 
$html .= htmlspecialchars(print_r($_POST, true)); 
$html .= explode("\n", htmlspecialchars(print_r($_POST, true))); 
$html .= '</pre></body></html>'; 
$crlf = "\n"; 
$hdrs1 = array( 
              'From'    => 'JWebGen JS Errors <jwbecher@jwebgen.com>', 
              'Subject' => 'JS Error from JWebGen' 
              ); 

$mime = new Mail_mime($crlf); 

$mime->setTXTBody($text); 
$mime->setHTMLBody($html); 
//$mime->addAttachment($file, 'text/plain'); 

//do not ever try to call these lines in reverse order 
$body = $mime->get(); 
$hdrs2 = $mime->headers($hdrs1); 

$mail =& Mail::factory('mail','-f jwbecher@gmail.com');   // add the fifth parameter for the PHP mail() function 
$mail->send('jwbecher@gmail.com', $hdrs2, $body); 

