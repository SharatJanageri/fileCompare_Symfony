<?php
    namespace App\Controller;
    
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\Routing\Annotation\Route;
    //restrict certain method 
    use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
    //using twig template 
    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use App\Services\scanFolders;

    Class fileController extends AbstractController{
         /**
             * @Route("/")
             * @Method({"GET"})
         */

        public function index(scanFolders $scanFolder){
        $dir = $_SERVER['DOCUMENT_ROOT']."/task-website/versions";
       
       
        // Sort in ascending order - this is default
        $a = scandir($dir);
        $fileArray = [];
        
       
        foreach($a as $folders){
            if($folders == "." || $folders == "..")
            {
                continue;
            }
            $fileArray[] = $scanFolder->readDirectory($dir."/".$folders,true);


        }

        var_dump($fileArray);
        die();
    
        

        $version1= array();
        $version2= array();
    
        for($i=0; $i<count($fileArray); $i++){
            $version1[] = $fileArray[0];
            $version2[] = $fileArray[1];
        }
        

        $result= array_diff(array_map('json_encode',$version2),array_map('json_encode',$version1));
        $diff = array_map('json_decode',$result);

        var_dump($diff);die;

        // foreach($fileArray as $key=>$value){
            // if(array_key_exists("v1",$fileArray)){
            //     $new[] = $value;

            // }else if(array_key_exists("v2",$fileArray){
            //     $new["v1"] = $value;
            // }
        // }

            // $result = array();
            // $values = array();

            // foreach($fileArray as $index => $key) {
            //     $t = array();
            //     foreach($values as $value) {
            //         $t[] = $value[$index];
            //     }
            //     $result[$key]  = $t;
            // }
        // count($fileArray);die;
            
            // echo "".$file;
            // $ext = pathinfo($file, PATHINFO_EXTENSION);
            // var_dump($ext);
            // print_r(array_chunk($fileArray, 2));die;
       
         
                   
           
        

            
            return $this->render('dashboard/index.html.twig');
        }

    
    }

?>