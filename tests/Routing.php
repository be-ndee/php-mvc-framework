<?php

use Core\Routing\Action;
use Core\Routing\Request;
use Core\Routing\Router;

/**
 * Test all classes in the routing namespace.
 */
class Routing {
    public function testAction () {
        // contstructor + getter
        $action = new Action('ModuleName', 'ControllerName', 'ActionName');
        $this->assertEquals('ModuleName', $action->getModuleName());
        $this->assertEquals('ControllerName', $action->getControllerName());
        $this->assertEquals('ActionName', $action->getActionName());
        $this->assertEquals('ModuleName\\ControllerName\\ActionName', $action->getFullName());

        // setter
        $action->setModuleName('NewModuleName');
        $this->assertEquals('NewModuleName', $action->getModuleName());
        $action->setModuleName('NewControllerName');
        $this->assertEquals('NewControllerName', $action->getControllerName());
        $action->setModuleName('NewActionName');
        $this->assertEquals('NewActionName', $action->getActionName());
        $this->assertEquals('NewModuleName\\NewControllerName\\NewActionName', $action->getFullName());
        
        // exists & getObject
        $this->assertFalse($action->exists());
        $this->assertNull($action->getObject());
    }

    public function testRouter () {
    }

    public function testRequest () {
    }
}