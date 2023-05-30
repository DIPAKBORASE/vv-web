<?php

// Define some constants
define( "RECIPIENT_NAME", "HSD Uniforms Contact us page" );
//define( "RECIPIENT_EMAIL", "dipen@hsduniforms.com, hema@hsduniforms.com, zaid@hsduniforms.com, priyasonif20@gmail.com, borasedipak18@gmail.com");
$recipients = "dipakweb@viavistas.co.in, borasedipak18@gmail.com";
$email_array = explode(",", $recipients);


// Read the form values
$success = false;
$firstName = isset( $_POST['firstname'] ) ? preg_replace( "/[^\.\-\' a-zA-Z0-9]/", "", $_POST['firstname'] ) : "";
$lastName = isset( $_POST['lastname'] ) ? preg_replace( "/[^\.\-\' a-zA-Z0-9]/", "", $_POST['lastname'] ) : "";
$senderEmail = isset( $_POST['email'] ) ? preg_replace( "/[^\.\-\_\@a-zA-Z0-9]/", "", $_POST['email'] ) : "";
$contactNumber = isset( $_POST['phone'] ) ? preg_replace( "/[^\.\-\' a-zA-Z0-9]/", "", $_POST['phone'] ) : "";
$Subject = isset( $_POST['subject'] ) ? preg_replace( "/[^\.\-\' a-zA-Z0-9]/", "", $_POST['subject'] ) : "";
// $country = isset( $_POST['country'] ) ? preg_replace( "/[^\.\-\' a-zA-Z0-9]/", "", $_POST['country'] ) : "";
$mainSubject = isset( $_POST['message'] ) ? preg_replace( "/(From:|To:|BCC:|CC:|Subject:|Content-Type:)/", "", $_POST['message'] ) : "";

// If all values exist, send the email
// echo $firstName."|".$companyName."|".$senderEmail."|".$contactNumber."|".$Subject."|".$country."|".$mainSubject."|";
// die(__LINE__."<hr>");


if ( $firstName !='' && $lastName !='' && $senderEmail !='' && $contactNumber !='' && $Subject !='' && $mainSubject !='' ) {
  foreach($email_array as $email){
  $to = $email;
  $recipient = RECIPIENT_NAME . " <" . RECIPIENT_EMAIL . ">";
  $headers = "From: " . $senderEmail . "";
  $subject = 'HSD Contact From';
 // $headers = "From: " . $firstName . " Company Name: " . $companyName . "";
  $msgBody = " Sender's Email id: " . $senderEmail . "\n". " Contact Number: " . $contactNumber . "\n". " Subject: " . $Subject . "\n" . " Main Message: " . $mainSubject . "\n". " Company Name: " .$companyName. "";
  $success = mail( $to, $subject, $msgBody, $headers);

  //Set Location After Successsfull Submission
  header('Location: about.html');
    }
}

else{
	//Set Location After Unsuccesssfull Submission
  	header('Location: index.html');	
}

?>