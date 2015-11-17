<?php

namespace DoctrineORMModule\Proxy\__CG__\Application\Entity;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class Faculty extends \Application\Entity\Faculty implements \Doctrine\ORM\Proxy\Proxy
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
            return array('__isInitialized__', '' . "\0" . 'Application\\Entity\\Faculty' . "\0" . 'pkFacultyid', '' . "\0" . 'Application\\Entity\\Faculty' . "\0" . 'facultyCode', '' . "\0" . 'Application\\Entity\\Faculty' . "\0" . 'facultyName', '' . "\0" . 'Application\\Entity\\Faculty' . "\0" . 'fkStaffid');
        }

        return array('__isInitialized__', '' . "\0" . 'Application\\Entity\\Faculty' . "\0" . 'pkFacultyid', '' . "\0" . 'Application\\Entity\\Faculty' . "\0" . 'facultyCode', '' . "\0" . 'Application\\Entity\\Faculty' . "\0" . 'facultyName', '' . "\0" . 'Application\\Entity\\Faculty' . "\0" . 'fkStaffid');
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (Faculty $proxy) {
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
    public function getPkFacultyid()
    {
        if ($this->__isInitialized__ === false) {
            return (int)  parent::getPkFacultyid();
        }


        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPkFacultyid', array());

        return parent::getPkFacultyid();
    }

    /**
     * {@inheritDoc}
     */
    public function setFacultyCode($facultyCode)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setFacultyCode', array($facultyCode));

        return parent::setFacultyCode($facultyCode);
    }

    /**
     * {@inheritDoc}
     */
    public function getFacultyCode()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getFacultyCode', array());

        return parent::getFacultyCode();
    }

    /**
     * {@inheritDoc}
     */
    public function setFacultyName($facultyName)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setFacultyName', array($facultyName));

        return parent::setFacultyName($facultyName);
    }

    /**
     * {@inheritDoc}
     */
    public function getFacultyName()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getFacultyName', array());

        return parent::getFacultyName();
    }

    /**
     * {@inheritDoc}
     */
    public function setFkStaffid(\Application\Entity\Staff $fkStaffid = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setFkStaffid', array($fkStaffid));

        return parent::setFkStaffid($fkStaffid);
    }

    /**
     * {@inheritDoc}
     */
    public function getFkStaffid()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getFkStaffid', array());

        return parent::getFkStaffid();
    }

}
