<?php
// mszt cdmm ddnu adre

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$mail = new PHPMailer();
try {
    $mail->isSMTP();
    $mail->SMTPDebug = 0;
    $mail->SMTPSecure = 'tls';
    $mail->SMTPAuth = true;
    $mail->Port = 587;
    $mail->Host = 'smtp.gmail.com';
    $mail->Username = '21bmiit137@gmail.com'; // enter your mail address
    $mail->Password = 'msztcdmmddnuadre'; // enter your email password
    $mail->setFrom('21bmiit137@gmail.com', 'Mobile Shop'); // Set sender of the mail
    // $mail->Port = 587;
    // $mail->addAddress('rohannarigara22@gmail.com');
    // $mail->isHTML(true); // Set email format to plain text
    // $mail->Subject = 'Hello, World!';
    // $mail->Body = '<h1>This is a test email sent from PHPMailer.</h1>';
    // $mail->AltBody = 'Body in plain text for non-HTML mail clients';
    // $mail->send();


    // // Generate a random 6-digit OTP
    // $otp = rand(100000, 999999);

    // // Send the OTP to the user's email
    // $subject = "Your Login Code";
    // $message = "<b>Your OTP $otp</b>";

    // $mail->addAddress("rohannarigara22@gmail.com");
    // $mail->isHTML(true);
    // $mail->Subject = $subject;
    // $mail->Body = " Hello  there, $message";
    //     // <html>
    //     // <head>
    //     //     <style>
    //     //     body {
    //     //       font-family: Arial, sans-serif;
    //     //       margin: 0;
    //     //       padding: 0;
    //     //       background-color: #ffffff;

    //     //   }
    //     //   .container {
    //     //       max-width: 500px;
    //     //       margin: 0 auto;
    //     //       padding-top: 5px;
    //     //       background-color: #fffee8;
    //     //       border-radius: 5px;
    //     //       box-shadow: 0px 5px 8px rgba(0, 0, 0, 0.7);
    //     //   }
    //     //   .header {
    //     //       text-align: center;
    //     //       margin-bottom: 20px;
    //     //   }
    //     //   hr{
    //     //     background-color: #000000;
    //     //     border: none;
    //     //     width: 100%;
    //     //     height: 1px;
    //     //   }
    //     //   .otp-code {
    //     //       text-align: center;
    //     //       font-size: 30px;
    //     //       font-weight: bold;
    //     //       color: #f00028;
    //     //       margin-bottom: 40px;
    //     //   }
    //     //   .instructions {
    //     //       text-align: center;
    //     //       font-size: 16px;
    //     //       color: #000000;
    //     //       margin-bottom: 30px;
    //     //   }
    //     //   .footer {
    //     //       background-color: #faec2f;
    //     //       color: rgb(0, 0, 0);
    //     //       text-align: center;
    //     //       padding: 12px;
    //     //       margin-top: 40px;


    //     //   }
    //     //     </style>
    //     // </head>
    //     // <body>
    //     //     <div class='container'>
    //     //         <div class='header'>
    //     //             <h1>OTP Verification</h1>
    //     //           </div>
    //     //           <hr>
    //     //           <div class='instructions'>
    //     //               <p>Please Use The OTP</p>
    //     //           </div>
    //     //         <div class='otp-code'>
    //                 // $message
    //     //         </div>
    //     //         <div class='footer'>
    //     //           &copy; 2023 Mobile Managment System.  All rights reserved
    //     //         </div>
    //     //     </div>
    //     // </body>
    //     // </html>
    // // ";
    // $mail->AltBody = 'Body in plain text for non-HTML mail clients';
    // $mail->send();

} catch (Exception $e) {
    $e->getMessage();
}
