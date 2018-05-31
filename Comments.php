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
    
}
