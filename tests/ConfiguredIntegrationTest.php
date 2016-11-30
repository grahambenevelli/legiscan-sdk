<?php

namespace Gb;

use PHPUnit_Framework_TestCase;

abstract class ConfiguredIntegrationTest extends PHPUnit_Framework_TestCase
{

    /**
     * @var array
     */
    private static $cachedConfig;

    public function getConfiguredValue($name) {
        if (!self::$cachedConfig) {
            self::$cachedConfig = json_decode(file_get_contents('tests/resources/integration-test-config.json'), true);
        }
        return self::$cachedConfig[$name];
    }
}