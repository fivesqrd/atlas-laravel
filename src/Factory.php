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

    public function sql()
    {
        if (empty($this->_config)) {
            throw new \Exception('Atlas config is empty');
        }

        $facory = new Atlas\Database\Factory($this->_config);

        return $facory->sql();
    }

    public function relation($entity)
    {
        $namespace = $this->_namespace($entity);
        return $this->model($namespace)->relation($entity);
    }

    public function save($entity)
    {
        $namespace = $this->_namespace($entity);
        return $this->model($namespace)->save($entity);
    }

    public function delete($entity)
    {
        $namespace = $this->_namespace($entity);
        return $this->model($namespace)->delete($entity);
    }

    protected function _namespace($entity)
    {
        $class   = get_class($entity);
        $reflect = new \ReflectionClass($class);

        return $reflect->getNamespaceName();
    }
}
