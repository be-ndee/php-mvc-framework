<?php
/**
 * Example settings for the configuration file. You can copy this file and replace the values with your one.
 */
return array(
    'modules' => array( // activated modules
        'Main'
    ),
    'routes' => array( // registered routes with the URL, module, controller and action
        '/Index/welcome' => array(
            'module' => 'Main', 
            'controller' => 'Index',
            'action' => 'welcome'
        )
    )
);