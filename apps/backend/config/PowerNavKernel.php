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
        return dirname(__DIR__);
    }

    protected function configureContainer(ContainerConfigurator $container): void
    {
        $container->import('./{packages}/*.yaml');
        $container->import('./{packages}/'.$this->environment.'/*.yaml');
        $container->import('./{services}.yaml');
        $container->import('./{services}_'.$this->environment.'.yaml');
    }


    protected function configureRoutes(RoutingConfigurator $routes): void
    {
        $routes->import('./{routes}/'.$this->environment.'/*.yaml');
        $routes->import('./{routes}/*.yaml');
        $routes->import('./{routes}.yaml');
    }
}
