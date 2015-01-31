<?php

namespace Core\ErrorHandling;
use Core\ErrorHandling\Exception;

/**
 * This exception is used if something went wrong with the config file.
 * @author Andreas Bissinger <mail@bissinger-andreas.de>
 */
class ConfigFileException extends Exception {
    public function __construct ($fileName) {
        parent::__construct('The given config file does not exist or is invalid. Filename "' . $fileName . '".');
    }
}