<?php

require_once('IyzipayBootstrap.php');

IyzipayBootstrap::init();

class Config
{
    public static function options()
    {
        $options = new \Iyzipay\Options();
        $options->setApiKey($config['iyzicoApiKey']);
        $options->setSecretKey($config['iyzicoSecretKey']);
        $options->setBaseUrl($config['iyzicoBaseUrl']);
        return $options;
    }
}