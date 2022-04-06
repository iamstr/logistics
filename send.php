    <?php

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;


    require_once "config.php";
    require_once 'vendor/autoload.php';

    $valid["message"] = "something went wrong ";
    if (isset($_POST['email'])) {




        //Load Composer's autoloader


        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);


        $emailId = $_POST['email'];
        $message = $_POST['message'];
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $subject = $_POST['subject'];



        if (isset($emailId)) {





            $mail = new PHPMailer();

            $mail->CharSet =  "utf-8";
            // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output

            $mail->IsSMTP();
            // enable SMTP authentication
            $mail->SMTPAuth = true;
            // GMAIL username
            $mail->Username = $mailconfig["username"];
            // GMAIL password
            $mail->Password = $mailconfig["password"];
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            // sets GMAIL as the SMTP server
            $mail->Host = $mailconfig["host"];
            // set the SMTP port for the GMAIL server
            $mail->Port = $mailconfig["port"];
            $mail->From = $emailId;
            $mail->FromName = $name;
            $mail->AddAddress($mailconfig["username"], $name);

            $mail->Subject  =  $subject . " Quotation";
            $mail->IsHTML(true);
            $mail->Body    =  $message . "  Here is my mobile phone ,contact me when you get this " . $phone;
            if ($mail->Send()) {
                $valid["message"] = "We got your message we will get back to you as soon as possible";
            } else {
                $valid["message"] = " something happened ";
            }
        } else {
        }
    }

    echo json_encode($valid);
    ?>