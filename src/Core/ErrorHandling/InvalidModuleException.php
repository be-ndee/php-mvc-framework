<?php

namespace Core\ErrorHandling;
use Core\ErrorHandling\Exception;

/**
 * This exception is used if a module does not exist, is invalid or not activated.
 * @author Andreas Bissinger <mail@bissinger-andreas.de>
 */
class InvalidModuleException extends Exception {
    /**
     * Create the exception with a message and the given module name.
     * @param string $moduleName The name of the module which causes problems.
     * @return InvalidModuleException
     */
    public function __construct ($moduleName) {
        parent::__construct('The given module does not exist, is invalid or not activated. Modulename "' . $moduleName . '".');
    }
}