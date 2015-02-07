<?php

require_once 'src/Core/Application/Autoloader.php';
spl_autoload_register(array('Core\Application\Autoloader', 'loadClass'));