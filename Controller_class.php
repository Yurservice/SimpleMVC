<?php 

class Controller
{
    public function actionMainPage(): void {
        $model = new MainModel();
        session_start();
        $_SESSION['csrf_token'] = $this->generateCSRFToken();
        View::render('MainPage', 'something');
    }

    public function actionSaveInputValue(): void {
        $some_user_id = 1;
        try {
            session_start();
            $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';
            if ($contentType === "application/json") {
                $content = trim(file_get_contents("php://input"));
                $decoded = json_decode($content, true);
                if (is_array($decoded)) {
                    if (isset($decoded['csrf']) && $decoded['csrf'] === $_SESSION['csrf_token']) {
                        if (array_key_exists('value', $decoded)) {
                            $model = new MainModel();
                            $row_id = $model->setData($decoded['value']);
                            $result = $model->getRowById($row_id);
                            $record = $result['something'];

                            // sending message
                            $email = new EmailNotify($some_user_id);
                            $email->send($record);
                            $sms = new SmsNotify($some_user_id);
                            $sms->send($record);

                            echo json_encode($record);
                        }
                        else throw new Exception("No required data");
                    }
                    else throw new Exception("CSRF token is invalid");
                } 
                else throw new Exception("Wrong JSON format");
            }
            else throw new Exception("Wrong contentType");
        } catch (\Throwable $e) {
            http_response_code(500);
            $response = array(
                'message' => 'An error has occurred:',
                'error' => $e->getMessage()
            );
            echo json_encode($response);
        }
    }
    
    public function actionErrorPage(): void {
        View::render('ErrorPage', '');
    }

    private function generateCSRFToken(): string {
        return bin2hex(random_bytes(32));
    }
}