<?php namespace App\Traits;

use ReCaptcha\ReCaptcha;

trait reCaptchaTrait {

    public function verifyCaptcha($response)
    {

        $remoteip = $_SERVER['REMOTE_ADDR'];
        $secret   = env('SETTINGS_GOOGLE_RECAPTCHA_SECRET_KEY');

        $recaptcha = new ReCaptcha($secret);
        $status = $recaptcha->verify($response, $remoteip);
        if ($status->isSuccess()) {
            return true;
        } else {
            return false;
        }

    }

}