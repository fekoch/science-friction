<?php 
     
    //establish conn to db
    $conn = new mysqli('e93461-mysql.services.easyname.eu', 'u148201db1', '3JAqFhg', 'u148201db1');
    //get values
    $user = $_POST['user'];
    $stars = $_POST['rate'];
    $testimonial = $_POST['testimonial'];
    date_default_timezone_set('UTC');
    $time = date("Y-m-d");

    //do sql and close connection
    $sql = "INSERT INTO `testimonials`(`id`, `user`, `stars`, `testimonial`,`time`) VALUES (NULL,'$user',$stars,'$testimonial','$time')";
    //also send new testimonial to my email
    $content = "User: ".$user." \n Stars: ".$stars." \n Testimonial: ".$testimonial." \n Timestamp: ".$time;
	$headers = "From: Science-Friction <noreply@science-friction.at>" . "\r\n" ."CC: benjaminkr31@gmail.com";
    mail("benjamin@kuermayr.com","New testimonial at Science-Friction",$content,$headers);

    $conn->query($sql);
    $conn->close();
    header("Location: products.html?popup=true");
    exit();
?>