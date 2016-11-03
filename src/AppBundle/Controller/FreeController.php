<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class FreeController extends Controller
{
    /**
     * @Route("/free/showAll")
     */
    public function showAllAction()
    {
        return $this->render(':Free:show_all.html.twig', array(
            // ...
        ));
    }

}
