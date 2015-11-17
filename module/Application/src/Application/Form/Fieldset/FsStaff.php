<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Application\Form\Fieldset;

/**
 * Description of Login fieldset
 *
 * @author hkumwembe
 */

use Zend\Form\Fieldset;
use Zend\InputFilter\InputFilterProviderInterface;
use Zend\Stdlib\Hydrator\ClassMethods as ClassMethodsHydrator;
use Application\Entity\Staff;


class FsStaff extends Fieldset implements InputFilterProviderInterface
{
    protected $em;
    
    /*
     * Fetch list of program group
     */
    public function getStaff(){
        
        $options[""] = "--Select--";
        //Query all users(Lecturers) not assigned to other departments
        $userquery = $this->em->createQuery(" SELECT u"
                                          . " FROM \Application\Entity\User u JOIN u.fkRoleid r where r.roleName = 'LECT' "
                                          . " AND u.pkUserid NOT IN( SELECT IDENTITY(s.fkUserid) FROM \Application\Entity\Staff s )");
        
        foreach($userquery->getResult() as $user ){
            $options[$user->getPkUserid()] = $user->getFirstname()." ".$user->getSurname();
        }
        
        return $options;
    }


    public function __construct(\Doctrine\ORM\EntityManager $em = null)
    {
        $this->em = $em;
        
        parent::__construct('Staff');
        
        
        
        $this->setHydrator(new ClassMethodsHydrator(false))
            ->setObject(new Staff());
        
        $this->add(array(
            'type' => 'Zend\Form\Element\Select',
            'name' => 'fkUserid',
            'options' => array(
                'label' => 'Staff name:*',
                'value_options' => $this->getStaff()
            ),
            'attributes' => array(
                'required' => 'required',
                'class'    => 'form-control',
                
            )
        ));
        
         $this->add(array(
            'name' => 'fkDeptid',
            'type' => 'hidden',
            'options' => array(
                'label' => ' '
            ),
        ));
         
        $this->add(array(
            'type' => 'Zend\Form\Element\Select',
            'name' => 'mode',
            'options' => array(
                'label' => 'Mode:*',
                'value_options' => array("FULLTIME"=>"FULLTIME","PARTTIME"=>"PARTTIME")
            ),
            'attributes' => array(
                'required' => 'required',
                'class'    => 'form-control',
                
            )
        ));
        
        $this->add(array(
            'type' => 'Zend\Form\Element\Checkbox',
            'name' => 'ishead',
            'options' => array(
                'label' => 'Head of department:',
                'checked_value' => '1',
                'unchecked_value' => '0'
            )
        ));
        
        $this->add(array(
            'name' => 'pkStaffid',
            'type' => 'hidden',
            'options' => array(
                'label' => ' '
            ),
        ));
        
        
        
        
       

        
    }

    /**
     * @return array
     */
    public function getInputFilterSpecification()
    {
        return array(
            'fkUserid' => array(
                'required' => true
            ),
            'mode' => array(
                'required' => true
            ),

        );
    }
}
