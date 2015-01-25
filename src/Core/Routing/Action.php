<?php

namespace Core\Routing;
use Core\Application\Config;

/**
 * An action represents a controller with a specific action.
 * @author Andreas Bissinger <mail@bissinger-andreas.de>
 */
class Action {
    /**
     * The name of this action.
     * @var string
     */
    private $actionName;

    /**
     * The name of the controller which contains this action.
     * @var string
     */
    private $controllerName;

    /**
     * The name of the module which contains this controller.
     * @var string
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

    public function getCompleteNamespace () {
        return 'Modules\\' . $this->getModuleName() . '\\' . $this->getControllerName();
    }

    /**
     * Does the controller with its action exist?
     * @return boolean
     */
    public function actionExists () {
        if (class_exists($this->getControllerName())) {
            $controller = $this->getCompleteNamespace();
            if (method_exists(new $controller(), $this->getActionName())) {
                return true;
            }
        }
        return false;
    }
}