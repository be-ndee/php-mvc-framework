<?php

namespace Core\Routing;

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
    private $routes;

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
     * @return void
     */
    public function registerAction ($url, $action) {
        $this->routes[$url] = $action;
    }

    /**
     * Get the action for the given url.
     * @param string $url The url which should call the action.
     * @return Action
     */
    public function getActionForURL ($url) {
        if (array_key_exists($url, $this->routes)) {
            return $this->routes[$url];
        }
        return null;
    }
}