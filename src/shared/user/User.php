<?php
namespace App;
use App\src\shared\checker\Checker;

abstract class User{
    protected int $id;
    protected string $username;
    protected string $password;
    protected string $email;
    protected string $role;
    
    public function __construct(int $id, string $username, string $password, string $email, string $role){

        $error_message = "";

        if(setId($id) != 0){
            $error_message .= "Bad ID;";
        }
        if(setUsername($username)!= 0){
            $error_message.= "Bad Username;";
        }
        if(setPassword($password)!= 0){
            $error_message.= "Bad Password;";
        }
        if(setEmail($email)!= 0){
            $error_message.= "Bad Email;";
        }
        if(setRole($role)!= 0){
            $error_message.= "Bad Role;";
        }  
             
        if($error_message!= ""){
                throw new \Exception($error_message);
        }
       
       
    
    }
/*---------------GETTERS AND SETTERS-----------------------------------------------*/


/*--------------------ID----------------------------*/
    public function getId(): string{
        return $this->id;
    }
    public function setId($id): int{
        if(Checker::CheckInt($id) == true){
            $this->id = $id;
            return 0;
        }else{
            return -1;
        }

    }
/*--------------------USERNAME----------------------------*/

    public function getUsername(): string{
        return $this->username;
    }
    public function setUsername($username): int{
        if(Checker::CheckString($username) == true){
            $this->username = $username;
            return 0;
        }else{
            return -1;
        }
    }

/*--------------------PASSWORD----------------------------*/

    public function getPassword(): string{
        return $this->password;
    }
    public function setPassword($password): int{
        if(Checker::CheckString($password) == true){
            $this->password = $password;
            return 0;
        }else{
            return -1;
        }
    }

/*--------------------EMAIL----------------------------*/

    public function getEmail(): string{
        return $this->email;
    }
    public function setEmail($email): int{
        if(Checker::CheckString($email) == true){
            $this->email = $email;
            return 0;
        }else{
            return -1;
        }
    }

/*--------------------ROLE----------------------------*/
    public function getRole(): string{
        return $this->role;
    }
    public function setRole($role): int{
        if(Checker::CheckString($role) == true){
            $this->role = $role;
            return 0;
        }else{
            return -1;
        }
    }




}