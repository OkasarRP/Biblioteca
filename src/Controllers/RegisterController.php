<?php
    namespace App\Controllers;
    use App\Request;
    use App\Controller;
    use App\View;
    use App\Registry;
    use App\Database\QueryBuilder;

    class RegisterController extends Controller {
        function __construct($session,$request)
        {
            parent::__construct($session,$request); 
        }
        function index(){              
            $data = [
                'error' => ''
            ];
            echo View::render('register',$data);          
        }
        function register():void{
            
            $db=Registry::get('database');
           
            if ($_POST['userName'] != '' || $_POST['password'] != '' || $_POST['email'] != '') {
                $userInputs = [
                    'userName' => htmlspecialchars($_POST['userName']),
                    'email' => htmlspecialchars($_POST['email']),
                    'password' => htmlspecialchars(password_hash($_POST['password'], PASSWORD_DEFAULT)),
                    'idRol' => 4
    
                ];
    
                $db->insert('users', $userInputs);
                
    
                if(!$db){
                    echo View::render('register', [
                        'error' => 'Could not register user'
                    ]);
                }else{
                    //echo View::render('/login');
                    echo View::render('register', [
                        'error' => 'es true el db'
                    ]);
                }
            }else{
                
                echo View::render('register', [
                    'error' => 'Ha habido un error al registrar un usuario'
                ]);
            }
           
        }           

            
    }