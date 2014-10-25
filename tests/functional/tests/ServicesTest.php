<?php

namespace Butterfly\Tests;

class ServicesTest extends BaseDiTest
{
    public function getDataForTestParameter()
    {
        return array(
            array('bfy_adapter.doctrine.db_parameters', array(
                'driver'   => 'pdo_mysql',
                'user'     => 'root',
                'password' => '',
                'dbname'   => 'dbname',
                'charset'  => 'UTF8',
            )),
            array('bfy_adapter.bfy_adapterdoctrine.configuration_paths', array()),
        );
    }

    public function getDataForTestService()
    {
        return array(
            array('bfy_adapter.doctrine.setup_configuration'),
            array('bfy_adapter.doctrine.entity_manager'),
            array('bfy_adapter.doctrine.connection'),
        );
    }

    /**
     * @dataProvider getDataForTestParameter
     * @param string $parameterName
     * @param mixed $expectedValue
     */
    public function testParameter($parameterName, $expectedValue)
    {
        $this->assertEquals($expectedValue, self::$container->getParameter($parameterName));
    }

    /**
     * @dataProvider getDataForTestService
     * @param string $serviceName
     */
    public function testService($serviceName)
    {
        self::$container->get($serviceName);
    }
}
