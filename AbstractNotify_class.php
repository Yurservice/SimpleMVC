<?php 

abstract class AbstractNotify 
{
    protected $user;
    
    public function __construct(int $user_id) {
        $some_users = [['name'=>'Oleh','email'=>'oleh@somemail.com','phone'=>'333-33-33'],['name'=>'Ihor','email'=>'ihor@somemail.com','phone'=>'777-77-33']];
        
        $this->user = $some_users[$user_id - 1];
    }

    abstract public function send(string $message): void;

}

?>