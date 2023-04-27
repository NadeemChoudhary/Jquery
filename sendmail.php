<?php


// Email address verification

function isEmail($email) {
    return(preg_match("/^[-_.[:alnum:]]+@((([[:alnum:]]|[[:alnum:]][[:alnum:]-]*[[:alnum:]])\.)+(ad|ae|aero|af|ag|ai|al|am|an|ao|aq|ar|arpa|as|at|au|aw|az|ba|bb|bd|be|bf|bg|bh|bi|biz|bj|bm|bn|bo|br|bs|bt|bv|bw|by|bz|ca|cc|cd|cf|cg|ch|ci|ck|cl|cm|cn|co|com|coop|cr|cs|cu|cv|cx|cy|cz|de|dj|dk|dm|do|dz|ec|edu|ee|eg|eh|er|es|et|eu|fi|fj|fk|fm|fo|fr|ga|gb|gd|ge|gf|gh|gi|gl|gm|gn|gov|gp|gq|gr|gs|gt|gu|gw|gy|hk|hm|hn|hr|ht|hu|id|ie|il|in|info|int|io|iq|ir|is|it|jm|jo|jp|ke|kg|kh|ki|km|kn|kp|kr|kw|ky|kz|la|lb|lc|li|lk|lr|ls|lt|lu|lv|ly|ma|mc|md|mg|mh|mil|mk|ml|mm|mn|mo|mp|mq|mr|ms|mt|mu|museum|mv|mw|mx|my|mz|na|name|nc|ne|net|nf|ng|ni|nl|no|np|nr|nt|nu|nz|om|org|pa|pe|pf|pg|ph|pk|pl|pm|pn|pr|pro|ps|pt|pw|py|qa|re|ro|ru|rw|sa|sb|sc|sd|se|sg|sh|si|sj|sk|sl|sm|sn|so|sr|st|su|sv|sy|sz|tc|td|tf|tg|th|tj|tk|tm|tn|to|tp|tr|tt|tv|tw|tz|ua|ug|uk|um|us|uy|uz|va|vc|ve|vg|vi|vn|vu|wf|ws|ye|yt|yu|za|zm|zw)$|(([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5])\.){3}([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5]))$/i", $email));
}

if($_POST) {

    // Enter the email where you want to receive the notification when someone subscribes
    $emailTo = 'info@probityca.com';
	//$emailTo = 'mr.yash007@gmail.com';

    $subscriber_name = ($_POST['name']);
    $subscriber_email = ($_POST['email']);
	$subscriber_company = ($_POST['company']);
    $subscriber_phone = ($_POST['phone']);
    $subscriber_query = ($_POST['message']);

    if(!isEmail($subscriber_email)) {
        $array = array();
        $array['valid'] = 0;
        $array['message'] = 'Insert a valid email address!';
        echo json_encode($array);
    }
    else {
        $array = array();
        $array['valid'] = 1;
        $array['message'] = 'Thanks for showing your interest!';
        echo json_encode($array);

        // Send email
	$subject = 'Probity Query from new Customer';
	$body = "You have a new query from Probity Website with following details:\n\nName: " . $subscriber_name . "\nEmail: " . $subscriber_email . "\nCompany: " . $subscriber_company . "\nPhone: " . $subscriber_phone ."\nMessage: " . $subscriber_query;
	

        // uncomment this to set the From and Reply-To emails, then pass the $headers variable to the "mail" function below
	//$headers = "From: ".$subscriber_email." <" . $subscriber_email . ">" . "\r\n" . "Reply-To: " . $subscriber_email;
	mail($emailTo, $subject, $body);
    }

}

?>



<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>

<head>
<title>Form to contact with Probity</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body bgcolor="#ffffff" text="#000000">

<div>
<center>
<b>Thank you <?php if(isset($_REQUEST['name'])){print stripslashes($_REQUEST['name']);} ?></b>
<br>Your query has been sent.
<br>We will get in touch with you soon.
<p><a href="" onclick="window.close();">Click here to continue</a></p>
</center>
</div>

</body>
</html>
