<?php
    namespace App\Services;

    class scanFolders{
        
        private $Directory;
        function readDirectory($Directory,$Recursive = true){   
            // echo "".$Directory;     

            try
            {
               
                $Resource = opendir($Directory);
               
                $Found = array();
                $i =0;
                $ver = preg_match("/v1/i",$Directory) ? "v1" : "v2";
                

                while(($Item = readdir($Resource))!= false)
                {
                    if($Item == "." || $Item == "..")
                    {
                        continue;
                    }                   

                    if($Recursive === true && is_dir($Directory."/".$Item))
                    {
                        $this->readDirectory($Directory."/".$Item, true);
                    }
                    else if(file_exists($Directory."/".$Item))
                    { 
                        if(array_key_exists($ver,$Found)){
                            $Found[]= $Item;
                            $Found[] = $Directory;
                            
                        }
                        else{
                            $Found[] = $Item;
                            $Found[] = $Directory;

                        }
                                           
                        
                        // if($Item != "login.png")
                        // {
                        // $fh = fopen ($Directory."/".$Item,"r+");
                        
                        // $read = file_get_contents($Directory."/".$Item);
                        // $Found[$i]["contents"] = $read;
                        // }   
                    }
                
                }
            }
            
            catch(Exception $e)
            {
                return false;
            }
            
            return $Found;
        

        
    }
    public function getFolders($directory){
        $files = glob($directory.'/*'); 
        return $files;

    }

}




?>