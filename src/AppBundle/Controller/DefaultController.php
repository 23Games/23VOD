<?php

namespace AppBundle\Controller;

use AppBundle\AppBundle;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request, $page = 1)
    {
        if (!$this->getUser()){
            return $this->render('default/index.html.twig', [
                'base_dir' => realpath($this->getParameter('kernel.root_dir') . '/..') . DIRECTORY_SEPARATOR,
            ]);
        }

        $datetime = new \DateTime('now');

        if ($this->getUser()->getPremium() > $datetime){
            $video = $this->getDoctrine()->getRepository('AppBundle:animeList')->findAll();
        } else {
            $video = $this->getDoctrine()->getRepository('AppBundle:animeList')->findBy(['free' => 1]);
        }

        return $this->render('default/index_logged.html.twig', [
            'video' => $video
        ]);
    }

    /**
     * @Route("/player/{id}", name="player")
     * @param Request $request
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response|\Symfony\Component\HttpKernel\Exception\NotFoundHttpException
     */
    public function playerAction(Request $request, $id)
    {
//        if ($this->getUser() == null){
//            return  $this->render('default/index.html.twig');
//        }

        if (\AppBundle\AppBundle::regionalLock($request)){
            return $this->render('default/regional_lock.html.twig');
        }

        $anime['info'] = $this->getDoctrine()->getRepository('AppBundle:animeList')->findOneBy(['id' => $id]);

        if ($anime['info'] == null) {
            return $this->createNotFoundException('Nie znaleziono filmu!');
        }

        if ($anime['info']->getPlayList() == true) {
            $anime['playlist'] = $this->getDoctrine()
                ->getRepository('AppBundle:AnimePlaylist')->findBy(['anime' => $anime['info']->getId()]);
        }

        return $this->render('default/player.html.twig', [
            'anime' => $anime
        ]);
    }
}
