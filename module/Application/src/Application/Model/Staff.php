<?php
namespace Application\Model;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Staff
 *
 * @author hkumwembe
 */
class Staff extends Usermodel {
    
    
    
      public function registerUser(){
      
        //Save user in user table
      
        //Save in staff table
      
      }
    
    
    /*
     * Allocate user staff to department
     */
    public function allocate($object) {
        
        if(!$object->getPkStaffid()){
            $staff = new \Application\Entity\Staff();
        }else{
            $criteria = Criteria::create()
                        ->where(Criteria::expr()->eq("pkStaffid", $object->getPkStaffid()));
            $staff = $this->getEntity("\Application\Entity\Staff", $criteria);
        }
        
        //Set user object values to be saved
        $staff->setFkUserid($object->getFkUserid());
        $staff->setFkDeptid($object->getFkDeptid());
        $staff->setMode($object->getMode());
        
        try{
            //Commit values set to the object 
            if(!$object->getPkStaffid()){
                $this->em->persist($staff);
            }
            
            //Save values if just updating record
            $this->em->flush($staff);
            return $staff;
            
        }catch(Exception $e){
            throw($e->getMessages());
        }
    }
    
    /*
     * Assign lecturer module
     */
    public function assignModule($moduleparams) {
        
    }
    
    /*
     * Set staff values
     */
    public function setStaffObject($arrayval){

        $object = new \Application\Entity\Staff();
        
        $object->setFkUserid($arrayval['user']);
        $object->setFkDeptid($arrayval['dept']);
        $object->setMode($arrayval['mode']);
        
        return $object;
    }
}
