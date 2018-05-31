<?php
require_once 'Comment.php';
require_once 'JsonHandler.php';
require_once 'FileHandler.php';

$articleId = 1;
$filePath = __DIR__ . '/' . $articleId . '.json';
$file = FileHandler::readFile($filePath);
$comments = JsonHandler::readJson($file, false);

foreach ($comments as $comment) {
    ?>
    <section class="comment">
        <div class="container">
            <div class="box">
                <article class="media">
                    <div class="media-content">
                        <div class="content">
                            <p>
                                <strong><?= $comment->userName; ?></strong> 
                                <?php
                                if ($comment->userEmailAddress != '') {
                                    ?>
                                    <small><?= $comment->userEmailAddress; ?></small> 
                                    <?php
                                }
                                ?>
                                <small><?= date("d.m.Y h:i", $comment->timestampWritten); ?></small>
                                <br>
                                <?= $comment->comment; ?>
                            </p>
                        </div>
                        <nav class="level is-mobile">
                            <div class="level-left">
                                <a class="level-item" aria-label="like">
                                    <span class="icon is-small">
                                        <i class="icon-heart" aria-hidden="true"></i>
                                    </span>
                                </a>
                            </div>
                        </nav>
                    </div>
                </article>
            </div>
        </div>
    </section>
    <?php
}
