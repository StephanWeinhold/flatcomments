<?php
class FileHandler {

    public static function readFile($filePath) {
        $lines = file_get_contents($filePath);

        if ($lines === false) {
            throw new Exception('JSON file couldn\'t be read.', 500);
        }

        return $lines;
    }

    public static function writeFile($filePath, $json) {
        if (!file_put_contents($filePath, $json, LOCK_EX | JSON_PRETTY_PRINT | JSON_FORCE_OBJECT)) {
            throw new Exception('JSON couldn\'t be written to file.', 500);
        }
    }

}
