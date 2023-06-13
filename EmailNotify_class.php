<?php 

class EmailNotify extends AbstractNotify
{
    
    public function send(string $message): void {
        /* 
            // sending ...
            $sending_res = mail($user['email'], 'Just subject', $message, "From: admin@example.com");
            if ($sending_res) {
                echo "Message has been send";
            } else {
                echo "Sending error!!!";
            }
        
        */
        file_put_contents('LOGFILE.txt',"\r".date("Y-m-d H:i:s").'the message: '.$message.' has been send via EMAIL '.$this->user['email'].' to name: '.$this->user['name'],FILE_APPEND);
    }
}

?>