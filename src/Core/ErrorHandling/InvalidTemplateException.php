<?php

namespace Core\ErrorHandling;
use Core\ErrorHandling\Exception;

/**
 * This exception is used if a template does not exist or invalid.
 * @author Andreas Bissinger <mail@bissinger-andreas.de>
 */
class InvalidTemplateException extends Exception {
    public function __construct ($template) {
        parent::__construct('The given template does not exist or is invalid. Template "' . $template . '".');
    }
}