<?php

namespace Core\Routing;
use Core\ErrorHandling\ActionNotExistException;

/**
 * The router is responsible for parsing the url, fetch controller, action and more from it.
 * @author Andreas Bissinger <mail@bissinger-andreas.de>
 */
class Router {
    const URL_PARAM_STRING = 'string';
    const URL_PARAM_INT = 'int';

    /**
     * All registered routes are saved here.
     * @var array
     */
    private $routes = array();

    /**
     * Constructor with config file for routes.
     * @param array $routes An array with routes as keys and their Actions as the values.
     * @return Router
     */
    public function __construct ($routes = array()) {
        foreach ($routes as $route => $action) {
            $this->registerAction($route, $action);
        }
    }

    /**
     * Get all registered routes.
     * @return array
     */
    public function getRoutes () {
        return $this->routes;
    }

    /**
     * Register an action with it's controller and url.
     * @param string $url    The url which should call the action.
     * @param Action $action The action which should be called.
     * @throws ActionNotExistException The given action does exist.
     * @return void
     */
    private function registerAction ($url, $action) {
        if (!$action->exists()) {
            throw new ActionNotExistException();
        }
        $this->routes[$url] = $action;
    }

    /**
     * Get the action for the given url.
     * @param string $url The url which should call the action.
     * @throws ActionNotExistException The given action does exist.
     * @return Action
     */
    public function getActionForURL ($url) {
        if (array_key_exists($url, $this->routes)) {
            return $this->routes[$url];
        }
        throw new ActionNotExistException;
    }
}