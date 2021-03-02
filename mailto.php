<?php 
	/**
	 * Description: contact form script
	 * Author: Benjamin Kürmayr 2AHIT	
 	 * Version: 2018-12-26	
	 */
	//config
	$mailTo = 'benjamin@kuermayr.com';
	$mailHeaders = "From: Science-Friction <noreply@science-friction.at>" . "\r\n" ."CC: benjaminkr31@gmail.com". "\r\n";
	$mailHeaders .= "MIME-Version: 1.0\r\n";
	$mailHeaders .= "Content-Type: text/html; charset=UTF-8\r\n";
	date_default_timezone_set('UTC');
	$timestamp = date("Y-m-d");

	//get form data 
	$name = $_POST['name'];
	$email = $_POST['email'];
	$subject = $_POST['subject'];
	$message = $_POST['message'];

	//build mail body and subject
	$mailBody = "<html><body>";
	$mailBody .= "<b>Timestamp:</b> ".$timestamp."<br><br><hr><br><br> <b>Name:</b> ".$name." <br><br><hr><br><br><b> Email:</b> ".$email." <br><br><hr><br><br> <b>Subject:</b> ".$subject."<br><br><hr><br<br> <b>Message:</b> <br> ".$message." <br><br>";
	$mailBody .= "</body></html>";
	$mailSubject = 'New message at Science-Friction: '.$subject;
	$test = $mailTo . $mailSubject . $mailBody . $mailHeaders;
	//send mail
	$mailSent = mail($mailTo, $mailSubject, $mailBody, $mailHeaders);
	//bestätigungsmail
	$mailBody2 = "
	<!DOCTYPE html><html><body style='background:#C5D687;font-family:Open Sans;'><link href='http://fonts.googleapis.com/css?family=Finger+Paint|Open+Sans' rel='stylesheet' type='text/css'><style>

		/* latin */
	@font-face {
	font-family: 'Finger Paint';
	font-style: normal;
	font-weight: 400;
	src: local('Finger Paint Regular'), local('FingerPaint-Regular'), url(https://fonts.gstatic.com/s/fingerpaint/v8/0QInMXVJ-o-oRn_7dron8YW-9JzT.woff2) format('woff2');
	unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
	}
	/* cyrillic-ext */
	@font-face {
	font-family: 'Open Sans';
	font-style: normal;
	font-weight: 400;
	src: local('Open Sans Regular'), local('OpenSans-Regular'), url(https://fonts.gstatic.com/s/opensans/v15/mem8YaGs126MiZpBA-UFWJ0bbck.woff2) format('woff2');
	unicode-range: U+0460-052F, U+1C80-1C88, U+20B4, U+2DE0-2DFF, U+A640-A69F, U+FE2E-FE2F;
	}
	/* cyrillic */
	@font-face {
	font-family: 'Open Sans';
	font-style: normal;
	font-weight: 400;
	src: local('Open Sans Regular'), local('OpenSans-Regular'), url(https://fonts.gstatic.com/s/opensans/v15/mem8YaGs126MiZpBA-UFUZ0bbck.woff2) format('woff2');
	unicode-range: U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116;
	}
	/* greek-ext */
	@font-face {
	font-family: 'Open Sans';
	font-style: normal;
	font-weight: 400;
	src: local('Open Sans Regular'), local('OpenSans-Regular'), url(https://fonts.gstatic.com/s/opensans/v15/mem8YaGs126MiZpBA-UFWZ0bbck.woff2) format('woff2');
	unicode-range: U+1F00-1FFF;
	}
	/* greek */
	@font-face {
	font-family: 'Open Sans';
	font-style: normal;
	font-weight: 400;
	src: local('Open Sans Regular'), local('OpenSans-Regular'), url(https://fonts.gstatic.com/s/opensans/v15/mem8YaGs126MiZpBA-UFVp0bbck.woff2) format('woff2');
	unicode-range: U+0370-03FF;
	}
	/* vietnamese */
	@font-face {
	font-family: 'Open Sans';
	font-style: normal;
	font-weight: 400;
	src: local('Open Sans Regular'), local('OpenSans-Regular'), url(https://fonts.gstatic.com/s/opensans/v15/mem8YaGs126MiZpBA-UFWp0bbck.woff2) format('woff2');
	unicode-range: U+0102-0103, U+0110-0111, U+1EA0-1EF9, U+20AB;
	}
	/* latin-ext */
	@font-face {
	font-family: 'Open Sans';
	font-style: normal;
	font-weight: 400;
	src: local('Open Sans Regular'), local('OpenSans-Regular'), url(https://fonts.gstatic.com/s/opensans/v15/mem8YaGs126MiZpBA-UFW50bbck.woff2) format('woff2');
	unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
	}
	/* latin */
	@font-face {
	font-family: 'Open Sans';
	font-style: normal;
	font-weight: 400;
	src: local('Open Sans Regular'), local('OpenSans-Regular'), url(https://fonts.gstatic.com/s/opensans/v15/mem8YaGs126MiZpBA-UFVZ0b.woff2) format('woff2');
	unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
	}

	</style><div style='width:100%;height:100%;position:relative;'><div style='padding: 2em;position:absolute;left:50%;top:50%;transform: translate(-50% ,50%) !important;'><h1 style='font-family: Finger Paint; color: #778C47;font-size:30px;text-align:center;'>Dear ".$name."! Thank you for contacting us!</h1><hr style='width: 20%;border:none;height: 4px;color:#778C47;background:#778C47;margin:0 auto;'><h3 style='color:#fff;font-size:22px;text-align:center;'> We will answer you as soon as possible.</h3><br><a style='text-align:center;color:#fff;position: absolute;width:200px;left:50%;transform:translateX(-50%);' href='https://ossblog.at/Website/index.html' target='blank_'><img style='position: absolute;width:80px;left:50%;transform:translateX(-50%);' width='100%' height='auto' src='http://projekte.tgm.ac.at/2ahit/fkoch/img/logo.svg' alt='Logo'/><br><br><br><br> Science-Friction GmbH</a></div></div></body></html>

	";
	$mailHeaders2 = "From: Science-Friction <noreply@science-friction.at>\r\nCC: benjaminkr31@gmail.com\r\nMIME-Version: 1.0\r\nContent-Type: text/html; charset=UTF-8\r\n";
    mail($email,"Bestätigungsemail im Zuge Ihrer Kontaktanfrage / Bestellung",$mailBody2,$mailHeaders2);
	if($mailSent == true){
		header("Location: index.html?popup=true");
	}else{
		header("Location: index.html?popup=false");
	}	
	 
?>