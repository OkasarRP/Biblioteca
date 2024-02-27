<?php
    namespace App\Controllers;
    use App\Request;
    use App\Controller;
    use App\View;
    use App\Registry;
    use App\Database\QueryBuilder;

    class SubscriptionController extends Controller {
        function __construct($session,$request)
        {
            parent::__construct($session,$request); 
        }
        function index(){              
            $data = [
                'idSubscription' => ''
            ];
            echo View::render('subscription',$data);          
        }
        function subscription(){ 
            $sub = $_POST['sub'];
            // Crear objetos DateTime para la fecha de inicio y finalización
            $startDate = new \DateTime();
            $finishDate = new \DateTime();
        
            switch ($sub){
                case 'Reader':
                    $sub = 3;
                    break;
                case 'Librarian':
                    $sub = 2;
                    break;
                case 'Registered':
                    $sub = 4;
                    break;
            }
            $role = ['idRol' => $sub];
            $db = Registry::get('database');
        
            if($role['idRol'] != 4 ){
                try {    
                    // Agregar un mes a la fecha de inicio para obtener la fecha de finalización
                    $finishDate->modify('+1 month');
        
                    $data = [
                        'IdUser' => $_SESSION['userInfo'][0]->idUser,
                        'startDate' => $startDate->format('Y-m-d'),
                        'endDate' => $finishDate->format('Y-m-d')
                    ];
        
                    $db->insert('subscriptions', $data);    
                    $db->update('users', $role, $_SESSION['userInfo'][0]->idUser, true);
                    $_SESSION['userInfo'][0]->idRol = $role['idRol'];
        
                    header('Location:/index');

                
                } catch(Exception $e) {
                    echo ' no funciona';
                }
            } else {
               
                $db->update('users', $role, $_SESSION['userInfo'][0]->idUser, true);
                $_SESSION['userInfo'][0]->idRol = $role['idRol'];

                header('Location:/subscription/index');
            }            
        }
        
            
    }