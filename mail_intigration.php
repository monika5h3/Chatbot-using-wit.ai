<?php
require_once "database/functions.php";
require_once("database/config.php");
error_reporting(0);


$mail_status = "";

    $std_name = $_POST['std_name'];
    $email = $_POST['mail'];
    $mob_num = $_POST['mob_num'];
    $feedback = $_POST['feedback'];

        date_default_timezone_set("Asia/Kolkata");   //India time (GMT+5:30)

      
            require_once "email/PHPMailer/PHPMailer.php";
            require_once "email/PHPMailer/SMTP.php";
            require_once "email/PHPMailer/Exception.php";
            require_once "email/PHPMailer/PHPMailerAutoload.php";
    

            $subject = "Feed Back";
           $body = '<div>Student Mail : '.$email.'<br>Mobile Number : '.$mob_num.'<br>Feed Back :'.$feedback.'</div>';
            
    
            $mail = new PHPMailer();
    
            // SMTP Settings
            $mail->isSMTP();
            $mail->Host = "smtp.gmail.com";//$email
            $mail->SMTPAuth = true;
            $mail->Username = "chatbotraghu@gmail.com";
            $mail->Password = 'Shyam@123';
            $mail->Port = 465; //587
            $mail->SMTPSecure = "ssl"; //tls
    
            //Email Settings
            $mail->isHTML(true);
            $mail->setFrom("chatbotraghu@gmail.com",$std_name);
            //$mail->addReplyTo('padalarohitkumar@gmail.com', 'padala');
            $mail->addAddress("chatbotraghu@gmail.com.com");
            $mail->Subject = $subject;
            $mail->Body = $body;
            if($mail->send())
            {

                $mail_status="Mail Sent!";
                $feedback_query = mysqli_query($conn, "insert into admin_feedback(studen_name,mobile,student_email,feed_back) values('$std_name','$mob_num','$email','$feedback')") or die(mysqli_error());
    
            }
            else
            {
                $mail_status="Mail not sent!";
            }
 // echo $mail_status);
    exit(json_encode(array("mail_status" => $mail_status)));


?>