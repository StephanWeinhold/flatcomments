<?php
class SpamHandler {

    public static function checkCommentForSpam($comment) {
        if (SpamHandler::countLinks($comment) <= 2 && SpamHandler::checkBlacklist($comment)) {
            return true;
        }
        return false;
    }
    
    private static function countLinks($comment) {
        return substr_count($comment, 'href');
    }
    
    private static function checkBlacklist($comment) {
        $blacklist = file('https://raw.githubusercontent.com/splorp/wordpress-comment-blacklist/master/blacklist.txt');
        
        foreach($blacklist as $badword) {
            if (stripos($comment, trim($badword)) !== false) {
                return false;
            }
        }
        
        return true;
    }

}
