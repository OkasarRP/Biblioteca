<?php
    namespace App\Controllers;
    use App\Request;
    use App\Controller;
    use App\View;
    use App\Registry;
    use App\Database\QueryBuilder;
    use App\Session;
    class LoginController extends Controller {
        function __construct($session,$request)
        {
            parent::__construct($session,$request); 
        }
        function index(){
            echo View::render('login');            
        }
        function validate():void{
            $userInputs = [
                'email' => htmlspecialchars($_POST['email']),
                'password' => htmlspecialchars($_POST['password'])
            ];


            $user = Registry::get('database')->select('users',null,null,['email',"'".$userInputs['email']."'" ]);
            
            new Session();
            $_SESSION['userInfo'] = $user; 

            // dd($user[0]);

            if(password_verify($userInputs['password'], $user[0]->password)){                
                $_SESSION['userInfo'] = $user; 

               header('Location:/index');
                
            }else{
                $this->session->set('error', 'Invalid Credentials');
                header('Location:/login');
                exit();
            }
            // $data = [
            //     'message' => 'Comprueba los credenciales',
            //     'status' => 'danger'
            // ];
            // View::render('login',$data);
            // exit();          
        }

        function logout() {
            session_unset(); 
            header('Location:/index');
        }
        
    }