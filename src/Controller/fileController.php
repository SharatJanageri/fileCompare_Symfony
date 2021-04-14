<?php
    namespace App\Controller;
    
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\Routing\Annotation\Route;
    //restrict certain method 
    use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
    //using twig template 
    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

    Class fileController extends AbstractController{
         /**
             * @Route("/")
             * @Method({"GET"})
         */

        public function index(){
            
            // return new Response("<h1>HI</h1>");
            return $this->render('dashboard/index.html.twig');
        }
    }
?>