<?php

namespace Butterfly\Tests;

class ServicesTest extends BaseDiTest
{
    public function getDataForTestParameter()
    {
        return array(
            array(
                'bfy_adapter.doctrine.db_parameters', array(
                'driver'   => 'pdo_mysql',
                'user'     => 'root',
                'password' => '',
                'dbname'   => 'dbname',
                'charset'  => 'UTF8',
            )
            ),
            array('bfy_adapter.bfy_adapterdoctrine.configuration_paths', array()),
        );
    }

    public function getDataForTestService()
    {
        return array(
            // services
            array('bfy_adapter.doctrine.setup_configuration'),
            array('bfy_adapter.doctrine.entity_manager'),
            array('bfy_adapter.doctrine.connection'),

            // commands
            array('doctrine.command.run_sql'),
            array('doctrine.command.import'),
            array('doctrine.command.metadata'),
            array('doctrine.command.result'),
            array('doctrine.command.query'),
            array('doctrine.command.create'),
            array('doctrine.command.update'),
            array('doctrine.command.drop'),
            array('doctrine.command.ensure_production_settings'),
            array('doctrine.command.convert_doctrine1_schema'),
            array('doctrine.command.generate_repositories'),
            array('doctrine.command.generate_entities'),
            array('doctrine.command.generate_proxies'),
            array('doctrine.command.convert_mapping'),
            array('doctrine.command.run_dql'),
            array('doctrine.command.validate_schema'),
            array('doctrine.command.info'),
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
