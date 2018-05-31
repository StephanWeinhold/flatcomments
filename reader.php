<?php
require_once 'Comment.php';
require_once 'Comments.php';
require_once 'JsonHandler.php';
require_once 'FileHandler.php';

$articleId = 1;
$filePath = __DIR__ . '/' . $articleId . '.json';
$file = FileHandler::readFile($filePath);
$object = JsonHandler::readJson($file);

print_r($oComments);

/* foreach ($comments as $comment) {
    echo $comment . '<br>';
    ?>
    <div>
        <span><?= $comment['userName']; ?></span>
    </div>
    <?php
} */
