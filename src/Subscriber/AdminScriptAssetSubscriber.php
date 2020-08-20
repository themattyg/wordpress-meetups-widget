<?php

/*
 * This file is part of WordPress Widget Boilerplate
 * (c) Tom McFarlin <tom@tommcfarlin.com>
 *
 * This source file is subject to the GPL license that is bundled
 * with this source code in the file LICENSE.
 */

namespace WordPressMeetupsWidget\Subscriber;

/**
 * The subscriber responsible for loading the JavaScript on the Widget's adminsitration page.
 */
class AdminScriptAssetSubscriber extends AbstractSubscriber
{
    /**
     * {@inheritdoc}
     */
    public function __construct(string $hook)
    {
        parent::__construct($hook);
    }

    /**
     * Adds the administrative JavaScript to the widget administration page.
     */
    public function load()
    {
        if ('widgets' !== get_current_screen()->id) {
            return;
        }

        wp_enqueue_script(
            'wordpress-meetups-widget',
            plugin_dir_url(\dirname(__DIR__)).'assets/js/admin.js'
        );
    }
}
