<?php
require_once 'Comment.php';
require_once 'Comments.php';
$publishedTimestamp = time();
?>
<html>
<head>
    <title>comments</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.1/css/bulma.min.css" rel="stylesheet">
</head>
<body>
    <h1>comments</h1>
    <span id="article-id" data-id="1"></span>
    <?php
    if ($publishedTimestamp > strtotime('-90 days')) {
        ?>
        <section>
            <div class="container">
                <form id="send-comment">
                    <div class="field">
                        <label class="label">Your name</label>
                        <div class="control">
                            <input id="userName" name="userName" class="input" type="text" placeholder="Name">
                        </div>
                    </div>

                    <div class="field">
                        <label class="label">Your email address</label>
                        <div class="control">
                            <input id="userEmailAddress" name="userEmailAddress" class="input" type="text" placeholder="Email address">
                        </div>
                    </div>

                    <div class="field">
                        <label class="label">Your comment</label>
                        <div class="control">
                            <textarea id="comment" name="comment" class="textarea" placeholder="Comment"></textarea>
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
    }
    ?>
    <section id="comments"></section>

    <script>
        let cmmnt = {};
        cmmnt.$ = function(id) { return document.getElementById(id); };
        cmmnt.articleId = cmmnt.$('article-id').getAttribute('data-id');

        cmmnt.sendAjax = function(url, callback) {
            let r = new XMLHttpRequest();
            r.open('GET', url, true);
            r.onreadystatechange = function() {
                if (r.readyState != 4 || r.status != 200) return;
                	callback(r.responseText);
            };
            r.send();
        };

        cmmnt.fillCommentContainer = function(responseText) {
            cmmnt.$('comments').innerHTML = responseText;
        }

        cmmnt.getForm = function() {
            let data = '?articleId=' + cmmnt.articleId + '&userName=' + cmmnt.$('userName').value + '&userEmailAddress=' + cmmnt.$('userEmailAddress').value + '&comment=' + cmmnt.$('comment').value;

            return data;
        }

        cmmnt.$('send-comment').addEventListener('submit', function(e) {
            e.preventDefault();
            cmmnt.sendComment();
            return false;
        });

        cmmnt.sendComment = function() {
            cmmnt.sendAjax('/comments/savecomment.php' + cmmnt.getForm(), cmmnt.commentSent);
        };

        cmmnt.commentSent = function() {
            cmmnt.$('send-comment').style.display = 'none';
            cmmnt.getComments();
        }

        cmmnt.getComments = function() {
            cmmnt.sendAjax('/comments/getcomments.php?articleId=' + cmmnt.articleId, cmmnt.fillCommentContainer);
        }

        cmmnt.getComments();
    </script>
</body>
</html>
