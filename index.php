<?php
require_once 'Comment.php';
require_once 'Comments.php';
$articleId = 1;
?>
<html>
<head>
    <title>comments</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.1/css/bulma.min.css" rel="stylesheet">
</head>
<body>
    <section>
        <div class="container">
            <form>
                <div class="field">
                    <label class="label">Your name</label>
                    <div class="control">
                        <input class="input" type="text" placeholder="Name">
                    </div>
                </div>

                <div class="field">
                    <label class="label">Your email address</label>
                    <div class="control">
                        <input class="input" type="text" placeholder="Email address">
                    </div>
                </div>

                <div class="field">
                    <label class="label">Your comment</label>
                    <div class="control">
                        <textarea class="textarea" placeholder="Comment"></textarea>
                    </div>
                </div>

                <div class="field is-grouped">
                    <div class="control">
                        <button class="button is-link">Submit</button>
                    </div>
                    <div class="control">
                        <button class="button is-text">Cancel</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <?php
    foreach (array_reverse(Comments::getComments($articleId)) as $comment) {
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
    ?>
</body>
</html>
