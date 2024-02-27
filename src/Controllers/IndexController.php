<?php
    namespace App\Controllers;
    use App\Request;
    use App\Controller;
    use App\View;
    class IndexController extends Controller {
        function __construct($session,$request)
        {
            parent::__construct($session,$request); 
        }
        function index(){
            if(isset($_SESSION['userInfo'])){
                $data=[
                    'title'=>'Bookasar',                    
                    'description'=> 'Catalogo de libros',
                ];
            }else{
                $data=[
                    'title'=>'Bookasar',                
                    'user'=>'',
                ];

            }
            

            echo View::render('home',$data);
            
        }
    
    
        
    }
    