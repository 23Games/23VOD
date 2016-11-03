<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class FreeController extends Controller
{
    /**
     * @Route("/free/showAll", name="free.all")
     */
    public function showAllAction()
    {

        $showAll = $this->getDoctrine()->getRepository('AppBundle:animeList')->createQueryBuilder('p')
            ->where('p.free = true')
            ->orderBy('p.title', 'ASC')
            ->getQuery()
            ->getResult();

        return $this->render(':Free:show_all.html.twig', [
            'anime' => $showAll
        ]);
    }

}
