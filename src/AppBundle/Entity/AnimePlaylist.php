<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AnimePlaylist
 *
 * @ORM\Table(name="anime_playlist")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\AnimePlaylistRepository")
 */
class AnimePlaylist
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\animeList")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="anime", type="integer")
     */
    private $anime;

    /**
     * @var int
     *
     * @ORM\Column(name="season", type="integer")
     */
    private $season;

    /**
     * @var int
     *
     * @ORM\Column(name="episode", type="integer")
     */
    private $episode;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="string", length=1024)
     */
    private $content;

    /**
     * @var string
     *
     * @ORM\Column(name="iframe", type="boolean")
     */
    private $iframe = false;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $anime
     */
    public function setAnime(int $anime)
    {
        $this->anime = $anime;
    }

    /**
     * @return int
     */
    public function getAnime(): int
    {
        return $this->anime;
    }

    /**
     * Set season
     *
     * @param integer $season
     *
     * @return AnimePlaylist
     */
    public function setSeason($season)
    {
        $this->season = $season;

        return $this;
    }

    /**
     * Get season
     *
     * @return int
     */
    public function getSeason()
    {
        return $this->season;
    }

    /**
     * Set episode
     *
     * @param string $episode
     *
     * @return AnimePlaylist
     */
    public function setEpisode($episode)
    {
        $this->episode = $episode;

        return $this;
    }

    /**
     * Get episode
     *
     * @return string
     */
    public function getEpisode()
    {
        return $this->episode;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return AnimePlaylist
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set content
     *
     * @param string $content
     *
     * @return AnimePlaylist
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @return string
     */
    public function getIframe(): string
    {
        return $this->iframe;
    }

    /**
     * @param string $iframe
     */
    public function setIframe(string $iframe)
    {
        $this->iframe = $iframe;
    }
}

