<?php
class JsonHandler {

    public static function readJson($toRead, $assoc) {
        return json_decode($toRead, $assoc);
    }

    public static function writeJson($toWrite) {
        return json_encode($toWrite);
    }

}
