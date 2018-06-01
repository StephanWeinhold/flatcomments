<?php
require_once 'Comment.php';
require_once 'Comments.php';
$comments = Comments::getComments($_GET['articleId']);
?>
<div class="container">
    <h3><?= count($comments); ?> comments</h3>
    <?php
    foreach (array_reverse($comments) as $comment) {
        if ($comment->unlocked == true) {
            ?>
            <div class="box">
                <article id="cmmnt_<?= $comment->id; ?>" class="media">
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
                                <small><?= Comments::getTimeElapsed($comment->timestampWritten); ?></small>
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
            <?php
        }
    }
    ?>
</div>
