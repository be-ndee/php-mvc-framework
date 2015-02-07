<?php
use Core\ErrorHandling\Exception;
use Core\ErrorHandling\ActionNotExistException;
use Core\ErrorHandling\ConfigFileException;
use Core\ErrorHandling\InvalidModuleException;
use Core\ErrorHandling\InvalidViewException;

/**
 * This class tests all error handling things.
 * @author Andreas Bissinger <mail@bissinger-andreas.de>
 */
class ErrorHandling extends PHPUnit_Framework_TestCase {
    /**
     * @expectedException        Core\ErrorHandling\Exception
     */
    public function testExceptions () {
        throw new Exception();
    }

    /**
     * @expectedException        Core\ErrorHandling\ActionNotExistException
     * @expectedExceptionMessage Action does not exist.
     */
    public function testActionNotExistException () {
        throw new ActionNotExistException();
    }

    /**
     * @expectedException        Core\ErrorHandling\ConfigFileException
     * @expectedExceptionMessage The given config file does not exist or is invalid. Filename "file_name".
     */
    public function testConfigFileException () {
        throw new ConfigFileException('file_name');
    }

    /**
     * @expectedException        Core\ErrorHandling\InvalidModuleException
     * @expectedExceptionMessage The given module does not exist, is invalid or not activated. Modulename "module_name".
     */
    public function testInvalidModuleException () {
        throw new InvalidModuleException('module_name');
    }

    /**
     * @expectedException        Core\ErrorHandling\InvalidViewException
     * @expectedExceptionMessage The given view does not exist or is invalid. View "view_name".
     */
    public function testInvalidViewException () {
        throw new InvalidViewException('view_name');
    }
}