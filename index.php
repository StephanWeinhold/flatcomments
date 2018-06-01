<?php
require_once 'Comment.php';
require_once 'Comments.php';
$articleId = 1;
$publishedTimestamp = time();
?>
<html>
<head>
    <title>comments</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.1/css/bulma.min.css" rel="stylesheet">
</head>
<body>
    <h1>comments</h1>
    <span id="article-id" data-id="<?= $articleId; ?>"></span>
    <?php
    if ($publishedTimestamp > strtotime('-90 days')) {
        ?>
        <section>
            <div class="container">
                <form id="send-comment">
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
    }
    ?>
    <section id="comments"></section>
    
    <script>
        let cmmnt = {};
        cmmnt.$ = function(id) { return document.getElementById(id); };
        cmmnt.articleId = cmmnt.$('article-id').getAttribute('data-id');
    
        cmmnt.sendAjax = function(method, url, params, callback) {
            let r = new XMLHttpRequest();
            r.open(method, url, true);
            r.onreadystatechange = function() {
                if (r.readyState != 4 || r.status != 200) return;
                	callback(r.responseText);
            };
            r.send(params);
        };
        
        cmmnt.fillCommentContainer = function(responseText) {
            cmmnt.$('comments').innerHTML = responseText;
        }
        
        cmmnt.$('send-comment').addEventListener('submit', function(e) {
            e.preventDefault();
            cmmnt.sendComment();
            return false;
        });
        
        cmmnt.sendComment = function() {
            cmmnt.sendAjax('GET', '/comments/getcomments.php?articleId=1', '', cmmnt.fillCommentContainer);
        };
        
        cmmnt.sendAjax('GET', '/comments/getcomments.php?articleId=' + cmmnt.articleId, '', cmmnt.fillCommentContainer);
    </script>
</body>
</html>
