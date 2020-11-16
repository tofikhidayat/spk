<?php

class CompareMajors {

    // define null majors
    private $majors = [];
    // define null student
    private $students = [];
    // define rdered user and major;
    private $orderedStudent = [];
     /// define maximum user in major
    private $maximumPerMajor = 2;
    // ordered major
    private $orderedMajor = [];

    // accepted
    private $accepted1 = [];
    private $accepted2 = [];
    // denied
    private $denied1 = [];
    private $denied2 = [];

    // final order
    private $finalOrder = [];

    public function __construct($majors, $students) {
        $this->majors = $majors;
        $this->students = $students;
    }

    /**
     * get user is accepted or not
     */
    private function findByAccepted($usr, $type=1) {
        if($type == 1) {
            $hasFound = 0;
            forEach($this->accepted1 as $acc) {
                if($acc->id == $usr->id) {
                   $hasFound = 1;
                }
            }
            return !$hasFound;
        }
        if($type == 2) {
            $hasFound = 0;
            forEach($this->accepted2 as $acc) {
                if($acc->id == $usr->id) {
                   $hasFound = 1;
                }
            }
            return !$hasFound;
        }
    }

    /**
     * Reorder user by major and score
     */
    
    private function orderByMajor() {
        foreach($this->majors as $major) {
            $tmpUser = array();
            
            foreach($this->students as $student) {
                if($student->option_1 == $major->name || $student->option_2 == $major->name) {
                    $tmpUser[] = (object)$student;
                }
            }
            
            usort($tmpUser, function($a, $b) {
                return (floatval($a->score) < floatval($b->score));
             });

             $this->orderedStudent[$major->name] = $tmpUser;

        }
    }
    /**
     * Select user to major
     */

     private function filterByMajor() {
        foreach ($this->orderedStudent as $key =>  $user) {
            $this->orderedMajor[$key] = [];
            $limit  = 0;
            forEach($user as $usr) {
               if($usr->option_1 == $key && $limit < $this->maximumPerMajor) {
                   $limit += 1;
                   $this->accepted1[] = $usr;
                   $this->orderedMajor[$key][] = $usr;
               } elseif($usr->option_1 == $key && $limit >= $this->maximumPerMajor) {
                  $this->denied1[] = $usr;
               }
            }
         }
       
         foreach ($this->orderedStudent as $key =>  $user) {
           $limit  = sizeof([$key]) || 0;
           forEach($user as $usr) {
              if($this->findByAccepted($usr, 1)) {
               if($usr->option_2 == $key && $limit < $this->maximumPerMajor) {
                   $limit += 1;
                   $this->accepted2[] = $usr;
                   $this->orderedMajor[$key][] = $usr;
               } elseif($usr->option_2 == $key && $limit >= $this->maximumPerMajor) {
                  $this->denied2[] = $usr;
               }
              }
             
           }
        }
     }

     // reorder data
     private function reorderData() {
        //$finalOrder
        $orderData=[];
        foreach($this->majors as $major) {
            $majorData = [];
            foreach($this->accepted1 as $usr) {
                if($usr->option_1 == $major->name) {
                    $majorData[] = $usr;
                }
            }
            foreach($this->accepted2 as $usr) {
                if($usr->option_2 == $major->name) {
                    $majorData[] = $usr;
                }
            }
            $orderData[$major->name] = $majorData;
            // print_r($majorData);

        }
        // print_r($orderData);
        $this->finalOrder = $orderData;
     }

     // get denied user
     private function getDeniedUser() {
         $denyResult = [];
         foreach(array_merge($this->denied1, $this->denied2) as $deny) {
            
             foreach(array_merge($this->accepted1, $this->accepted2) as $usr) {
                if($deny->id != $usr->id) {
                    $denyResult[] = $usr;
                }
                
             }
             
         }
        return array_unique($denyResult, SORT_REGULAR);
     }



    public function exec() {
        $this->orderByMajor();
        $this->filterByMajor();
        $this->reorderData();
        // print_r($this->finalOrder);
        return [
            'accepted' => $this->finalOrder,
            'denied' => $this->getDeniedUser()
            
        ];
    }

}