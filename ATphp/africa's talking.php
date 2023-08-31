<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <title>Africas Talking</title>
</head>

<body><center>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <table>
            <tr>
                <td>Phone Number:</td>
                <td><input type="text" name="phone_number" /></td>
            </tr>
            <tr>
                <td>Message:</td>
                <td><textarea name="message"></textarea></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" name="submit" value="Send" /></td>
            </tr>
        </table>
        <?php
        
        if(isset($_POST['submit'])){
           @ $phone=$_POST['phone_number'];
           @ $message=$_POST['message'];
            require_once 'sms.php';
            $username   = "soroel";
            $apiKey     = "4b04974557ed796e6978f3af009758e104d6284be7bd5e657eba9c8d443043b2";
            $recipients = $phone;
            $message    = $message;
            $gateway    = new AfricasTalkingGateway($username, $apiKey);
            try 
            { 
              $results = $gateway->sendMessage($recipients, $message);
                        
              foreach($results as $result) {
                // status is either "Success" or "error message"
                echo " Number: " .$result->number;
                echo " Status: " .$result->status;
                echo " MessageId: " .$result->messageId;
                echo " Cost: "   .$result->cost."\n";
              }
            }
            catch ( AfricasTalkingGatewayException $e )
            {
              echo "Encountered an error while sending: ".$e->getMessage();
            }

        }