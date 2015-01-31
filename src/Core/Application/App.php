<?php

namespace Core\Application;
use Core\Routing\Request;
use Core\Routing\Action;
use Core\Routing\Router;
use Core\ErrorHandling\ActionNotExistException;
use Core\ErrorHandling\ConfigFileException;
use Core\ErrorHandling\InvalidModuleException;

/**
 * This class represents the whole application. It manages all request and calls the responsible routers.
 * @author Andreas Bissinger <mail@bissinger-andreas.de>
 */
class App {
    /**
     * @var Router The router which handles all actions
     */
    private $router;

    /**
     * @var array All modules which are activated.
     */
    private $modules = array();

    /**
     * The constructor of App. It creates the important instances to run the application.
     * @param string $configFile The name of the config file.
     * @throws ConfigFileException The config file is invalid or does not exist.
     * @return App
     */
    public function __construct ($configFile) {
        if (!file_exists($configFile)) {
            throw new ConfigFileException($configFile);
        }
        $config = include $configFile;
        if (!array_key_exists('modules', $config)) {
            throw new ConfigFileException();
        }
        $this->setModules($config['modules']);
        $actions = array();
        if (!array_key_exists('routes', $config)) {
            throw new ConfigFileException();
        }
        foreach ($config['routes'] as $route => $actionConfig) {
            if (!array_key_exists('module', $actionConfig) ||
                !array_key_exists('controller', $actionConfig) ||
                !array_key_exists('action', $actionConfig)) {
                throw new ConfigFileException($configFile);
                
            }
            $action = new Action($actionConfig['module'], $actionConfig['controller'], $actionConfig['action']);
            $actions[$route] = $action;
        }
        $this->setRouter(new Router($actions));
    }

    /**
     * This starts and runs the application. It handles the current request.
     * @return void
     */
    public function go () {
        $action = $this->getRouter()->getActionForURL($_SERVER['REQUEST_URI']);
        $view = $this->doAction($action, null);
        $path = $this->buildPath(array(
            'src', 'Modules', $action->getModuleName(), 'Views', $view->getName()
        ));
        $path .= '.tpl.php';
        return $view->render($path);
    }

    /**
     * Do the given action and handle its return value.
     * @param Action  $action  The action which should be called.
     * @param Request $request The request which came in.
     * @throws ActionNotExistException The given action does exist.
     * @throws InvalidModuleException The given action does exist.
     * @return void
     */
    public function doAction ($action, $request) {
        if ($action->exists()) {
            if (!$this->moduleIsActive($action->getModuleName())) {
                throw new InvalidModuleException($action->getModuleName());
            }
            $object = $action->getControllerObject($request);
            $action = $action->getActionName();
            return $object->$action();
        } else {
            throw new ActionNotExistException();
        }
    }

    /**
     * Return the router of the application.
     * @return Router
     */
    public function getRouter () {
        return $this->router;
    }

    /**
     * Set the router of the application.
     * @param Router $router The new router.
     * @return void
     */
    private function setRouter ($router) {
        $this->router = $router;
    }

    /**
     * Return the activated modules.
     * @return array
     */
    public function getModules () {
        return $this->modules;
    }

    /**
     * Set the activated modules of the application.
     * @param array $modules The new modules.
     * @return void
     */
    private function setModules ($modules) {
        foreach ($modules as $module) {
            if (!is_dir('src/Modules/' . $module)) { // TODO other check
                throw new InvalidModuleException($module);
            }
        }
        $this->modules = $modules;
    }

    /**
     * Return true if the given module is active, else false.
     * @param string $module The module which should be checked.
     * @return boolean
     */
    public function moduleIsActive ($module) {
        return in_array($module, $this->getModules());
    }

    /**
     * Build the path with the given parts.
     * @return string
     */
    private function buildPath ($parts) {
        return implode(DIRECTORY_SEPARATOR, $parts);
    }
}