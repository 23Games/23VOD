<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class VideoListController extends Controller
{
    /**
     * @Route("/list/{page}", name="list")
     */
    public function showAllAction(Request $request, $page = 1)
    {
        $em    = $this->get('doctrine.orm.entity_manager');
        $dql   = "SELECT a FROM AppBundle:animeList a";
        $query = $em->createQuery($dql);

        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $query,
            $request->query->getInt('page', $page),
            10
        );

        return $this->render(':default:show_all.html.twig', [
            'pagination' => $pagination
        ]);

//        return $this->render(':default:show_all.html.twig', [
//            'anime' => $showAll
//        ]);
    }
}
