<?php

namespace Core\ErrorHandling;
use Core\ErrorHandling\Exception;

/**
 * This exception is used if a view does not exist or invalid.
 * @author Andreas Bissinger <mail@bissinger-andreas.de>
 */
class InvalidViewException extends Exception {
    public function __construct ($view) {
        parent::__construct('The given view does not exist or is invalid. View "' . $view . '".');
    }
}