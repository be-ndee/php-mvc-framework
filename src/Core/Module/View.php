<?php

namespace Core\Module;
use Core\ErrorHandling\InvalidViewException;

/**
 * This class is used for the views. It handles merging s with parameters.
 * @author Andreas Bissinger <mail@bissinger-andreas.de>
 */
class View {
    /**
     * @var string The name of this view.
     */
    private $name;

    /**
     * @var array Parameters which will be passed to and used in the view.
     */
    private $parameters;

    /**
     * Constructor for AbstractView. Sets  and parameters
     * @param string $name The name for the .
     * @param array  $parameters   Parameters for the .
     * @return AbstractView
     */
    public function __construct ($name, $parameters) {
        $this->setName($name);
        $this->setParameters($parameters);
    }

    /**
     * Get the  name.
     * @return string
     */
    public function getName () {
        return $this->name;
    }

    /**
     * Set new  name for the view.
     * @param string $name The new .
     * @return array
     */
    public function setName ($name) {
        $this->name = $name;
    }

    /**
     * Get the parameters.
     * @return array
     */
    public function getParameters () {
        return $this->parameters;
    }

    /**
     * Set new parameters for the view.
     * @param array $parameters The new parameters.
     * @return void
     */
    public function setParameters ($parameters) {
        $this->parameters = $parameters;
    }

    /**
     * Render the , merge it with the parameters and return the content.
     * @param string $path The absolute path to this view.
     * @throws InvalidViewException The  does not exist or is invalid.
     * @return string
     */
    public function render ($path) {
        if (!file_exists($path)) {
            throw new InvalidViewException($this->getName());
        }
        $matches = array();
        ob_start();
        include $path;
        $content = ob_get_clean();
        foreach ($this->getParameters() as $key => $value) {
            $content = str_replace('{{$' . $key . '}}', $value, $content);
        }
        return $content;
    }
}