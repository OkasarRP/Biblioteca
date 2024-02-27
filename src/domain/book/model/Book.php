<?php

namespace App;
use App\src\shared\checker\Checker;

class Book{ 

    protected int $id;
    protected string $title;
    protected string $author;
    protected string $genre;
    protected bool $available;

    public function __construct(int $id, string $title, string $author, string $genre , bool $available){

        $error_message = "";

        if(setId($id) != 0){
            $error_message .= "Bad ID;";
        }
        if(setTitle($title)!= 0){
            $error_message.= "Bad Title;";
        }
        if(setAuthor($author)!= 0){
            $error_message.= "Bad Author;";
        }
        if(setGenre($genre)!= 0){
            $error_message.= "Bad Genre;";
        }
        if(setAvailable($available)!= 0){
            $error_message.= "Bad Available;";
        }
        
        if($error_message!= ""){
            throw new \Exception($error_message);
        }

     

    }
/*-------GETTERS AND SETTERS----------------------------------------------------- */
    /*-----------ID----------------------- */
    public function getId(): int{
        return $this->id;
    }

    public function setId(int $id):int{
        if(Checker::CheckInt($id) == 0){
            $this->id = $id;
            return 0;
        }else{
            return -1;

        }
    }
    
    /*-----------TITLE----------------------- */
    public function getTitle(): string{
        return $this->title;
    }
    
    public function setTitle(string $title):int{
        if(Checker::CheckString($title) == 0){
            $this->title = $title;
            return 0;
        }else{
            return -1;
        }
    }
    
    /*-----------AUTHOR----------------------- */
    public function getAuthor(): string{
        return $this->author;
    }
    
    public function setAuthor(string $author):int{
        if(Checker::CheckString($author) == 0){
            $this->author = $author;
            return 0;
        }else{
            return -1;
        }
    }
    
    /*-----------GENRE----------------------- */
    public function getGenre(): string{
        return $this->genre;
    }
    
    public function setGenre(string $genre):int{
        if(Checker::CheckString($genre) == 0){
            $this->genre = $genre;
            return 0;
        }else{
            return -1;
        }
    }
    
    /*-----------AVAILABLE----------------------- */
    public function getAvailable(): bool{
        return $this->available;
    }
    
    public function setAvailable(bool $available):int{
        if(Checker::CheckBool($available) == 0){
            $this->available = $available;
            return 0;
        }else{
            return -1;
        }
    }

 

}