<?php
require_once 'Comment.php';
require_once 'JsonHandler.php';
require_once 'FileHandler.php';

$articleId = 1;
$filePath = __DIR__ . '/' . $articleId . '.json';
$file = FileHandler::readFile($filePath);
$aComments = JsonHandler::readJson($file);

print_r($aComments);

foreach ($aComments as $key => $comment) {
    echo $key . ': ' . $comment . '<br>';
}

echo '<br><br>###################<br><br>';

foreach ($aComments as $comment) {
    ?>
    <div>
        <span><?= $comment['userName']; ?></span>
    </div>
    <?php
}
