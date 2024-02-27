<?php
    namespace App\Controllers;
    use App\Request;
    use App\Controller;
    use App\View;
    class UserController extends Controller {
      
        function __construct($session,$request)
        {
            parent::__construct($session,$request);
            
         
        }
        function index(){
            echo View::render('user');
        }
        static function roleTranslate(int $role):string{
            switch ($role) {
                case 1:
                    return "Admin";
                    
                    break;
                case 2:
                    return "Librarian";
                    
                    break;
                case 3:
                    return "Reader";
                    
                    break;
                case 4:
                    return "Registered";
                    
                break;    
            }
        }
       
    }