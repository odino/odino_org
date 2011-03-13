<?php

/**
 * appdevUrlGenerator
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appdevUrlGenerator extends Symfony\Component\Routing\Generator\UrlGenerator
{
    static protected $declaredRouteNames = array(
       'homepage' => true,
       'about' => true,
       'conferences' => true,
       'tags' => true,
       'rss' => true,
       'content' => true,
       'menu' => true,
       '_internal' => true,
       '_wdt' => true,
       '_profiler_search' => true,
       '_profiler_purge' => true,
       '_profiler_import' => true,
       '_profiler_export' => true,
       '_profiler_search_results' => true,
       '_profiler' => true,
       '_profiler_panel' => true,
       '_configurator_home' => true,
       '_configurator_step' => true,
       '_configurator_final' => true,
    );

    /**
     * Constructor.
     */
    public function __construct(array $context = array(), array $defaults = array())
    {
        $this->context = $context;
        $this->defaults = $defaults;
    }

    public function generate($name, array $parameters, $absolute = false)
    {
        if (!isset(self::$declaredRouteNames[$name])) {
            throw new \InvalidArgumentException(sprintf('Route "%s" does not exist.', $name));
        }

        $escapedName = str_replace('.', '__', $name);

        list($variables, $defaults, $requirements, $tokens) = $this->{'get'.$escapedName.'RouteInfo'}();

        return $this->doGenerate($variables, $defaults, $requirements, $tokens, $parameters, $name, $absolute);
    }

    protected function gethomepageRouteInfo()
    {
        return array(array (), array_merge($this->defaults, array (  '_controller' => 'Odino\\BlogBundle\\Controller\\BlogController::indexAction',)), array (), array (  0 =>   array (    0 => 'text',    1 => '/',    2 => '',    3 => NULL,  ),));
    }

    protected function getaboutRouteInfo()
    {
        return array(array (), array_merge($this->defaults, array (  '_controller' => 'Odino\\BlogBundle\\Controller\\BlogController::aboutAction',)), array (), array (  0 =>   array (    0 => 'text',    1 => '/',    2 => 'about',    3 => NULL,  ),));
    }

    protected function getconferencesRouteInfo()
    {
        return array(array (), array_merge($this->defaults, array (  '_controller' => 'Odino\\BlogBundle\\Controller\\BlogController::conferencesAction',)), array (), array (  0 =>   array (    0 => 'text',    1 => '/',    2 => 'conferences',    3 => NULL,  ),));
    }

    protected function gettagsRouteInfo()
    {
        return array(array (), array_merge($this->defaults, array (  '_controller' => 'Odino\\BlogBundle\\Controller\\BlogController::tagsAction',)), array (), array (  0 =>   array (    0 => 'text',    1 => '/',    2 => 'tags',    3 => NULL,  ),));
    }

    protected function getrssRouteInfo()
    {
        return array(array (), array_merge($this->defaults, array (  '_controller' => 'Odino\\BlogBundle\\Controller\\BlogController::rssAction',)), array (), array (  0 =>   array (    0 => 'text',    1 => '/',    2 => 'rss',    3 => NULL,  ),));
    }

    protected function getcontentRouteInfo()
    {
        return array(array (  'id' => '{id}',  'slug' => '{slug}',), array_merge($this->defaults, array (  '_controller' => 'Odino\\BlogBundle\\Controller\\BlogController::contentAction',)), array (  'id' => '\\d+',), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '{slug}',    3 => 'slug',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '{id}',    3 => 'id',  ),));
    }

    protected function getmenuRouteInfo()
    {
        return array(array (), array_merge($this->defaults, array (  '_controller' => 'Odino\\BlogBundle\\Controller\\BlogController::menuAction',)), array (), array (  0 =>   array (    0 => 'text',    1 => '/',    2 => 'menu',    3 => NULL,  ),));
    }

    protected function get_internalRouteInfo()
    {
        return array(array (  'controller' => '{controller}',  'path' => '{path}',  '_format' => '{_format}',), array_merge($this->defaults, array (  '_controller' => 'Symfony\\Bundle\\FrameworkBundle\\Controller\\InternalController::indexAction',)), array (), array (  0 =>   array (    0 => 'variable',    1 => '.',    2 => '{_format}',    3 => '_format',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '{path}',    3 => 'path',  ),  2 =>   array (    0 => 'variable',    1 => '/',    2 => '{controller}',    3 => 'controller',  ),  3 =>   array (    0 => 'text',    1 => '/',    2 => '_internal',    3 => NULL,  ),));
    }

    protected function get_wdtRouteInfo()
    {
        return array(array (  'token' => '{token}',), array_merge($this->defaults, array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::toolbarAction',)), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '{token}',    3 => 'token',  ),  1 =>   array (    0 => 'text',    1 => '/',    2 => '_wdt',    3 => NULL,  ),));
    }

    protected function get_profiler_searchRouteInfo()
    {
        return array(array (), array_merge($this->defaults, array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::searchAction',)), array (), array (  0 =>   array (    0 => 'text',    1 => '/',    2 => 'search',    3 => NULL,  ),  1 =>   array (    0 => 'text',    1 => '/',    2 => '_profiler',    3 => NULL,  ),));
    }

    protected function get_profiler_purgeRouteInfo()
    {
        return array(array (), array_merge($this->defaults, array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::purgeAction',)), array (), array (  0 =>   array (    0 => 'text',    1 => '/',    2 => 'purge',    3 => NULL,  ),  1 =>   array (    0 => 'text',    1 => '/',    2 => '_profiler',    3 => NULL,  ),));
    }

    protected function get_profiler_importRouteInfo()
    {
        return array(array (), array_merge($this->defaults, array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::importAction',)), array (), array (  0 =>   array (    0 => 'text',    1 => '/',    2 => 'import',    3 => NULL,  ),  1 =>   array (    0 => 'text',    1 => '/',    2 => '_profiler',    3 => NULL,  ),));
    }

    protected function get_profiler_exportRouteInfo()
    {
        return array(array (  'token' => '{token}',), array_merge($this->defaults, array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::exportAction',)), array (), array (  0 =>   array (    0 => 'text',    1 => '.',    2 => 'txt',    3 => NULL,  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '{token}',    3 => 'token',  ),  2 =>   array (    0 => 'text',    1 => '/',    2 => 'export',    3 => NULL,  ),  3 =>   array (    0 => 'text',    1 => '/',    2 => '_profiler',    3 => NULL,  ),));
    }

    protected function get_profiler_search_resultsRouteInfo()
    {
        return array(array (  'token' => '{token}',), array_merge($this->defaults, array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::searchResultsAction',)), array (), array (  0 =>   array (    0 => 'text',    1 => '/',    2 => 'results',    3 => NULL,  ),  1 =>   array (    0 => 'text',    1 => '/',    2 => 'search',    3 => NULL,  ),  2 =>   array (    0 => 'variable',    1 => '/',    2 => '{token}',    3 => 'token',  ),  3 =>   array (    0 => 'text',    1 => '/',    2 => '_profiler',    3 => NULL,  ),));
    }

    protected function get_profilerRouteInfo()
    {
        return array(array (  'token' => '{token}',), array_merge($this->defaults, array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::panelAction',)), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '{token}',    3 => 'token',  ),  1 =>   array (    0 => 'text',    1 => '/',    2 => '_profiler',    3 => NULL,  ),));
    }

    protected function get_profiler_panelRouteInfo()
    {
        return array(array (  'token' => '{token}',  'panel' => '{panel}',), array_merge($this->defaults, array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::panelAction',)), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '{panel}',    3 => 'panel',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '{token}',    3 => 'token',  ),  2 =>   array (    0 => 'text',    1 => '/',    2 => '_profiler',    3 => NULL,  ),));
    }

    protected function get_configurator_homeRouteInfo()
    {
        return array(array (), array_merge($this->defaults, array (  '_controller' => 'Symfony\\Bundle\\WebConfiguratorBundle\\Controller\\ConfiguratorController::checkAction',)), array (), array (  0 =>   array (    0 => 'text',    1 => '/',    2 => '',    3 => NULL,  ),  1 =>   array (    0 => 'text',    1 => '/',    2 => '_configurator',    3 => NULL,  ),));
    }

    protected function get_configurator_stepRouteInfo()
    {
        return array(array (  'index' => '{index}',), array_merge($this->defaults, array (  '_controller' => 'Symfony\\Bundle\\WebConfiguratorBundle\\Controller\\ConfiguratorController::stepAction',)), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '{index}',    3 => 'index',  ),  1 =>   array (    0 => 'text',    1 => '/',    2 => 'step',    3 => NULL,  ),  2 =>   array (    0 => 'text',    1 => '/',    2 => '_configurator',    3 => NULL,  ),));
    }

    protected function get_configurator_finalRouteInfo()
    {
        return array(array (), array_merge($this->defaults, array (  '_controller' => 'Symfony\\Bundle\\WebConfiguratorBundle\\Controller\\ConfiguratorController::finalAction',)), array (), array (  0 =>   array (    0 => 'text',    1 => '/',    2 => 'final',    3 => NULL,  ),  1 =>   array (    0 => 'text',    1 => '/',    2 => '_configurator',    3 => NULL,  ),));
    }
}
