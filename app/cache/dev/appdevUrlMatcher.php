<?php

/**
 * appdevUrlMatcher
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appdevUrlMatcher extends Symfony\Component\Routing\Matcher\UrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(array $context = array(), array $defaults = array())
    {
        $this->context = $context;
        $this->defaults = $defaults;
    }

    public function match($url)
    {
        $url = $this->normalizeUrl($url);

        if (rtrim($url, '/') === '') {
            if (substr($url, -1) !== '/') {
                return array('_controller' => 'Symfony\Bundle\FrameworkBundle\Controller\RedirectController::urlRedirectAction', 'url' => $this->context['base_url'].$url.'/', 'permanent' => true, '_route' => 'homepage');
            }
            return array_merge($this->mergeDefaults(array(), array (  '_controller' => 'Odino\\BlogBundle\\Controller\\BlogController::indexAction',)), array('_route' => 'homepage'));
        }

        if ($url === '/about') {
            return array_merge($this->mergeDefaults(array(), array (  '_controller' => 'Odino\\BlogBundle\\Controller\\BlogController::aboutAction',)), array('_route' => 'about'));
        }

        if ($url === '/conferences') {
            return array_merge($this->mergeDefaults(array(), array (  '_controller' => 'Odino\\BlogBundle\\Controller\\BlogController::conferencesAction',)), array('_route' => 'conferences'));
        }

        if ($url === '/tags') {
            return array_merge($this->mergeDefaults(array(), array (  '_controller' => 'Odino\\BlogBundle\\Controller\\BlogController::tagsAction',)), array('_route' => 'tags'));
        }

        if ($url === '/rss') {
            return array_merge($this->mergeDefaults(array(), array (  '_controller' => 'Odino\\BlogBundle\\Controller\\BlogController::rssAction',)), array('_route' => 'rss'));
        }

        if (preg_match('#^/(?P<id>\d+)/(?P<slug>[^/\.]+?)$#x', $url, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Odino\\BlogBundle\\Controller\\BlogController::contentAction',)), array('_route' => 'content'));
        }

        if ($url === '/menu') {
            return array_merge($this->mergeDefaults(array(), array (  '_controller' => 'Odino\\BlogBundle\\Controller\\BlogController::menuAction',)), array('_route' => 'menu'));
        }

        if (0 === strpos($url, '/_internal') && preg_match('#^/_internal/(?P<controller>[^/\.]+?)/(?P<path>[^/\.]+?)\.(?P<_format>[^/\.]+?)$#x', $url, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Symfony\\Bundle\\FrameworkBundle\\Controller\\InternalController::indexAction',)), array('_route' => '_internal'));
        }

        if (0 === strpos($url, '/_wdt') && preg_match('#^/_wdt/(?P<token>[^/\.]+?)$#x', $url, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::toolbarAction',)), array('_route' => '_wdt'));
        }

        if ($url === '/_profiler/search') {
            return array_merge($this->mergeDefaults(array(), array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::searchAction',)), array('_route' => '_profiler_search'));
        }

        if ($url === '/_profiler/purge') {
            return array_merge($this->mergeDefaults(array(), array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::purgeAction',)), array('_route' => '_profiler_purge'));
        }

        if ($url === '/_profiler/import') {
            return array_merge($this->mergeDefaults(array(), array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::importAction',)), array('_route' => '_profiler_import'));
        }

        if (0 === strpos($url, '/_profiler/export') && preg_match('#^/_profiler/export/(?P<token>[^/\.]+?)\.txt$#x', $url, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::exportAction',)), array('_route' => '_profiler_export'));
        }

        if (0 === strpos($url, '/_profiler') && preg_match('#^/_profiler/(?P<token>[^/\.]+?)/search/results$#x', $url, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::searchResultsAction',)), array('_route' => '_profiler_search_results'));
        }

        if (0 === strpos($url, '/_profiler') && preg_match('#^/_profiler/(?P<token>[^/\.]+?)$#x', $url, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::panelAction',)), array('_route' => '_profiler'));
        }

        if (0 === strpos($url, '/_profiler') && preg_match('#^/_profiler/(?P<token>[^/\.]+?)/(?P<panel>[^/\.]+?)$#x', $url, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::panelAction',)), array('_route' => '_profiler_panel'));
        }

        if (rtrim($url, '/') === '/_configurator') {
            if (substr($url, -1) !== '/') {
                return array('_controller' => 'Symfony\Bundle\FrameworkBundle\Controller\RedirectController::urlRedirectAction', 'url' => $this->context['base_url'].$url.'/', 'permanent' => true, '_route' => '_configurator_home');
            }
            return array_merge($this->mergeDefaults(array(), array (  '_controller' => 'Symfony\\Bundle\\WebConfiguratorBundle\\Controller\\ConfiguratorController::checkAction',)), array('_route' => '_configurator_home'));
        }

        if (0 === strpos($url, '/_configurator/step') && preg_match('#^/_configurator/step/(?P<index>[^/\.]+?)$#x', $url, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Symfony\\Bundle\\WebConfiguratorBundle\\Controller\\ConfiguratorController::stepAction',)), array('_route' => '_configurator_step'));
        }

        if ($url === '/_configurator/final') {
            return array_merge($this->mergeDefaults(array(), array (  '_controller' => 'Symfony\\Bundle\\WebConfiguratorBundle\\Controller\\ConfiguratorController::finalAction',)), array('_route' => '_configurator_final'));
        }

        return false;
    }
}
