<?php
function notification($type, $message)
{
    return "<div class='alert alert-$type alert-dismissible ' role='alert'>
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span
            aria-hidden='true'>×</span>
    </button>
    $message
    </div>";
}
include("../includes/config/init.php");
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

extract($_GET);

// print_r($_GET);
// return false;
// $class_id = $_GET['class_id'];
$students = Student::find_by_query("SELECT * FROM student WHERE current_class_id = $class_id");

// print_r($students);

$student_id = 4;
//Load Composer's autoloader

//Create an instance; passing `true` enables exceptions
foreach ($students as $student) {
    $mail = new PHPMailer(true);

    try {
        //Server settings
        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'paisah12.ia@gmail.com';                     //SMTP username
        $mail->Password   = 'daxabvkhowxdbvsp';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                       //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('paisah12.ia@gmail.com', 'RESULT PROCESSING SYSTEM');
        // $mail->addAddress('paisah12.ia@gmail.com', 'Joe User');     //Add a recipient
        $mail->addAddress($student->parent_email);               //Name is optional
        // $mail->addReplyTo('info@example.com', 'Information');
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');

        //Attachments
        // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        $mail->addAttachment("../result_sheets/$student->id.pdf", $student->id . '.pdf');    //Optional name

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'RESULT';
        $mail->Body    = "<p><b>Congratulations! \n $student->name</b> Download Your Result Below!.</p>";
        // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        // echo 'Message has been sent';
        $_SESSION['msg'] = notification("success", "The Class Selected Result Published");
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        $session->message = notification("danger", "Sorry Somethings' wrong!");
    }
}
header("Location: ../index.php?page=publish_result&class_id=$class_id");