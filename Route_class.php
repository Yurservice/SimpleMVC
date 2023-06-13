<?php 

class Route 
{
	
	public static function start(): void {

        $requestedUrl = $_SERVER['REQUEST_URI'];
        $method = $_SERVER['REQUEST_METHOD'];
        $controller_method = '';
        
        if($requestedUrl === '/') {
            if($method === 'GET') $controller_method = 'actionMainPage';
            else $controller_method = 'actionErrorPage';
        }
        
        if($requestedUrl === '/save_input_value') {
            if($method === 'POST') $controller_method = 'actionSaveInputValue';
            else $controller_method = 'actionErrorPage';
        }

        if($requestedUrl === '/404') {
            $controller_method = 'actionErrorPage';
        }

        $controller = new Controller(); // create Controller object
        if (method_exists($controller, $controller_method)) {
            $controller->$controller_method(); // invoke one of the controller methods if it exists
        }
        else $controller->actionErrorPage(); // invoke actionErrorPage method if request doesn`t fit any controller methods

    }
}

?>