<?php
require_once 'src/Core/Application/Autoloader.php';
spl_autoload_register(array('Core\Application\Autoloader', 'loadClass'));

use Core\Application\App;
use Core\ErrorHandling\Exception;

try {
    $app = new App('config-sample.php');
    $app->go();
} catch (Exception $exception) {
    echo $exception->getMessage();
}
