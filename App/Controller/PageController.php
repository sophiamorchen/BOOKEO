<?php
namespace App\Controller;

use Exception;

class PageController extends Controller
{
    /**
     * Route la requête en fonction du paramètre 'action' dans l'URL.
     *
     * Rôle :
     * - Vérifie si le paramètre 'action' est présent dans $_GET.
     * - Dirige vers la méthode correspondante (about, home, etc.).
     * - Lance une exception si l'action n'existe pas ou si aucun paramètre n'est fourni.
     * - Gère les exceptions pour afficher une page d’erreur via render().
     */
    public function route(): void
    {
        try {
            if (isset($_GET['action'])) {
                // Switch sur la valeur du paramètre 'action'
                switch ($_GET['action']) {
                    case 'about':
                        // Cas où l'on veut afficher la page "about"
                        $this->about();                  
                        break; // Sort uniquement du switch

                    case 'home':
                        // Cas où l'on veut afficher la page "home"
                        $this->home();
                        break; // Sort uniquement du switch

                    default:
                        // Tous les autres cas → action inconnue
                        // Lancer une exception pour que le catch gère l'erreur
                        throw new Exception("Cette action n'existe pas: " . $_GET['action']);
                }
            } else {
                // Aucun paramètre 'action' fourni → lancer une exception
                throw new Exception("Aucune action détectée");
            }
        } catch (Exception $e) {
            // Si une exception est lancée dans le try, on l’attrape ici
            // Affiche une page d'erreur via la méthode render
            $this->render('errors/default', [
                'error' => $e->getMessage() // On transmet le message de l'exception à la vue
            ]);
        }
    }

    /**
     * Méthode pour afficher la page "About".
     * Utilise render pour charger le template correspondant et passer des données.
     */
    protected function about()
    {
        $this->render(
            'page/about', [ // Template à afficher
                'test' => '123',  // Exemple de donnée à passer à la vue
                'test2' => 'def', // Autre donnée
            ]
        );
    }

    /**
     * Méthode pour afficher la page "Home".
     * Utilise render pour charger le template correspondant.
     */
    protected function home()
    {
        $this->render(
            'page/home' // Template à afficher, sans données supplémentaires
        );
    }
}
?>
