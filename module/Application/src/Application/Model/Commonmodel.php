<?php
namespace Application\Model;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use Zend\InputFilter\Factory;
/**
 * Description of Usermodel
 *
 * @author hkumwembe
 */

abstract class Commonmodel{
    
    protected $em;
    
    public function __construct(\Doctrine\ORM\EntityManager $em) {
        $this->em = $em;
    } 
    
    /*
     * Format ajax form errors
     */
    public function formatErrorMessage($errorObject){
        /*
        * Form has errors. Put errors into an array
        */
        $messages = "";
        
        foreach($errorObject as $messageObject){
            foreach($messageObject as $messages){
                
                if(count($messages)>1){
                    foreach($messages as $ms){
                        return $ms;
                    }
                }else{
                    return $messages;
                }
            }
        }
    }
    
    /*
     * Get current period
     */
    public function getCurrentPeriod($class=null){
        $date = new \DateTime();
        $periodquery = $this->em->createQuery("SELECT p "
                                              . " FROM \Application\Entity\Academicyear p WHERE p.groupPeriod = (SELECT PC.group FROM \Application\Entity\Programgroup PG Join PG.fkProgramid P Join P.fkProgramcategoryid PC WHERE PG.pkGroupid = :classid )"
                                              . " AND :currentdate BETWEEN p.startDate AND p.endDate "
                                              . " ORDER BY p.pkPeriodid")
                                ->setParameter('classid', $class)
                                ->setParameter('currentdate', $date);

        foreach($periodquery->getResult() as $period ){

        }
        return $period;
        
    }
    /*
     * Get date difference in days
     */
    function dateDiff($start, $end) {

        $start_ts = strtotime($start);

        $end_ts = strtotime($end);

        $diff = $end_ts - $start_ts;

        return round($diff / 86400);
    }
    
    /*
     * Is academic year setting fine
     */
    public function IsWithin($context){
        
        if(empty($context['parentid'])){
        
            $period = $this->em->createQuery(" SELECT AP FROM \Application\Entity\Academicyear AP "
                                            . "WHERE ( :startdate BETWEEN AP.startDate AND AP.endDate "
                                            . " OR  :enddate BETWEEN AP.startDate AND AP.endDate) "
                                            . " AND AP.pkAcademicperiodid != :yearid "
                                            . " AND :category = 'GENERIC' ")
                               ->setParameter("startdate", $context['startDate'])
                               ->setParameter("enddate",$context['endDate'])
                               ->setParameter("yearid", $context['pkAcademicperiodid'])
                               ->setParameter("category", $context['category']);
        }else{
            
            //Get parent academic year information
            $academicyear = $this->em->getRepository("\Application\Entity\Academicyear")->find($context['parentid']);
            
            $period = $this->em->createQuery(" SELECT AP FROM \Application\Entity\Academicyear AP "
                                            . "WHERE ( :startdate BETWEEN AP.startDate AND AP.endDate "
                                            . " OR  :enddate BETWEEN AP.startDate AND AP.endDate) "
                                            . " AND (AP.pkAcademicperiodid != :yearid AND AP.parentid = :parentid)"
                                            )
                               ->setParameter("startdate", $context['startDate'])
                               ->setParameter("enddate",$context['endDate'])
                               ->setParameter("yearid", $context['pkAcademicperiodid'])
                               ->setParameter("parentid", $context['parentid'])
                               
                                ;
        }

        return $period->getResult();
        
    }




    /*
     * Get class list
     */
    public function getClasslist($criteria){
        
        $students = $this->getEntity("\Application\Entity\Studentclass",$criteria);
        
        foreach($students as $student){

            //Get student number
            $programobject = $this->em->createQuery("SELECT ST FROM \Application\Entity\Studentprogram ST"
                                                    . " WHERE ST.fkStudentid = :student "
                                                    . " AND ST.fkProgramid = (SELECT IDENTITY(P.fkProgramid) FROM \Application\Entity\Programgroup P WHERE P.pkGroupid = :group)")
                                      ->setParameter('student', $student->getFkStudentid()->getPkstudentid())
                                      ->setParameter('group', $student->getFkGroupid()->getPkGroupid());
            $program = $programobject->getOneOrNullResult();
            $classlist[] = array("PROGRAM"=>$program,"CLASS"=>$student);
        }
        
        return $classlist;
    }
    
    /*
     * Search for objects from entity
     */
    public function getEntity($entity,$criteria){
        return $this->em->getRepository($entity)->matching($criteria);
    }
    
     /*
     * Remove module object from database
     */
    public function deletefromdb($entity,$criteria=array()){
        
        $this->em->getConnection()->beginTransaction();
        try{
            /*
             * 
             */
            $object = $this->em->getRepository($entity)->find($criteria);
            $this->em->remove($object);
            $this->em->flush();
            $this->em->getConnection()->commit();
        }catch(Doctrine\DBAL\DBALException $e){
            $this->em->getConnection()->rollBack();
            $this->logger->addWriter($this->writer);
            $this->logger->info("Test");
        }
    }
}
