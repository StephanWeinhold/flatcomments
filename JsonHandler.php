<?php
class JsonHandler {

    public function readJson($toRead) {
        return json_decode($toRead);
    }
    
    public function writeJson($toWrite) {
        return json_encode($toWrite);
    }

}
