<?php 

class View 
{
    public static function render(string $template_name, string $data) {
        $template = 'Pages/'.$template_name.'.tpl';
		ob_start();
		include($template);
		echo ob_get_clean();
    }
}

?>