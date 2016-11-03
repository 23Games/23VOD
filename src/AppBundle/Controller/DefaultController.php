<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction()
    {
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir') . '/..') . DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * @Route("/player/{id}", name="player")
     */
    public function playerAction(Request $request, $id)
    {
        $country = unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip='.$request->getClientIp()));

        if ($country['geoplugin_countryCode'] != 'DE' && $country['geoplugin_status'] != 404){
            return $this->redirectToRoute('homepage');
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
