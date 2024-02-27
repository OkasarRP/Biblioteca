

<?php   
    use App\Controllers\UserController;
    use App\Controllers\BookController;
    use App\Registry;
    use App\Database\QueryBuilder;
    include_once 'partials/header.tpl.php';
?>

<body>
<?php include_once 'partials/nav.tpl.php';?>
    <div>
    <h1>Home</h1>
    <h2><?=$title;?></h2>
    <?php     
    
        if(!isset($_SESSION['userInfo'])){     
        echo '<div>
                <h1>Subscribete para poder ver los libros</h1>       
            </div>';
        }else{
            // dd($_SESSION['userInfo'][0]->userName);
            echo "<h2> Bienvenido ".$_SESSION['userInfo'][0]->userName."</h2>";
            
            echo "<h2> Rol:". UserController::roleTranslate((int)$_SESSION['userInfo'][0]->idRol) ."</h2>";
            echo '<div>
                    <h1>'.$description.'</h1>       
                </div>';

            echo '<div class="bookSlot">';
            $db = Registry::get('database');    
            $books = $db->selectAll('books');
            $cont = 0;
            foreach($books as $book){
                BookController::printBook($book,$cont);
                $cont++;
            }
            echo '</div>';


        }    
    
    ?>


    <script src=src\views\js\script.js></script>
</body>

</html>