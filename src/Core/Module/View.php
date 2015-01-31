<?php

namespace Core\Module;
use Core\ErrorHandling\InvalidTemplateException;

/**
 * This class is used for the views. It handles merging templates with parameters.
 * @author Andreas Bissinger <mail@bissinger-andreas.de>
 */
class View {
    /**
     * @var string The template name of this view.
     */
    private $template;

    /**
     * @var array Parameters which will be passed to and used in the template.
     */
    private $parameters;

    /**
     * Constructor for AbstractView. Sets template and parameters
     * @param string $template   The name for the template.
     * @param array  $parameters Parameters for the template.
     * @return AbstractView
     */
    public function __construct ($template, $parameters) {
        $this->setTemplate($template);
        $this->setParameters($parameters);
    }

    /**
     * Get the template.
     * @return string
     */
    public function getTemplate () {
        return $this->template;
    }

    /**
     * Set new template value for the view.
     * @param string $template The new template.
     * @return array
     */
    public function setTemplate ($template) {
        $this->template = $template;
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
     * Render the template, merge it with the parameters and return the content.
     * @throws InvalidTemplateException The template does not exist or is invalid.
     * @return string
     */
    public function render () {
        if (!file_exists($this->getTemplate())) {
            throw new InvalidTemplateException($this->getTemplate());
        }
        $matches = array();
        ob_start();
        include $this->getTemplate();
        $content = ob_get_clean();
        foreach ($this->getParameters() as $key => $value) {
            $content = str_replace('{{$' . $key . '}}', $value, $content);
        }
        return $content;
    }
}