<?php
	if (isset($_POST['fromEmail']) && isset($_POST['toEmail']) && isset($_POST['subject']) && isset($_POST['message'])) {
		
		$emailTo = $_POST['toEmail'];
		
		$subject = $_POST["subject"];
		
		$message = $_POST["message"];
		
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
		$headers .= "From: ".$_POST["fromEmail"] . "\r\n";
		$headers .= "Reply-To: ".$_POST["fromEmail"] . "\r\n"; 
		$headers .= "Return-Path: ".$_POST["fromEmail"] . "\r\n";
		
		if(mail($emailTo, $subject, $message, $headers)){
			$data['message'] = "<strong>You'r email has been sent!</strong>";
		} else {
			$data['error'] = '<div class="alert alert-danger" role="alert">Your message could not be sent, please try again later. </div>';
		}
	} else {
		$data['error'] = "Error 1: something is wrong, please try again later(PHP)";
	}
	echo json_encode($data);
?>