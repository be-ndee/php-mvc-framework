<?php

namespace Core\Routing;
use Core\Application\Config;

/**
 * An action represents a controller with a specific action.
 * @author Andreas Bissinger <mail@bissinger-andreas.de>
 */
class Action {
    /**
     * @var string The name of this action.
     */
    private $actionName;

    /**
     * @var string The name of the controller which contains this action.
     */
    private $controllerName;

    /**
     * @var string The name of the module which contains this controller.
     */
    private $moduleName;

    /**
     * Create an instance of this class with an module-, controller- and action-name.
     * @param string $moduleName     The name of the module.
     * @param string $controllerName The name of the controller.
     * @param string $actionName     The name of the action.
     * @return Action
     */
    public function __construct ($moduleName, $controllerName, $actionName) {
        $this->setModuleName($moduleName);
        $this->setControllerName($controllerName);
        $this->setActionName($actionName);
    }

    /**
     * Get the name of this action.
     * @return string
     */
    public function getActionName () {
        return $this->actionName;
    }

    /**
     * Set a new value for the action name.
     * @param string $actionName The new name.
     * @return void
     */
    public function setActionName ($actionName) {
        $this->actionName = $actionName;
    }

    /**
     * Get the name of the controller.
     * @return string
     */
    public function getControllerName () {
        return $this->controllerName;
    }

    /**
     * Set a new value for the controller name.
     * @param string $controllerName The new name.
     * @return void
     */
    public function setControllerName ($controllerName) {
        $this->controllerName = $controllerName;
    }

    /**
     * Get the name of the module.
     * @return string
     */
    public function getModuleName () {
        return $this->moduleName;
    }

    /**
     * Set a new value for the module name.
     * @param string $moduleName The new name.
     * @return void
     */
    public function setModuleName ($moduleName) {
        $this->moduleName = $moduleName;
    }

    /**
     * Get the full name with with namespaces.
     * @return string
     */
    public function getFullName () {
        return 'Modules\\' . $this->getModuleName() . '\\Controller\\' . $this->getControllerName();
    }

    /**
     * Does the controller with its action exist?
     * @return boolean
     */
    public function exists () {
        if (class_exists($this->getFullName())) {
            $controller = $this->getFullName();
            if (method_exists(new $controller(null), $this->getActionName())) {
                return true;
            }
        }
        return false;
    }

    /**
     * Create an instance of the controller of this action.
     * @param Request $request The request which causes this action.
     * @return Core\Module\AbstractController|NULL
     */
    public function getControllerObject ($request) {
        if (!$this->exists()) {
            return null;
        }
        $completeName = $this->getFullName();
        return new $completeName($request);
    }
}