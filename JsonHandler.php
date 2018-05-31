<?php
class JsonHandler {

    public function readJson($toRead, $assoc) {
        return json_decode($toRead, $assoc);
    }
    
    public function writeJson($toWrite) {
        return json_encode($toWrite);
    }

}
