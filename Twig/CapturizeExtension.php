<?php

namespace Capturize\ExtensionBundle\Twig;

class CapturizeExtension extends \Twig_Extension {

    private $public_key;
    private $private_key;
    private $api;

    public function __construct($public_key, $private_key)
    {
        $this->api = new \Capturize_Api($public_key, $private_key);
    }

    public function getFilters()
    {
        return array(
            'capturize'  => new \Twig_Filter_Method($this, 'capturize'),
        );
    }

    public function capturize($url)
    {
        return $this->api->getImageUrl($url);
    }

    public function getName()
    {
        return 'capturize_extension';
    }

    public function __call($name, $arguments)
    {
        if (method_exists($this->api, $name))
        {
            return call_user_func_array(array($this->api, $name), $arguments);
        }
        else
        {
            throw new \Exception("Call to undefined method ".$name." in ".get_class($this));
        }
    }

}

?>