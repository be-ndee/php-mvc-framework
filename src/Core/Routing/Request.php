<?php

namespace Core\Routing;

/**
 * This class represents a request. It contains the paremters, URl, type and more.
 * @author Andreas Bissinger <mail@bissinger-andreas.de>
 */
class Request {
    /**
     * @const string Request type is GET.
     */
    const TYPE_GET = 'TYPE_GET';

    /**
     * @const string Request type is POST.
     */
    const TYPE_POST = 'TYPE_POST';

    /**
     * @var string The type of this request.
     */
    private $type;

    /**
     * @var array Array of parameters which are served via POST or GET.
     */
    private $parameters;

    /**
     * @var array Array of parameters which are served via the url.
     */
    private $urlParameters;

    /**
     * The constructor of this class.
     * @param string $type          The type of the request.
     * @param array  $parameters    The parameters from POST or GET.
     * @param array  $urlParameters The parameters which are served via url.
     * @return Request
     */
    public function __construct ($type, $parameters, $urlParameters) {
        $this->setType($type);
        $this->setParameters($parameters);
        $this->setURLParameters($urlParameters);
    }

    /**
     * Return the type of the request.
     * @return string
     */
    public function getType () {
        return $this->type;
    }

    /**
     * Set the type.
     * @param string $type The new value for the type.
     * @return void
     */
    public function setType ($type) {
        $this->type = $type;
    }

    /**
     * Return the parameters of the request.
     * @return array
     */
    public function getParameters () {
        return $this->parameters;
    }

    /**
     * Set the parameters.
     * @param array $parameters The new value for the parameters.
     * @return void
     */
    public function setParameters ($parameters) {
        $this->parameters = $parameters;
    }

    /**
     * Return the url parameters of the request.
     * @return array
     */
    public function getURLParameters () {
        return $this->urlParameters;
    }

    /**
     * Set the url parameters.
     * @param array $urlParameters The new value for the url parameters.
     * @return void
     */
    public function setURLParameters ($urlParameters) {
        $this->urlParameters = $urlParameters;
    }

    /**
     * Return true if the request is of type GET, else false.
     * @return boolean
     */
    public function isGet () {
        return ($this->getType() === $this::TYPE_GET);
    }

    /**
     * Return true if the request is of type POST, else false.
     * @return boolean
     */
    public function isPost () {
        return ($this->getType() === $this::TYPE_POST);
    }
}