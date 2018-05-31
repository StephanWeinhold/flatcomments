<?php
class Comments {
    
    public function router() {
        $kirby->set('route', array(
            'pattern' => 'my/awesome/url',
            'action'  => function() {
                // do something here when the URL matches the pattern above
            }
        ));
    }
    
    public function checkForComments($articleId) {
        $filePath = __DIR__ . '/' . $articleId . '.json';
        $file = FileHandler::readFile($filePath);
        $aComments = JsonHandler::readJson($file, true);
        
        if (count($aComments) > 0) {
            return $aComments;
        }
        
        return false;
    }
    
}
