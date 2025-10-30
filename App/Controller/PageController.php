<?php 
namespace App\Controller;

class PageController extends Controller
{
    public function route(): void
    {
        if(isset($_GET['action'])) {
            switch($_GET['action']){
                case 'about':
                    // On appelle la méthode about()
                    $this->about();                  
                    break;
                case 'home':
                    // On appelle la methode "home"
                    var_dump('On appelle la methode home()');
                    break;
                default:
                    // Erreur
                    break;
                }
            } else {
                // On charge la pade d'acceuil
            }
        }
    protected function about()
    {
        //tableau avec les parametres qu'on va vouloir passer à la vue
        $params = [
            'test' => 'abc',
            'test2' => 'def',
        
        ];
        $this->render('page/about', $params);
    }
    //    Option - Symfony : passer les params direct en "parametres"
    //     $this->render('page/about', [
    //         'test' => 'abc',
    //         'test2' => 'def',
    //     ]);
    // }
}