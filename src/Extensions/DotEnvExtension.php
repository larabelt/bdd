<?php

namespace Extensions;

use Behat\Testwork\Cli\ServiceContainer\CliExtension;
use Behat\Testwork\EventDispatcher\ServiceContainer\EventDispatcherExtension;
use Behat\Testwork\ServiceContainer\Extension;
use Behat\Testwork\ServiceContainer\ExtensionManager;
use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

/**
 * Class GuerrillaMailService
 * @package App\Services
 */
class DotEnvExtension implements Extension
{

    /**
     * Returns the extension config key.
     *
     * @return string
     */
    public function getConfigKey()
    {
        return 'dotenv';
    }

    /**
     * {@inheritdoc}
     */
    public function configure(ArrayNodeDefinition $builder)
    {
    }

    /**
     *
     */
    private function runningAsNode()
    {
        $argv = array_values(array_get($_SERVER, 'argv', []));

        return in_array('--profile', $argv) && in_array('node', $argv);
    }

    /**
     * Loads extension services into temporary container.
     *
     * @param ContainerBuilder $container
     * @param array $config
     */
    public function load(ContainerBuilder $container, array $config)
    {
        define('BEHAT_BASE_PATH', dirname(BEHAT_BIN_PATH) . '/../../../../');

        if (file_exists(BEHAT_BASE_PATH . '.env')) {
            $dotenv = new \Dotenv\Dotenv(BEHAT_BASE_PATH);
            $dotenv->load();
        }

        define('BEHAT_HOST_PATH', $this->runningAsNode() ? env('HOST_MACHINE_PATH') : null);
    }

    /**
     * {@inheritdoc}
     */
    public function process(ContainerBuilder $container)
    {
    }

    /**
     * {@inheritdoc}
     */
    public function initialize(ExtensionManager $extensionManager)
    {
    }


}