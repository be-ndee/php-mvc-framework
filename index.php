<?php
require_once 'bootstrap.php';

use Core\Application\App;
use Core\ErrorHandling\Exception;

try {
    $app = new App('config.php');
    echo $app->go();
} catch (Exception $exception) {
    echo $exception->getMessage();
}
