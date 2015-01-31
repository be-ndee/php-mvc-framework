<?php

namespace Core\Application;
use Core\Routing\Request;
use Core\Routing\Action;

/**
 * This class represents the whole application. It manages all request and calls the responsible routers.
 * @author Andreas Bissinger <mail@bissinger-andreas.de>
 */
class App {
    /**
     * Do the given action and handle its return value.
     * @param Action  $action  The action which should be called.
     * @param Request $request The request which came in.
     * @return void
     */
    public function doAction ($action, $request) {
        if ($action->exists()) {
            $object = $action->getControllerObject($request);
            $action = $action->getActionName();
            $object->$action();
        }
    }
}