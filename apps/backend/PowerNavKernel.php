<?php

declare(strict_types=1);

namespace PowerNav\Apps;

use Symfony\Bundle\FrameworkBundle\Kernel\MicroKernelTrait;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symfony\Component\HttpKernel\Kernel as BaseKernel;
use Symfony\Component\Routing\Loader\Configurator\RoutingConfigurator;
use function dirname;

class PowerNavKernel extends BaseKernel
{
    use MicroKernelTrait;

    public function registerBundles(): iterable
    {
        $contents = require $this->getProjectDir() . '/config/bundles.php';
        foreach ($contents as $class => $envs) {
            if ($envs[$this->environment] ?? $envs['all'] ?? false) {
                yield new $class();
            }
        }
    }

    public function getProjectDir(): string
    {
        return dirname(__DIR__) . '/backend';
    }

    protected function configureContainer(ContainerConfigurator $container): void
    {
        $container->import('config/{packages}/*.yaml');
        $container->import('config/{packages}/'.$this->environment.'/*.yaml');
        $container->import('config/{services}.yaml');
        $container->import('config/{services}_'.$this->environment.'.yaml');
    }


    protected function configureRoutes(RoutingConfigurator $routes): void
    {
        $routes->import('config/{routes}/'.$this->environment.'/*.yaml');
        $routes->import('config/{routes}/*.yaml');
        $routes->import('config/{routes}.yaml');
    }
}
