<?php

namespace App\Controller;

use Exception;

class Controller
{
    /**
     * Route la requête en fonction du paramètre 'controller' dans l'URL.
     * 
     * Rôle :
     * - Vérifie si le paramètre 'controller' est présent dans $_GET.
     * - Dirige vers le bon contrôleur selon la valeur.
     * - Lance une exception si le contrôleur n’existe pas.
     * - Affiche la page d’accueil si aucun contrôleur n’est fourni.
     * - Gère les exceptions pour afficher une page d’erreur via render().
     */
    public function route(): void
    {
        try {
            if (isset($_GET['controller'])) {
                switch ($_GET['controller']) {
                    case 'page':
                        // Cas où l'on veut charger le controller de page
                        $pageController = new PageController();
                        $pageController->route(); // Appelle la route spécifique du PageController
                        break; // Sort uniquement du switch, la fonction continue après le switch si besoin

                    case 'book':
                        // Cas où l'on veut charger le controller de book
                        $pageController = new BookController();
                        $pageController->route(); // Appelle la route spécifique du PageController                        
                        break;
                    default:
                        // Tous les autres cas → le contrôleur n'existe pas
                        // Lancer une exception pour que le catch puisse gérer l'erreur
                        throw new Exception("Le controller n'existe pas");
                }
            } else {
                // Cas où aucun contrôleur n’est passé dans l'uurl → charger la page d’accueil
                $pageController = new PageController();
                $pageController->home(); // Appelle la route spécifique du PageController
                // ne pas faire $this-render(home) ->on ne passe pas par un controller spécifique, ce n'est pas respecter le MVC et moins de flexibilité pour récupérer les données.
            }
        } catch (Exception $e) {
            // Si une exception est lancée dans le try, on l’attrape ici
            // Affiche une page d'erreur en utilisant la méthode render
            $this->render('errors/default', [
                'error' => $e->getMessage() // On transmet l'objet Exception à la vue pour afficher le message
            ]);
        }
    }

    /**
     * Affiche un template avec les paramètres fournis.
     * 
     * @param string $path   Nom du template à charger (sans .php)
     * @param array  $params Tableau associatif de variables à extraire dans la vue
     */
    protected function render(string $path, array $params = [])
    {
        $filePath = __ROOTPATH__ . '/templates/' . $path . '.php';

        try {
            if (!file_exists($filePath)) {
                // Si le fichier n'existe pas, on lance une exception
                throw new Exception("Fichier non trouvé : " . $filePath);
            } else {
                // On rend les paramètres disponibles dans le template
                extract($params); // transforme ['title'=>'Bonjour'] en $title='Bonjour'
                require_once $filePath; // Inclut le fichier template
            }
        } catch (Exception $e) {
            // Si le template n’existe pas ou une erreur survient, on affiche le message
            $this->render('errors/default', [
                'error' => $e->getMessage() // On transmet l'objet Exception à la vue pour afficher le message
            ]);
        }
    }
}