<?php
namespace Application\Form;

use Zend\Form\Form;

class Classmodule extends Form
 {
    protected $em;
    protected $groupid;
    protected $periodid;
    
    /*
     * Fetch available list
     */
    public function getAvailableModules(){
        
        $options[""] = "--Select--";
        //Query all users(Lecturers) not assigned to other departments
        //$modules = $this->em->getRepository('\Application\Entity\Module')->findAll();
        $modulequery  = $this->em->createQuery("SELECT M FROM \Application\Entity\Module M ");
                             //->setParameter('period', $this->periodid)
                             //->setParameter('groupid', $this->groupid);
        
        foreach($modulequery->getResult() as $module ){
            $options[$module->getPkModuleid()] = $module->getModuleName()." (".$module->getModuleCode().")";
        }
        
        return $options;
    }
    
    /*
     * Fetch allocated list
     */
    public function getAllocatedModules(){
        
        $options[""] = "--Select--";
        //Query all users(Lecturers) not assigned to other departments
        //$modules = $this->em->getRepository('\Application\Entity\Module')->findAll();
        $query  = $this->em->createQuery("SELECT C FROM \Application\Entity\Classmodule C WHERE C.fkPeriodid = :period AND C.fkGroupid = :groupid ")
                             ->setParameter('period', $this->periodid)
                             ->setParameter('groupid', $this->groupid);
        
        foreach($query->getResult() as $module ){
            $options[$module->getPkCcid()] = $module->getFkModuleid()->getModuleName()." (".$module->getFkModuleid()->getModuleCode().")";
        }
        
        return $options;
    }
    


    public function __construct($groupid,$periodid,\Doctrine\ORM\EntityManager $em = null)
    {
        $this->em       = $em;
        $this->periodid = $periodid;
        $this->groupid  = $groupid;
         // we want to ignore the name passed
         parent::__construct('classmodule');
	
         $this->add(array(
             'name'         => 'fkModuleid',
             'type' => 'Zend\Form\Element\Select',
             'attributes'   => array('class'=> 'form-control','id'=>'fkModuleid'),
              'options' => array(
                'label' => 'Module:*',
                'value_options' => $this->getAvailableModules()
              )
         )); 
         
         /*
         * Configure id field to form
         */	 
         $this->add(array(
             'name'         => 'pkCcid',
             'type'         => 'hidden',
             'attributes'   => array('class'=> 'form-control','id'=>'pkCcid'),
             'options' => array(
                'label' => ' '
            )
         ));
         
         $this->add(array(
             'name'         => 'parentid',
             'type' => 'Zend\Form\Element\Select',
             'attributes'   => array('class'=> 'form-control','id'=>'parentid'),
              'options' => array(
                'label' => 'Parent module:',
                'value_options' => $this->getAllocatedModules()
              )
         )); 
         
         /*
         * Configure examweight field to form
         */	 
         $this->add(array(
             'name'         => 'examweight',
             'type'         => 'Zend\Form\Element\Number',
             'attributes'   => array('class'=> 'form-control','id'=>'examweight'),
	     'options'      => array('label' => 'Exam weight:',),
         ));
         
         $this->add(array(
             'name'         => 'fkPeriodid',
             'type'         => 'hidden',
             'attributes'   => array('class'=> 'form-control','id'=>'fkPeriodid'),
             'options' => array(
                'label' => ' '
            )
         ));
         
         
	/*
         * Configure examweight field to form
         */	 
         $this->add(array(
             'name'         => 'cwkweight',
             'type'         => 'Zend\Form\Element\Number',
             'attributes'   => array('class'=> 'form-control','id'=>'cwkweight'),
	     'options'      => array('label' => 'Course work weight:',),
         ));
         
          
         $this->add(array(
             'name'         => 'fkGroupid',
             'type'         => 'hidden',
             'attributes'   => array('class'=> 'form-control','id'=>'fkGroupid'),
             'options' => array(
                'label' => ' '
            )
         ));
        
         $this->add(array(
            'type' => 'Zend\Form\Element\Select',
            'name' => 'iscore',
            'options' => array(
                'label' => 'Is core:*',
                'value_options' => array("1"=>"Yes","0"=>"No")
            ),
            'attributes' => array(
                'class'    => 'form-control',
                
            )
        ));
	  
     }
 }