<?php

namespace Core\ErrorHandling;
use Core\ErrorHandling\Exception;

/**
 * This exception is used if a view does not exist or invalid.
 * @author Andreas Bissinger <mail@bissinger-andreas.de>
 */
class InvalidViewException extends Exception {
    /**
     * Create the exception with a message and the given view name.
     * @param string $viewName The name of the view which causes problems.
     * @return InvalidViewException
     */
    public function __construct ($viewName) {
        parent::__construct('The given view does not exist or is invalid. View "' . $viewName . '".');
    }
}