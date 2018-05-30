<?php
require_once 'Comment.php';
require_once 'JsonHandler.php';
require_once 'FileHandler.php';

$articleId = 1;
$userName = 'Stephan Weinhold';
$userEmailAddress = 's@b.com';
$comment = 'Dies ist ein Kommentar.';

$oComment = Comment::buildCommentFromPost($articleId, $userName, $userEmailAddress, $comment);
$jsonComment = JsonHandler::writeJson($oComment);
$filePath = __DIR__ . '/' . $articleId . '.json';
FileHandler::writeFile($filePath, $jsonComment);
