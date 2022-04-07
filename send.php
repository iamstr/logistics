    <?php
    require_once "config.php";

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;



    require_once 'vendor/autoload.php';

    $valid = array();
    if (isset($_POST['email'])) {




        //Load Composer's autoloader


        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);


        $emailId = $_POST['email'];
        $message = $_POST['message'];
        $name = $_POST['fullname'];
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
            $mail->Body    =  " i am $name <br/>" . $message . " <br/> Here is my mobile phone $phone and here's my $emailId,   contact me when you get this ";
            if ($mail->Send()) {
                $valid["message"] = "We got your message we will get back to you as soon as possible";
                $valid["success"] = true;
            } else {
                $valid["message"] = " something happened ";
                $valid["success"] = false;
            }
        } else {
            $valid["message"] = " fill in all the required fields ";
            $valid["success"] = false;
        }
    }

    echo json_encode($valid);
    ?>