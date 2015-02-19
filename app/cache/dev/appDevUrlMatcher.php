<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appDevUrlMatcher
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appDevUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($pathinfo);
        $context = $this->context;
        $request = $this->request;

        if (0 === strpos($pathinfo, '/_')) {
            // _wdt
            if (0 === strpos($pathinfo, '/_wdt') && preg_match('#^/_wdt/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_wdt')), array (  '_controller' => 'web_profiler.controller.profiler:toolbarAction',));
            }

            if (0 === strpos($pathinfo, '/_profiler')) {
                // _profiler_home
                if (rtrim($pathinfo, '/') === '/_profiler') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_profiler_home');
                    }

                    return array (  '_controller' => 'web_profiler.controller.profiler:homeAction',  '_route' => '_profiler_home',);
                }

                if (0 === strpos($pathinfo, '/_profiler/search')) {
                    // _profiler_search
                    if ($pathinfo === '/_profiler/search') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchAction',  '_route' => '_profiler_search',);
                    }

                    // _profiler_search_bar
                    if ($pathinfo === '/_profiler/search_bar') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchBarAction',  '_route' => '_profiler_search_bar',);
                    }

                }

                // _profiler_purge
                if ($pathinfo === '/_profiler/purge') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:purgeAction',  '_route' => '_profiler_purge',);
                }

                // _profiler_info
                if (0 === strpos($pathinfo, '/_profiler/info') && preg_match('#^/_profiler/info/(?P<about>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_info')), array (  '_controller' => 'web_profiler.controller.profiler:infoAction',));
                }

                // _profiler_phpinfo
                if ($pathinfo === '/_profiler/phpinfo') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:phpinfoAction',  '_route' => '_profiler_phpinfo',);
                }

                // _profiler_search_results
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/search/results$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_search_results')), array (  '_controller' => 'web_profiler.controller.profiler:searchResultsAction',));
                }

                // _profiler
                if (preg_match('#^/_profiler/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler')), array (  '_controller' => 'web_profiler.controller.profiler:panelAction',));
                }

                // _profiler_router
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/router$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_router')), array (  '_controller' => 'web_profiler.controller.router:panelAction',));
                }

                // _profiler_exception
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception')), array (  '_controller' => 'web_profiler.controller.exception:showAction',));
                }

                // _profiler_exception_css
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception\\.css$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception_css')), array (  '_controller' => 'web_profiler.controller.exception:cssAction',));
                }

            }

            if (0 === strpos($pathinfo, '/_configurator')) {
                // _configurator_home
                if (rtrim($pathinfo, '/') === '/_configurator') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_configurator_home');
                    }

                    return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::checkAction',  '_route' => '_configurator_home',);
                }

                // _configurator_step
                if (0 === strpos($pathinfo, '/_configurator/step') && preg_match('#^/_configurator/step/(?P<index>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_configurator_step')), array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::stepAction',));
                }

                // _configurator_final
                if ($pathinfo === '/_configurator/final') {
                    return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::finalAction',  '_route' => '_configurator_final',);
                }

            }

        }

        // zona_comix_web_service_save_panels
        if ($pathinfo === '/api/savepanels') {
            if ($this->context->getMethod() != 'POST') {
                $allow[] = 'POST';
                goto not_zona_comix_web_service_save_panels;
            }

            $requiredSchemes = array (  'https' => 0,);
            if (!isset($requiredSchemes[$this->context->getScheme()])) {
                return $this->redirect($pathinfo, 'zona_comix_web_service_save_panels', key($requiredSchemes));
            }

            return array (  '_controller' => 'ZonaComix\\WebServiceBundle\\Controller\\PanelsModelController::SavePanelsAction',  '_route' => 'zona_comix_web_service_save_panels',);
        }
        not_zona_comix_web_service_save_panels:

        // zona_comix_website_cover
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'zona_comix_website_cover');
            }

            $requiredSchemes = array (  'https' => 0,);
            if (!isset($requiredSchemes[$this->context->getScheme()])) {
                return $this->redirect($pathinfo, 'zona_comix_website_cover', key($requiredSchemes));
            }

            return array (  '_controller' => 'ZonaComix\\WebsiteBundle\\Controller\\HomeController::CoverAction',  '_route' => 'zona_comix_website_cover',);
        }

        // zona_comix_website_home
        if (0 === strpos($pathinfo, '/inicio') && preg_match('#^/inicio/(?P<page>[^/]++)/?$#s', $pathinfo, $matches)) {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'zona_comix_website_home');
            }

            $requiredSchemes = array (  'https' => 0,);
            if (!isset($requiredSchemes[$this->context->getScheme()])) {
                return $this->redirect($pathinfo, 'zona_comix_website_home', key($requiredSchemes));
            }

            return $this->mergeDefaults(array_replace($matches, array('_route' => 'zona_comix_website_home')), array (  '_controller' => 'ZonaComix\\WebsiteBundle\\Controller\\HomeController::NewsFeedAction',  'page' => '1',));
        }

        if (0 === strpos($pathinfo, '/escritorio')) {
            // zona_comix_website_dashboard
            if (rtrim($pathinfo, '/') === '/escritorio') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'zona_comix_website_dashboard');
                }

                $requiredSchemes = array (  'https' => 0,);
                if (!isset($requiredSchemes[$this->context->getScheme()])) {
                    return $this->redirect($pathinfo, 'zona_comix_website_dashboard', key($requiredSchemes));
                }

                return array (  '_controller' => 'ZonaComix\\WebsiteBundle\\Controller\\DashboardController::indexAction',  '_route' => 'zona_comix_website_dashboard',);
            }

            // zona_comix_website_dashboard_revenue
            if (rtrim($pathinfo, '/') === '/escritorio/balance') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'zona_comix_website_dashboard_revenue');
                }

                $requiredSchemes = array (  'https' => 0,);
                if (!isset($requiredSchemes[$this->context->getScheme()])) {
                    return $this->redirect($pathinfo, 'zona_comix_website_dashboard_revenue', key($requiredSchemes));
                }

                return array (  '_controller' => 'ZonaComix\\WebsiteBundle\\Controller\\DashboardController::RevenueAction',  '_route' => 'zona_comix_website_dashboard_revenue',);
            }

            // zona_comix_website_dashboard_profile
            if (rtrim($pathinfo, '/') === '/escritorio/perfil') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'zona_comix_website_dashboard_profile');
                }

                $requiredSchemes = array (  'https' => 0,);
                if (!isset($requiredSchemes[$this->context->getScheme()])) {
                    return $this->redirect($pathinfo, 'zona_comix_website_dashboard_profile', key($requiredSchemes));
                }

                return array (  '_controller' => 'ZonaComix\\WebsiteBundle\\Controller\\DashboardController::ProfileAction',  '_route' => 'zona_comix_website_dashboard_profile',);
            }

            if (0 === strpos($pathinfo, '/escritorio/c')) {
                // zona_comix_website_dashboard_comics
                if (0 === strpos($pathinfo, '/escritorio/comics') && preg_match('#^/escritorio/comics/(?P<page>[^/]++)/?$#s', $pathinfo, $matches)) {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'zona_comix_website_dashboard_comics');
                    }

                    $requiredSchemes = array (  'https' => 0,);
                    if (!isset($requiredSchemes[$this->context->getScheme()])) {
                        return $this->redirect($pathinfo, 'zona_comix_website_dashboard_comics', key($requiredSchemes));
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'zona_comix_website_dashboard_comics')), array (  '_controller' => 'ZonaComix\\WebsiteBundle\\Controller\\DashboardController::ComicsAction',  'page' => 1,));
                }

                // zona_comix_website_dashboard_chapters
                if (0 === strpos($pathinfo, '/escritorio/capitulos') && preg_match('#^/escritorio/capitulos/(?P<comic>[^/]++)/(?P<page>[^/]++)/?$#s', $pathinfo, $matches)) {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'zona_comix_website_dashboard_chapters');
                    }

                    $requiredSchemes = array (  'https' => 0,);
                    if (!isset($requiredSchemes[$this->context->getScheme()])) {
                        return $this->redirect($pathinfo, 'zona_comix_website_dashboard_chapters', key($requiredSchemes));
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'zona_comix_website_dashboard_chapters')), array (  '_controller' => 'ZonaComix\\WebsiteBundle\\Controller\\DashboardController::ChaptersAction',  'page' => 1,));
                }

            }

            if (0 === strpos($pathinfo, '/escritorio/editar')) {
                // zona_comix_website_dashboard_edit_comic
                if (preg_match('#^/escritorio/editar/(?P<comic>[^/]++)/?$#s', $pathinfo, $matches)) {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'zona_comix_website_dashboard_edit_comic');
                    }

                    $requiredSchemes = array (  'https' => 0,);
                    if (!isset($requiredSchemes[$this->context->getScheme()])) {
                        return $this->redirect($pathinfo, 'zona_comix_website_dashboard_edit_comic', key($requiredSchemes));
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'zona_comix_website_dashboard_edit_comic')), array (  '_controller' => 'ZonaComix\\WebsiteBundle\\Controller\\DashboardController::EditComicAction',));
                }

                // zona_comix_website_dashboard_edit_chapter
                if (preg_match('#^/escritorio/editar/(?P<comic>[^/]++)/(?P<chapter>[^/]++)/?$#s', $pathinfo, $matches)) {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'zona_comix_website_dashboard_edit_chapter');
                    }

                    $requiredSchemes = array (  'https' => 0,);
                    if (!isset($requiredSchemes[$this->context->getScheme()])) {
                        return $this->redirect($pathinfo, 'zona_comix_website_dashboard_edit_chapter', key($requiredSchemes));
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'zona_comix_website_dashboard_edit_chapter')), array (  '_controller' => 'ZonaComix\\WebsiteBundle\\Controller\\DashboardController::EditChapterAction',));
                }

            }

            if (0 === strpos($pathinfo, '/escritorio/nuevo')) {
                // zona_comix_website_dashboard_new_comic
                if (rtrim($pathinfo, '/') === '/escritorio/nuevo') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'zona_comix_website_dashboard_new_comic');
                    }

                    $requiredSchemes = array (  'https' => 0,);
                    if (!isset($requiredSchemes[$this->context->getScheme()])) {
                        return $this->redirect($pathinfo, 'zona_comix_website_dashboard_new_comic', key($requiredSchemes));
                    }

                    return array (  '_controller' => 'ZonaComix\\WebsiteBundle\\Controller\\DashboardController::NewComicAction',  '_route' => 'zona_comix_website_dashboard_new_comic',);
                }

                // zona_comix_website_dashboard_new_chapter
                if (preg_match('#^/escritorio/nuevo/(?P<comic>[^/]++)/?$#s', $pathinfo, $matches)) {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'zona_comix_website_dashboard_new_chapter');
                    }

                    $requiredSchemes = array (  'https' => 0,);
                    if (!isset($requiredSchemes[$this->context->getScheme()])) {
                        return $this->redirect($pathinfo, 'zona_comix_website_dashboard_new_chapter', key($requiredSchemes));
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'zona_comix_website_dashboard_new_chapter')), array (  '_controller' => 'ZonaComix\\WebsiteBundle\\Controller\\DashboardController::NewChapterAction',));
                }

            }

            // zona_comix_website_dashboard_model_chapter
            if (0 === strpos($pathinfo, '/escritorio/maquetar') && preg_match('#^/escritorio/maquetar/(?P<comic>[^/]++)/(?P<chapter>[^/]++)/(?P<pages>[^/]++)/?$#s', $pathinfo, $matches)) {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'zona_comix_website_dashboard_model_chapter');
                }

                $requiredSchemes = array (  'https' => 0,);
                if (!isset($requiredSchemes[$this->context->getScheme()])) {
                    return $this->redirect($pathinfo, 'zona_comix_website_dashboard_model_chapter', key($requiredSchemes));
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'zona_comix_website_dashboard_model_chapter')), array (  '_controller' => 'ZonaComix\\WebsiteBundle\\Controller\\DashboardController::ModelChapterAction',));
            }

            // zona_comix_website_dashboard_referral
            if (rtrim($pathinfo, '/') === '/escritorio/referidos') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'zona_comix_website_dashboard_referral');
                }

                $requiredSchemes = array (  'https' => 0,);
                if (!isset($requiredSchemes[$this->context->getScheme()])) {
                    return $this->redirect($pathinfo, 'zona_comix_website_dashboard_referral', key($requiredSchemes));
                }

                return array (  '_controller' => 'ZonaComix\\WebsiteBundle\\Controller\\DashboardController::ReferralAction',  '_route' => 'zona_comix_website_dashboard_referral',);
            }

        }

        if (0 === strpos($pathinfo, '/libreria')) {
            // zona_comix_website_library
            if (rtrim($pathinfo, '/') === '/libreria') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'zona_comix_website_library');
                }

                $requiredSchemes = array (  'https' => 0,);
                if (!isset($requiredSchemes[$this->context->getScheme()])) {
                    return $this->redirect($pathinfo, 'zona_comix_website_library', key($requiredSchemes));
                }

                return array (  '_controller' => 'ZonaComix\\WebsiteBundle\\Controller\\LibraryController::indexAction',  '_route' => 'zona_comix_website_library',);
            }

            // zona_comix_website_library_users
            if (0 === strpos($pathinfo, '/libreria/usuarios') && preg_match('#^/libreria/usuarios/(?P<page>[^/]++)/?$#s', $pathinfo, $matches)) {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'zona_comix_website_library_users');
                }

                $requiredSchemes = array (  'https' => 0,);
                if (!isset($requiredSchemes[$this->context->getScheme()])) {
                    return $this->redirect($pathinfo, 'zona_comix_website_library_users', key($requiredSchemes));
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'zona_comix_website_library_users')), array (  '_controller' => 'ZonaComix\\WebsiteBundle\\Controller\\LibraryController::UsersAction',  'page' => 1,));
            }

            // zona_comix_website_library_comics
            if (0 === strpos($pathinfo, '/libreria/comics') && preg_match('#^/libreria/comics/(?P<page>[^/]++)/?$#s', $pathinfo, $matches)) {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'zona_comix_website_library_comics');
                }

                $requiredSchemes = array (  'https' => 0,);
                if (!isset($requiredSchemes[$this->context->getScheme()])) {
                    return $this->redirect($pathinfo, 'zona_comix_website_library_comics', key($requiredSchemes));
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'zona_comix_website_library_comics')), array (  '_controller' => 'ZonaComix\\WebsiteBundle\\Controller\\LibraryController::ComicsAction',  'page' => 1,));
            }

        }

        // zona_comix_website_comic
        if (0 === strpos($pathinfo, '/comic') && preg_match('#^/comic/(?P<comic>[^/]++)/(?P<page>[^/]++)/?$#s', $pathinfo, $matches)) {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'zona_comix_website_comic');
            }

            $requiredSchemes = array (  'https' => 0,);
            if (!isset($requiredSchemes[$this->context->getScheme()])) {
                return $this->redirect($pathinfo, 'zona_comix_website_comic', key($requiredSchemes));
            }

            return $this->mergeDefaults(array_replace($matches, array('_route' => 'zona_comix_website_comic')), array (  '_controller' => 'ZonaComix\\WebsiteBundle\\Controller\\ComicController::indexAction',  'page' => 1,));
        }

        // zona_comix_website_user
        if (0 === strpos($pathinfo, '/usuario') && preg_match('#^/usuario/(?P<username>[^/]++)/(?P<page>[^/]++)/?$#s', $pathinfo, $matches)) {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'zona_comix_website_user');
            }

            $requiredSchemes = array (  'https' => 0,);
            if (!isset($requiredSchemes[$this->context->getScheme()])) {
                return $this->redirect($pathinfo, 'zona_comix_website_user', key($requiredSchemes));
            }

            return $this->mergeDefaults(array_replace($matches, array('_route' => 'zona_comix_website_user')), array (  '_controller' => 'ZonaComix\\WebsiteBundle\\Controller\\UserController::indexAction',  'page' => 1,));
        }

        if (0 === strpos($pathinfo, '/buscar')) {
            // zona_comix_website_search
            if (rtrim($pathinfo, '/') === '/buscar') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'zona_comix_website_search');
                }

                $requiredSchemes = array (  'https' => 0,);
                if (!isset($requiredSchemes[$this->context->getScheme()])) {
                    return $this->redirect($pathinfo, 'zona_comix_website_search', key($requiredSchemes));
                }

                return array (  '_controller' => 'ZonaComix\\WebsiteBundle\\Controller\\SearchController::indexAction',  '_route' => 'zona_comix_website_search',);
            }

            // zona_comix_website_search_result
            if (preg_match('#^/buscar/(?P<filter>[^/]++)/(?P<page>[^/]++)/?$#s', $pathinfo, $matches)) {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'zona_comix_website_search_result');
                }

                $requiredSchemes = array (  'https' => 0,);
                if (!isset($requiredSchemes[$this->context->getScheme()])) {
                    return $this->redirect($pathinfo, 'zona_comix_website_search_result', key($requiredSchemes));
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'zona_comix_website_search_result')), array (  '_controller' => 'ZonaComix\\WebsiteBundle\\Controller\\SearchController::ResultAction',  'page' => 1,));
            }

        }

        if (0 === strpos($pathinfo, '/registro')) {
            // zona_comix_website_register
            if (preg_match('#^/registro/(?P<username>[^/]++)/?$#s', $pathinfo, $matches)) {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'zona_comix_website_register');
                }

                $requiredSchemes = array (  'https' => 0,);
                if (!isset($requiredSchemes[$this->context->getScheme()])) {
                    return $this->redirect($pathinfo, 'zona_comix_website_register', key($requiredSchemes));
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'zona_comix_website_register')), array (  '_controller' => 'ZonaComix\\WebsiteBundle\\Controller\\RegisterController::RegisterAction',  'username' => 'eltantillo',));
            }

            // zona_comix_website_register_complete
            if (rtrim($pathinfo, '/') === '/registrocompleto') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'zona_comix_website_register_complete');
                }

                $requiredSchemes = array (  'https' => 0,);
                if (!isset($requiredSchemes[$this->context->getScheme()])) {
                    return $this->redirect($pathinfo, 'zona_comix_website_register_complete', key($requiredSchemes));
                }

                return array (  '_controller' => 'ZonaComix\\WebsiteBundle\\Controller\\RegisterController::RegisterCompleteAction',  '_route' => 'zona_comix_website_register_complete',);
            }

        }

        // zona_comix_website_validate_account
        if (0 === strpos($pathinfo, '/validar') && preg_match('#^/validar/(?P<username>[^/]++)/(?P<key>[^/]++)/?$#s', $pathinfo, $matches)) {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'zona_comix_website_validate_account');
            }

            $requiredSchemes = array (  'https' => 0,);
            if (!isset($requiredSchemes[$this->context->getScheme()])) {
                return $this->redirect($pathinfo, 'zona_comix_website_validate_account', key($requiredSchemes));
            }

            return $this->mergeDefaults(array_replace($matches, array('_route' => 'zona_comix_website_validate_account')), array (  '_controller' => 'ZonaComix\\WebsiteBundle\\Controller\\RegisterController::ValidateAccountAction',));
        }

        // zona_comix_website_read_chapter
        if (0 === strpos($pathinfo, '/leer') && preg_match('#^/leer/(?P<comic>[^/]++)/(?P<chapter>[^/]++)/(?P<page>[^/]++)/?$#s', $pathinfo, $matches)) {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'zona_comix_website_read_chapter');
            }

            $requiredSchemes = array (  'https' => 0,);
            if (!isset($requiredSchemes[$this->context->getScheme()])) {
                return $this->redirect($pathinfo, 'zona_comix_website_read_chapter', key($requiredSchemes));
            }

            return $this->mergeDefaults(array_replace($matches, array('_route' => 'zona_comix_website_read_chapter')), array (  '_controller' => 'ZonaComix\\WebsiteBundle\\Controller\\ReadController::indexAction',  'chapter' => 1,  'page' => 0,));
        }

        if (0 === strpos($pathinfo, '/explorar')) {
            // zona_comix_website_explore
            if (rtrim($pathinfo, '/') === '/explorar') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'zona_comix_website_explore');
                }

                $requiredSchemes = array (  'https' => 0,);
                if (!isset($requiredSchemes[$this->context->getScheme()])) {
                    return $this->redirect($pathinfo, 'zona_comix_website_explore', key($requiredSchemes));
                }

                return array (  '_controller' => 'ZonaComix\\WebsiteBundle\\Controller\\ExploreController::indexAction',  '_route' => 'zona_comix_website_explore',);
            }

            // zona_comix_website_explore_results
            if (preg_match('#^/explorar/(?P<rating>[^/]++)/(?P<genre>[^/]++)/(?P<style>[^/]++)/(?P<license>[^/]++)/(?P<page>[^/]++)/?$#s', $pathinfo, $matches)) {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'zona_comix_website_explore_results');
                }

                $requiredSchemes = array (  'https' => 0,);
                if (!isset($requiredSchemes[$this->context->getScheme()])) {
                    return $this->redirect($pathinfo, 'zona_comix_website_explore_results', key($requiredSchemes));
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'zona_comix_website_explore_results')), array (  '_controller' => 'ZonaComix\\WebsiteBundle\\Controller\\ExploreController::ResultsAction',  'page' => 1,  'rating' => '%',));
            }

        }

        if (0 === strpos($pathinfo, '/seguir')) {
            // zona_comix_website_follow_user
            if (0 === strpos($pathinfo, '/seguir/usuario') && preg_match('#^/seguir/usuario/(?P<username>[^/]++)/?$#s', $pathinfo, $matches)) {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'zona_comix_website_follow_user');
                }

                $requiredSchemes = array (  'https' => 0,);
                if (!isset($requiredSchemes[$this->context->getScheme()])) {
                    return $this->redirect($pathinfo, 'zona_comix_website_follow_user', key($requiredSchemes));
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'zona_comix_website_follow_user')), array (  '_controller' => 'ZonaComix\\WebsiteBundle\\Controller\\FollowController::FollowUserAction',));
            }

            // zona_comix_website_follow_comic
            if (0 === strpos($pathinfo, '/seguir/comic') && preg_match('#^/seguir/comic/(?P<comic>[^/]++)/?$#s', $pathinfo, $matches)) {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'zona_comix_website_follow_comic');
                }

                $requiredSchemes = array (  'https' => 0,);
                if (!isset($requiredSchemes[$this->context->getScheme()])) {
                    return $this->redirect($pathinfo, 'zona_comix_website_follow_comic', key($requiredSchemes));
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'zona_comix_website_follow_comic')), array (  '_controller' => 'ZonaComix\\WebsiteBundle\\Controller\\FollowController::FollowComicAction',));
            }

        }

        if (0 === strpos($pathinfo, '/dejar')) {
            // zona_comix_website_unfollow_user
            if (0 === strpos($pathinfo, '/dejar/usuario') && preg_match('#^/dejar/usuario/(?P<username>[^/]++)/?$#s', $pathinfo, $matches)) {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'zona_comix_website_unfollow_user');
                }

                $requiredSchemes = array (  'https' => 0,);
                if (!isset($requiredSchemes[$this->context->getScheme()])) {
                    return $this->redirect($pathinfo, 'zona_comix_website_unfollow_user', key($requiredSchemes));
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'zona_comix_website_unfollow_user')), array (  '_controller' => 'ZonaComix\\WebsiteBundle\\Controller\\FollowController::UnfollowUserAction',));
            }

            // zona_comix_website_unfollow_comic
            if (0 === strpos($pathinfo, '/dejar/comic') && preg_match('#^/dejar/comic/(?P<comic>[^/]++)/?$#s', $pathinfo, $matches)) {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'zona_comix_website_unfollow_comic');
                }

                $requiredSchemes = array (  'https' => 0,);
                if (!isset($requiredSchemes[$this->context->getScheme()])) {
                    return $this->redirect($pathinfo, 'zona_comix_website_unfollow_comic', key($requiredSchemes));
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'zona_comix_website_unfollow_comic')), array (  '_controller' => 'ZonaComix\\WebsiteBundle\\Controller\\FollowController::UnfollowComicAction',));
            }

        }

        // login
        if (rtrim($pathinfo, '/') === '/identificarse') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'login');
            }

            $requiredSchemes = array (  'https' => 0,);
            if (!isset($requiredSchemes[$this->context->getScheme()])) {
                return $this->redirect($pathinfo, 'login', key($requiredSchemes));
            }

            return array (  '_controller' => 'ZonaComix\\WebsiteBundle\\Controller\\RegisterController::LoginAction',  '_route' => 'login',);
        }

        // login_check
        if (rtrim($pathinfo, '/') === '/login_check') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'login_check');
            }

            $requiredSchemes = array (  'https' => 0,);
            if (!isset($requiredSchemes[$this->context->getScheme()])) {
                return $this->redirect($pathinfo, 'login_check', key($requiredSchemes));
            }

            return array('_route' => 'login_check');
        }

        // logout
        if (rtrim($pathinfo, '/') === '/desconectarse') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'logout');
            }

            $requiredSchemes = array (  'https' => 0,);
            if (!isset($requiredSchemes[$this->context->getScheme()])) {
                return $this->redirect($pathinfo, 'logout', key($requiredSchemes));
            }

            return array('_route' => 'logout');
        }

        // test
        if (rtrim($pathinfo, '/') === '/test') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'test');
            }

            $requiredSchemes = array (  'https' => 0,);
            if (!isset($requiredSchemes[$this->context->getScheme()])) {
                return $this->redirect($pathinfo, 'test', key($requiredSchemes));
            }

            return array (  '_controller' => 'ZonaComix\\WebsiteBundle\\Controller\\TestController::indexAction',  '_route' => 'test',);
        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
