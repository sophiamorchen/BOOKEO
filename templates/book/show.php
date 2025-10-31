<?php require_once __ROOTPATH__ . '\templates\header.php'; ?>


<h1><?= $book->getTitle(); ?></h1>
<h2><?= $book->getDescription(); ?></h2>

<?php require_once __ROOTPATH__ . '\templates\footer.php'; ?>