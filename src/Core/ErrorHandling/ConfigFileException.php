<?php

namespace Core\ErrorHandling;
use Core\ErrorHandling\Exception;

/**
 * This exception is used if something went wrong with the config file.
 * @author Andreas Bissinger <mail@bissinger-andreas.de>
 */
class ConfigFileException extends Exception {
    /**
     * Create the exception with a message and the given file name.
     * @param string $fileName The name of the config file which causes problems.
     * @return ConfigFileException
     */
    public function __construct ($fileName) {
        parent::__construct('The given config file does not exist or is invalid. Filename "' . $fileName . '".');
    }
}