<?php

namespace App\Controller;

use App\Repository\BookRepository;

use Exception;

class BookController extends Controller
{
    /**
     * Route la requête en fonction du paramètre 'action' dans l'URL.
     *
     * Rôle :
     * - Vérifie si le paramètre 'action' est présent dans $_GET.
     * - Dirige vers la méthode correspondante (show, list, etc.).
     * - Lance une exception si l'action n'existe pas ou si aucun paramètre n'est fourni.
     * - Gère les exceptions pour afficher une page d’erreur via render().
     */
    public function route(): void
    {
        try {
            if (isset($_GET['action'])) {

                switch ($_GET['action']) {
                    case 'show':
                        $this->show();
                        break;
                    case 'list':
                        // appeller la methode list()
                        break;
                    case 'edit':
                        // appeller la methode edit()
                        break;
                    case 'add':
                        // appeller la methode add()
                        break;
                    case 'delete':
                        // appeller la methode delete()
                        break;
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
     * Méthode pour afficher la page "Show".
     * Utilise render pour charger le template correspondant et passer des données.
     */
    protected function show()
    {
        try {
            if (isset($_GET['id'])) {
                $id = (int)$_GET['id'];
                $bookRepository = new BookRepository;
                $book = $bookRepository->findOneById($id);
                // Cherger le livre par un appel au repository
                $this->render('book/show', [ // Template à afficher
                        'book' => $book,  // Exemple de donnée à passer à la vue
                        // '' => ''; Autre donnée
                    ]);
            } else {
                throw new Exception("L'id est manquant en paramètre");
            }
        } catch (Exception $e) {
            $this->render('errors/default', [
                'error' => $e->getMessage()
            ]);
        }
    }
}