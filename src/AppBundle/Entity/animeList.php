<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * animeList
 *
 * @ORM\Table(name="animeList")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\animeListRepository")
 */
class animeList
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @var bool
     *
     * @ORM\Column(name="movie", type="boolean")
     */
    private $movie;

    /**
     * @var int
     *
     * @ORM\Column(name="play_list", type="integer", nullable=true)
     */
    private $playList;

    /**
     * @var int
     *
     * @ORM\Column(name="author", type="integer")
     */
    private $author;

    /**
     * @var bool
     *
     * @ORM\Column(name="free", type="boolean")
     */
    private $free;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="string", length=1024, nullable=true)
     */
    private $content;


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
     * Set title
     *
     * @param string $title
     *
     * @return animeList
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
     * Set description
     *
     * @param string $description
     *
     * @return animeList
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set movie
     *
     * @param boolean $movie
     *
     * @return animeList
     */
    public function setMovie($movie)
    {
        $this->movie = $movie;

        return $this;
    }

    /**
     * Get movie
     *
     * @return bool
     */
    public function getMovie()
    {
        return $this->movie;
    }

    /**
     * Set author
     *
     * @param integer $author
     *
     * @return freeAnime
     */
    public function setAuthor($author)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Get author
     *
     * @return int
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Set free
     *
     * @param boolean $free
     *
     * @return freeAnime
     */
    public function setFree($free)
    {
        $this->free = $free;

        return $this;
    }

    /**
     * Get free
     *
     * @return bool
     */
    public function getFree()
    {
        return $this->free;
    }

    /**
     * Set content
     *
     * @param string $content
     *
     * @return freeAnime
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
}

