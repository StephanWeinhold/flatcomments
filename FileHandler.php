<?php
class FileHandler {

    public function writeFile($filePath, $json) {
        if (!file_put_contents($filePath, $json.PHP_EOL , FILE_APPEND | LOCK_EX)) {
            throw new Exception('JSON couldn\'t be written to file.', 500);
        }
    }
    
    //readFile

}
