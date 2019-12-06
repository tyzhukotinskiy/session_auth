<?php
class Session{
    public $name;
    public $savePath;
    public function getName(){
        return $this->name;
    }
    public function getSavePath(){
        return $this->savePath;
    }
    public function setName($name){
        if(!$this->sessionExist()){
            $this->name = $name;
            session_name($this->name);
        }
        else throw new Exception('Запущена сессия!!!');
    }
    public function setSavePath($path){
        if(!$this->sessionExist()){
            $this->savePath = $path;
        }
        else throw new Exception('Запущена сессия!!!');
    }
    public function set($key, $val){
        if($this->sessionExist()){
            $_SESSION[$key] = $val;
        }
        else {
            throw new Exception("Can't set unstarted session value");
        }
    }
    public function get($key){
        print_r($_SESSION);
        if($this->sessionExist()){
            return $_SESSION[$key];
        }
        else throw new Exception("Can't get some value for $key");
    }
    public function contains($key){
        if($this->sessionExist()){
            if($_SESSION[$key]){
                return true;
            }
            else return false;
        }
        else throw new Exception('Not start session');
    }
    public function delete($key){
        if($this->sessionExist()){
            if($_SESSION[$key]){
                unset($_SESSION[$key]);
            }
            else {
                throw new Exception("Not found $"."_"."SESSION[$key]");
            }
        }
        else{
            throw new Exception("can't delete some session values because not start session");
        }
    }
    public function start(){
        if($this->sessionExist()){
            echo "Ceccia zapushchena!";
            echo "-------".$this->sessionExist();

        }
        else{ session_start();}
    }
    public function cookieExist(){
        if(isset($_COOKIE['PHPSESSID'])) return $_COOKIE['PHPSESSID'];
        else return false;
    }
    public function sessionExist(){
        return session_status() === PHP_SESSION_ACTIVE ? TRUE : FALSE;
    }
}
?>