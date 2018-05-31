<?php
class FileHandler {

    public function readFile($filePath) {
        $lines = file_get_contents($filePath);
        
        if ($lines === false) {
            throw new Exception('JSON file couldn\'t be read.', 500);
        }
        
        return $lines;
    }

    public function writeFile($filePath, $json) {
        if (!file_put_contents($filePath, $json.PHP_EOL , FILE_APPEND | LOCK_EX)) {
            throw new Exception('JSON couldn\'t be written to file.', 500);
        }
    }

}
