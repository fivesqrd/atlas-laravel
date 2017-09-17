<?php

namespace Atlas\Laravel;

use Atlas;

class Factory
{
    protected $_config = array();

    public function __construct(array $config)
    {
        $this->_config = $config;
    }

    public function model($class)
    {
        if (empty($this->_config)) {
            throw new \Exception('Atlas config is empty');
        }

        return new Atlas\Proxy(
            new Atlas\Database\Factory($this->_config),
            new Atlas\Database\Resolver($class)
        );
    }
}
