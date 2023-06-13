<?php 

class SmsNotify extends AbstractNotify
{
    public function send(string $message): void {
        /* 
            // sending ...
            $sending_res = sendSMS($user['phone'], $message);
            if ($sending_res) {
                echo "Message has been send";
            } else {
                echo "Sending error!!!";
            }
        
        */
        file_put_contents('LOGFILE.txt',"\r".date("Y-m-d H:i:s").'the message: '.$message.' has been send via SMS to phone: '.$this->user['phone'].' to name: '.$this->user['name'],FILE_APPEND);
    }
}

?>