<?php

namespace Core\Module;
use Core\Routing\Request;

/**
 * This class is the base for all used controllers.
 * @author Andreas Bissinger <mail@bissinger-andreas.de>
 */
class AbstractController {
    /**
     * The request of this controller
     * @var Request
     */
    private $request;

    /**
     * The construct which sets the request.
     * @param Request $request The request for the controller.
     * @return AbstractController
     */
    public function __construct ($request) {
        $this->setRequest($request);
    }

    /**
     * Get the controllers request.
     * @return Request
     */
    public function getRequest () {
        return $this->request;
    }

    /**
     * Set the request of this controller.
     * @param Request $request The value of the request.
     * @return void
     */
    public function setRequest ($request) {
        $this->request = $request;
    }
}