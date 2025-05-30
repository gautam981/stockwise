<?PHP
	include 'connection.php';
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;
	
 	function sendemail_verify($name,$email,$token)
 	{

 //Import PHPMailer classes into the global namespace
 //These must be at the top of your script, not inside a function


 //Load Composer's autoloader
 include 'PHPMailer-master/src/Exception.php';
 include 'PHPMailer-master/src/PHPMailer.php';
 include 'PHPMailer-master/src/SMTP.php';
 //Create an instance; passing `true` enables exceptions
 $mail = new PHPMailer(true);

 try {
     //Server settings
     // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
     $mail->isSMTP();                                            //Send using SMTP
     $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
     $mail->Username   = 'stockwise.thapar@gmail.com';                     //SMTP username
     $mail->Password   = 'ihsh anaf oyti tyvi';                               //SMTP password
     $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
     $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

     //Recipients
     $mail->setFrom('stockwise.thapar@gmail.com', 'StockWise');
     $mail->addAddress($email, $name);
     //Content
     $mail->isHTML(true);                                  //Set email format to HTML
     $mail->Subject = 'E-Mail Verification of the new Registration for StockWise';
     $mail->Body    = "<h1>Hi ".$name.",</h1> <h2>Please verify Your E-Mail ID with the OTP (One-Time Password): ".$token."</h2>";

     $mail->send();
 } catch (Exception $e) {
     echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
 }
 }
?>