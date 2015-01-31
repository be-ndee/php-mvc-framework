<?php
require_once 'src/Core/Application/Autoloader.php';
spl_autoload_register(array('Core\Application\Autoloader', 'loadClass'));

use Core\Application\App;
use Core\ErrorHandling\Exception;

try {
    $app = new App('config.php');
    echo $app->go();
} catch (Exception $exception) {
    echo $exception->getMessage();
}
