<?php
/**
 * Copyright (c) 2013 Gijs Kunze
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace GWK\MailjetBundle\Factory;

class Factory {
    /**
     * Create a new Mailjet instance with the appropriate settings
     *
     * @param $api_key
     * @param $secret_key
     * @param $format
     * @param $debug_level
     * @return \Mailjet
     */
    public function get($api_key, $secret_key, $format, $debug_level) {
        $mailjet = new \Mailjet($api_key, $secret_key);

        $mailjet->debug = $debug_level;
        $mailjet->output = $format;

        return $mailjet;
    }
}