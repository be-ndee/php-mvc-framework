<?php

namespace Core\ErrorHandling;
use Core\ErrorHandling\Exception;

/**
 * This exception is used if a module does not exist, is invalid or not activated.
 * @author Andreas Bissinger <mail@bissinger-andreas.de>
 */
class InvalidModuleException extends Exception {
    public function __construct ($moduleName) {
        parent::__construct('The given module does not exist, is invalid or not activated. Modulename "' . $moduleName . '".');
    }
}