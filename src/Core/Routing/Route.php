<?php

namespace Core\Routing;
use Core\Routing\Action;

/**
 * This class represents a route with its action.
 * @author Andreas Bissinger <mail@bissinger-andreas.de>
 */
class Route {
    /**
     * The route as the part of the url.
     * @var string
     */
    private $route;

    /**
     * The action which should be called with this route.
     * @var Action
     */
    private $action;

    /**
     * Constructor with route and action.
     * @param string $route  The value for the route.
     * @param Action $action The value of the action.
     * @return Route
     */
    public function __construct ($route, $action) {
        $this->setRoute($route);
        $this->setAction($action);
    }

    /**
     * Return the route.
     * @return string
     */
    public function getRoute () {
        return $this->route;
    }

    /**
     * Set the route of this object.
     * @param string $route The new value.
     * @return void
     */
    public function setRoute ($route) {
        $this->route = $route;
    }

    /**
     * Get the action of this route.
     * @return Action
     */
    public function getAction () {
        return $this->action;
    }

    /**
     * Set the action of this route.
     * @param Action $action The new action.
     * @return void
     */
    public function setAction ($action) {
        $this->action = $action;
    }
}