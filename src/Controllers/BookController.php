<?php
namespace App\Controllers;
use App\Request;
use App\Controller;
use App\View;

class BookController extends Controller {
      
    function __construct($session, $request)
    {
        parent::__construct($session, $request);
    }

    public static function printBook($book, $i): void {
        echo '<div id="card_'.$i.'" class="bookcard">';
        echo '<form method="post" action="/book/read">';
        
        echo '<input type="hidden" name="book" value="' . $book->title . '">';
        echo '<div class="title">'. $book->title .'</div>';
        echo '<div class="img"><img src="src\assets\\'.$book->title.'.jpg" alt="bookimg"></div>';
        echo '<div class="subtitle">'. $book->genre .'</div>';
        echo '<div class="subtitle">'. $book->author .'</div>';
        echo '<input value="read" type="submit">';
        echo '</form>';
        echo '</div>';
    }
    public function read(){
        // Ruta al archivo PDF
        $rutaArchivo = 'src/books/'.$_POST['book'].'.pdf';

        // Verificar si el archivo existe
        if (file_exists($rutaArchivo)) {
            // Establecer las cabeceras HTTP
            header('Content-Type: application/pdf');
            header('Content-Disposition: inline; filename="' . basename($rutaArchivo) . '"');
            header('Content-Length: ' . filesize($rutaArchivo));

            // Leer el contenido del archivo y mostrarlo en el navegador
            readfile($rutaArchivo);
            exit;
        } else {
            // El archivo no existe
            echo 'El archivo no se encontró.';
        }
        
    }

   
}

?>
