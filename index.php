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
    <?php
    if ($publishedTimestamp > strtotime('-90 days')) {
        ?>
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
    }
    ?>
    <section id="comments"></section>
    
    <script>
        let r = new XMLHttpRequest();
        r.open('GET', '/comments/getcomments.php?articleId=1', true);
        r.onreadystatechange = function() {
            if (r.readyState != 4 || r.status != 200) return;
            	document.getElementById('comments').innerHTML = r.responseText;
            };
        r.send();
    </script>
</body>
</html>
