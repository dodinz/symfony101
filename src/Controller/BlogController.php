<?php
namespace App\Controller;

use App\Service\Greeting;
use http\Env\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class BlogController
{
    private $greeting;
    /**
     * @var \Twig_Environment
     */
    private $template;

    public function __construct( Greeting $greeting, \Twig_Environment $template ){
        
        $this->greeting = $greeting;
        $this->template = $template;
    }
    /**
     * @Route("/{name}", name="blog_index")
     */
    public function index( $name ) {
        $html = $this->template->render( 'base.html.twig' ,
                ['message' => $this->greeting->greet( $name )
        ]);

        return new Response( $html );
    }
    
}
