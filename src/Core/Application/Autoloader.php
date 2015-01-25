<?php

namespace Core\Application;

/**
 * This autoloader loads the files for the classes, which are needed in this mvc framework.
 * @author Andreas Bissinger <mail@bissinger-andreas.de>
 */
class Autoloader {
    /**
     * Require the file for the class if it exists, else return false.
     * @param string $class The name for the class.
     * @return void|boolean
     */
    public static function loadClass ($class) {
        $parts = explode('\\', $class);
        $path = 'src/' . implode(DIRECTORY_SEPARATOR, $parts) . '.php';
        if (file_exists($path)) {
            require_once $path;
        } else {
            return false;
        }
    }
}