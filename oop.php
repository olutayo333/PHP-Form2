<?php
    class MyClass{
        //classe are made up of properties(variables) and methods(functions
        //  Access modifiers- Private, Public and Protected
        public $name ="Stephen";
        
        public function getName(){
            echo $this->name;
        }
        
         //CONSTRUCTOR -- constructor executes first before any other methods
        public function __construct($user)
        {   
            echo 'i have connected, (Parametized) '. $user ; //recieving parameter
            echo '</br>';
        }

        //DESTRUCTURE
        public function __destruct()
        {   echo '</br>';
             echo 'i am done, now destruct';
        }
    }

    $newgetName= new MyClass("Olutayo");  //passing parameters  
    $newgetName -> getName();

   

?>