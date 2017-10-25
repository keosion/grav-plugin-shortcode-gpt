<?php
namespace Grav\Plugin;

use Grav\Common\Plugin;

use Grav\Common\Data\Data;
use Grav\Common\Page\Page;
use Grav\Common\Twig\Twig;
use RocketTheme\Toolbox\Event\Event;

/**
 * Class ShortcodeGPTPlugin
 * @package Grav\Plugin
 */
class ShortcodeGPTPlugin extends Plugin
{
    /**
     * @return array
     *
     * Gives the core a list of events that the plugin wants to listen to.
     */
    public static function getSubscribedEvents()
    {
        return [
            'onPageContentRaw' => ['onPageContentRaw', 0],
            'onTwigSiteVariables' => ['onTwigSiteVariables', 0],
            'onTwigTemplatePaths' => ['onTwigTemplatePaths', 0],
            'onShortcodeHandlers' => ['onShortcodeHandlers', 0]
        ];
    }

    /**
     * Initialize shortcode.
     */
    public function onShortcodeHandlers()
    {
        $this->grav['shortcode']->registerAllShortcodes(__DIR__.'/shortcodes');
    }

    /**
    * Add content after page content was read into the system.
    *
    * @param Event $event an event object, when `onPageContentRaw` is fired
    */
    public function onPageContentRaw(Event $event)
    {
        /** @var Page $page */
        $page = $event['page'];

        /** @var Twig $twig */
        $twig = $this->grav['twig'];

        /** @var Data $config */
        $config = $this->mergeConfig($page);

        /* Set twig vars */
        $twig->twig_vars['shortcode-gpt_css-classes'] = $config->get('cssClasses');
    }

    /**
     * Add style and script to page.
     */
    public function onTwigSiteVariables()
    {
        $this->grav['assets']->addJs('plugin://shortcode-gpt/assets/js/gpt.js');
        $this->grav['assets']->addCss('plugin://shortcode-gpt/assets/css/gpt.css');
    }

    /**
     * Add plugin templates directory to twig lookup paths.
     */
    public function onTwigTemplatePaths()
    {
        $this->grav['twig']->twig_paths[] = __DIR__.'/templates';
    }

}
