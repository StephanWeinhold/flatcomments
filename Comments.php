<?php
require_once 'JsonHandler.php';
require_once 'FileHandler.php';

class Comments {

    public function router() {
        $kirby->set('route', array(
            'pattern' => 'my/awesome/url',
            'action'  => function() {
                // do something here when the URL matches the pattern above
            }
        ));
    }

    public static function checkForComments($articleId) {
        $comments = Comments::getComments($articleId);

        if (count($comments) > 0) {
            return $comments;
        }

        return [];
    }

    public static function getComments($articleId) {
        $file = FileHandler::readFile(__DIR__ . '/' . $articleId . '.json');
        return JsonHandler::readJson($file, false);
    }
    
    public static function getTimeElapsed($timestamp, $level = 6) {
        $date = new DateTime();
        $date->setTimestamp($timestamp);
        $date = $date->diff(new DateTime());
        
        $timeElapsed = json_decode($date->format('{"year":%y,"month":%m,"day":%d,"hour":%h,"minute":%i}'), true);
        
        if ($timeElapsed['year'] > 0 || $timeElapsed['month'] > 5) {
            return date("d.m.Y h:i", $timestamp);
        }
        
        $timeElapsed = array_filter($timeElapsed);        
        $timeElapsed = array_slice($timeElapsed, 0, $level);
                
        $lastKey = key(array_slice($timeElapsed, -1, 1, true));
        $output = '';
        
        foreach ($timeElapsed as $timeUnit => $value) {
            if ($output) {
                $output .= $timeUnit != $lastKey ? ', ' : ' ' . 'and' . ' ';
            }
            
            $timeUnit .= $value > 1 ? 's' : '';
            $output .= $value . ' ' . $timeUnit;
        }
        
        return $output;
    }

}
