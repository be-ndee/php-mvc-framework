<?php

namespace Core\ErrorHandling;
use Core\ErrorHandling\Exception;

/**
 * This exception is used if an action does not exist.
 * @author Andreas Bissinger <mail@bissinger-andreas.de>
 */
class ActionNotExistException extends Exception {
    public function __construct () {
        parent::__construct('Action does not exist.');
    }
}