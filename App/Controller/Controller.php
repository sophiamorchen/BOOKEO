<?php

namespace App\Controller;

use Exception;

class Controller
{    public function route(): void
    {
    if(isset($_GET['controller'])) {
        switch($_GET['controller']){
            case 'page':
                // Charger le controller de page
                $pageController = new PageController();
                $pageController->route();
                break;
            case 'book':
                // Charger le controller de book
                var_dump('On charge la book BookController');
                break;
            default:
                // Erreur
                break;
            }
        } else {
            // Charger la pade d'acceuil
        }
    }
    protected function render(string $path, array $params =[])
    {
        $filePath = __ROOTPATH__.'/templates/'.$path.'.php';

        try {
        if(!file_exists($filePath)){
            // Générer erreur
                throw new Exception("Fichier non trouvé : " . $filePath);
        } else {
            extract($params);
            require_once $filePath;
        }

        }catch(\Exception $e) {

            echo $e->getMessage();
        }
        
    }
}


?>