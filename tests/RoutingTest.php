<?php

use Core\Routing\Action;
use Core\Routing\Request;
use Core\Routing\Router;

/**
 * Test all classes in the routing namespace.
 */
class RoutingTest extends PHPUnit_Framework_TestCase {
    public function testAction () {
        // contstructor + getter
        $action = new Action('ModuleName', 'ControllerName', 'ActionName');
        $this->assertEquals('ModuleName', $action->getModuleName());
        $this->assertEquals('ControllerName', $action->getControllerName());
        $this->assertEquals('ActionName', $action->getActionName());
        $this->assertEquals('Modules\\ModuleName\\Controller\\ControllerName', $action->getFullName());

        // setter
        $action->setModuleName('NewModuleName');
        $this->assertEquals('NewModuleName', $action->getModuleName());
        $action->setControllerName('NewControllerName');
        $this->assertEquals('NewControllerName', $action->getControllerName());
        $action->setActionName('NewActionName');
        $this->assertEquals('NewActionName', $action->getActionName());
        $this->assertEquals('Modules\\NewModuleName\\Controller\\NewControllerName', $action->getFullName());
        
        // exists & getObject
        $this->assertFalse($action->exists());
        $this->assertNull($action->getControllerObject(null));

        $action = new Action('Main', 'Main', 'index');
        $this->assertTrue($action->exists());
        $this->assertEquals(new Modules\Main\Controller\Main(null), $action->getControllerObject(null));
    }

    public function testRouter () {
        $router = new Router(array());
        $this->assertEquals(array(), $router->getRoutes());
    }

    /**
     * @expectedException        Core\ErrorHandling\ActionNotExistException
     * @expectedExceptionMessage Action does not exist.
     */
    public function testRegisterAction () {
        $urlValid = '/Main/Main/index';
        $urlInvalid = '/Main/Main/index';
        
        $validAction = new Action('Main', 'Main', 'index');
        $this->assertTrue($validAction->exists());
        $invalidAction = new Action('ModuleName', 'ControllerName', 'ActionName');
        $this->assertFalse($invalidAction->exists());

        $router = new Router(array(
            $urlValid => $validAction,
            $urlInvalid => $invalidAction,
        ));

        $this->assertEquals($validAction, $router->getActionForURL($urlValid));
        $this->assertEquals($invalidAction, $router->getActionForURL($urlInvalid));
    }

    public function testRequest () {
    }
}