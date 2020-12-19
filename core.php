<?php

class CompareMajors {

    // define null majors
    private $majors = [];
    // define null student
    private $students = [];
    // define rdered user and major;
    private $orderedStudent = [];

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
        $majors =  (array)$majors;
        usort($majors, function($a, $b) {
            return $a->index > $b->index;
        });
        $this->majors = (object)$majors;
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
      * get limit of majors
      */

      private function getMajorLimit($name) {
        $data = 0;
        foreach($this->majors as $mjr) {
            if($mjr->name == $name) {
                $data = $mjr->quota;
            }
        }
        return $data;
      }

    // find user by major

    private function fillterUserByMajor($name) {
        foreach($this->orderedStudent as $key => $students) {
            if($key == $name) {
                return $students;
            }
        }
    }

    // count user on major data with same major name

    private function countUserOnSelected($majorName) {
        try {
            return sizeof($this->orderedMajor[$majorName]);
        } catch(Exception $e) {
            return 0;
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
               if($usr->option_1 == $key && $limit < $this->getMajorLimit($key)) {
                   $limit += 1;
                   $this->accepted1[] = $usr;
                   $this->orderedMajor[$key][] = $usr;
               } elseif($usr->option_1 == $key && $limit >= $this->getMajorLimit($key)) {
                  $this->denied1[] = $usr;
               }
            }
         }
       
        //  print_r($this->orderedStudent);
         foreach ($this->orderedStudent as $key =>  $user) {
           $limit  = $this->countUserOnSelected($key);
           forEach($user as $usr) {
            //   print_r($this->findByAccepted($usr, 1));
            //   print_r($usr);
              if($this->findByAccepted($usr, 1)) {
                
               if($usr->option_2 == $key && $limit < $this->getMajorLimit($key)) {
                   $limit += 1;
                   $this->accepted2[] = $usr;
                   $this->orderedMajor[$key][] = $usr;
               } elseif($usr->option_2 == $key && $limit >= $this->getMajorLimit($key)) {
                  $this->denied2[] = $usr;
               }
              }
             
           }
        }

        // print_r($this->accepted2);
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

     private function checkAcceptedUser($id) {
        $acceptedUsers = array_merge($this->accepted1, $this->accepted2);
        foreach($acceptedUsers as $user) {
            if($user->id == $id) {
                return true;
            }
        }
     }

     // get denied user
     private function getDeniedUser() {
        $deniedUsers  =  array_merge($this->denied1, $this->denied2);
        // print_r($deniedUsers);
        $finalDenied = [];
        foreach($deniedUsers as $usr) {
            // print_r($this->checkAcceptedUser($usr->id) ? '1 - ' : '0 - ');
            // print_r($usr->id . ' ++ ');
            if(!$this->checkAcceptedUser($usr->id)) {
                $finalDenied[] = $usr;
            }  
        }
        return array_unique($finalDenied, SORT_REGULAR);
     }



    public function exec() {
        $this->orderByMajor();
        $this->filterByMajor();
        $this->reorderData();
        return (object)[
            'accepted' => $this->finalOrder,
            'denied' => $this->getDeniedUser()
        ];
    }

}