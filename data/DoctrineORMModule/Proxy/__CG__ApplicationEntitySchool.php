<?php

namespace DoctrineORMModule\Proxy\__CG__\Application\Entity;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class School extends \Application\Entity\School implements \Doctrine\ORM\Proxy\Proxy
{
    /**
     * @var \Closure the callback responsible for loading properties in the proxy object. This callback is called with
     *      three parameters, being respectively the proxy object to be initialized, the method that triggered the
     *      initialization process and an array of ordered parameters that were passed to that method.
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setInitializer
     */
    public $__initializer__;

    /**
     * @var \Closure the callback responsible of loading properties that need to be copied in the cloned object
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setCloner
     */
    public $__cloner__;

    /**
     * @var boolean flag indicating if this object was already initialized
     *
     * @see \Doctrine\Common\Persistence\Proxy::__isInitialized
     */
    public $__isInitialized__ = false;

    /**
     * @var array properties to be lazy loaded, with keys being the property
     *            names and values being their default values
     *
     * @see \Doctrine\Common\Persistence\Proxy::__getLazyProperties
     */
    public static $lazyPropertiesDefaults = array();



    /**
     * @param \Closure $initializer
     * @param \Closure $cloner
     */
    public function __construct($initializer = null, $cloner = null)
    {

        $this->__initializer__ = $initializer;
        $this->__cloner__      = $cloner;
    }







    /**
     * 
     * @return array
     */
    public function __sleep()
    {
        if ($this->__isInitialized__) {
            return array('__isInitialized__', '' . "\0" . 'Application\\Entity\\School' . "\0" . 'pkSchoolid', '' . "\0" . 'Application\\Entity\\School' . "\0" . 'schoolCode', '' . "\0" . 'Application\\Entity\\School' . "\0" . 'schoolName', '' . "\0" . 'Application\\Entity\\School' . "\0" . 'hos');
        }

        return array('__isInitialized__', '' . "\0" . 'Application\\Entity\\School' . "\0" . 'pkSchoolid', '' . "\0" . 'Application\\Entity\\School' . "\0" . 'schoolCode', '' . "\0" . 'Application\\Entity\\School' . "\0" . 'schoolName', '' . "\0" . 'Application\\Entity\\School' . "\0" . 'hos');
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (School $proxy) {
                $proxy->__setInitializer(null);
                $proxy->__setCloner(null);

                $existingProperties = get_object_vars($proxy);

                foreach ($proxy->__getLazyProperties() as $property => $defaultValue) {
                    if ( ! array_key_exists($property, $existingProperties)) {
                        $proxy->$property = $defaultValue;
                    }
                }
            };

        }
    }

    /**
     * 
     */
    public function __clone()
    {
        $this->__cloner__ && $this->__cloner__->__invoke($this, '__clone', array());
    }

    /**
     * Forces initialization of the proxy
     */
    public function __load()
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, '__load', array());
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __isInitialized()
    {
        return $this->__isInitialized__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitialized($initialized)
    {
        $this->__isInitialized__ = $initialized;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitializer(\Closure $initializer = null)
    {
        $this->__initializer__ = $initializer;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __getInitializer()
    {
        return $this->__initializer__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setCloner(\Closure $cloner = null)
    {
        $this->__cloner__ = $cloner;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific cloning logic
     */
    public function __getCloner()
    {
        return $this->__cloner__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     * @static
     */
    public function __getLazyProperties()
    {
        return self::$lazyPropertiesDefaults;
    }

    
    /**
     * {@inheritDoc}
     */
    public function getPkSchoolid()
    {
        if ($this->__isInitialized__ === false) {
            return (int)  parent::getPkSchoolid();
        }


        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPkSchoolid', array());

        return parent::getPkSchoolid();
    }

    /**
     * {@inheritDoc}
     */
    public function setSchoolCode($schoolCode)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setSchoolCode', array($schoolCode));

        return parent::setSchoolCode($schoolCode);
    }

    /**
     * {@inheritDoc}
     */
    public function getSchoolCode()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getSchoolCode', array());

        return parent::getSchoolCode();
    }

    /**
     * {@inheritDoc}
     */
    public function setSchoolName($schoolName)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setSchoolName', array($schoolName));

        return parent::setSchoolName($schoolName);
    }

    /**
     * {@inheritDoc}
     */
    public function getSchoolName()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getSchoolName', array());

        return parent::getSchoolName();
    }

    /**
     * {@inheritDoc}
     */
    public function setHos(\Application\Entity\User $hos = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setHos', array($hos));

        return parent::setHos($hos);
    }

    /**
     * {@inheritDoc}
     */
    public function getHos()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getHos', array());

        return parent::getHos();
    }

}
