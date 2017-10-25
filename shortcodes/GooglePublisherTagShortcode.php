<?php

namespace Grav\Plugin\Shortcodes;

use Thunder\Shortcode\Shortcode\ShortcodeInterface;

class GooglePublisherTagShortcode extends Shortcode
{
    public function init()
    {
        // keep track of how many ads we have using $idx
        $idx = 0;

        $this->shortcode->getHandlers()->add('GooglePublisherTag', function (ShortcodeInterface $sc) use (&$idx) {
            $classes = $this->twig->twig_vars['shortcode-gpt_css-classes'];
            $slot = $sc->getParameter('slot');
            $width = $sc->getParameter('width');
            $height = $sc->getParameter('height');

            // exit silently if either one of the props is not set
            if (!$slot || !$width || !$height) {
                return '';
            }

            // generate div id
            $timestamp = time();
            $id = 'reclame-'.$timestamp.'-'.$idx;
            $idx++;

            $output = $this->twig->processTemplate('partials/shortcode-gpt_gpt.html.twig', array(
                'gpt_classes' => $classes,
                'gpt_slot' => $slot,
                'gpt_width' => $width,
                'gpt_height' => $height,
                'gpt_id' => $id,
            ));
            return $output;
        });
    }
}
