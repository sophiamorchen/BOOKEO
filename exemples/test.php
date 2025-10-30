<?php
// indispensable. Nécessaire uniquement sur le index.php en "porte d'entrée" 
// et il ne reste plus qu'à faire les "use" !
// même principe que le SESSION_START()

spl_autoload_register();

use Modules\Chat\Message as chatMessage;
use Modules\Forum\Message as forumMessage;

$chatMessage = new chatMessage();
$forumMessage = new forumMessage();
$chatMessage->hello();
$forumMessage->hello();

?>