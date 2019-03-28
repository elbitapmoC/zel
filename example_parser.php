<?php
if( isset($_POST['formName']) && isset($_POST['formEmail']) && isset($_POST['formMessage']) ){
	$n = $_POST['formName']; // HINT: use preg_replace() to filter the data
	$e = $_POST['formEmail'];
	$h = $_POST['formHear'];
	$s = "";

	if (!empty( $_POST['formService1'])){
		$s .=  $_POST['formService1'];
	}
	if (!empty( $_POST['formService2'])){
		$s .=  $_POST['formService2'];
	}
	if (!empty( $_POST['formService3'])){
		$s .=  $_POST['formService3'];
	}

	$m = nl2br($_POST['formMessage']);
	$to = "me@BazellP.com";	
	$from = $e;
	$subject = 'Contact Form Message';
	$message = "<b>Name:</b> ".$n." <br><b>Email:</b> ".$e."<br><b>How I found you:</b>".$h."<br><b>I'm interested in:</b>".$s.'<br><p>'.$m."</p>";
	$headers = "From: $from\n";
	$headers .= "MIME-Version: 1.0\n";
	$headers .= "Content-type: text/html; charset=iso-8859-1\n";
	if( mail($to, $subject, $message, $headers) ){
		echo "success";
	} else {
		echo "The server failed to send the message. Please try again later.";
	}
}
?>