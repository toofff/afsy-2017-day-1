<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CountryRepository")
 */
class Country
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(type="varchar")
     */
    private $name;

    /**
     * @var ArrayCollection|Beer[]
     *
     * @ORM\OneToMany(targetEntity="Beer", mappedBy="country", cascade={"persist", "remove"})
     */
    private $beers;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->beers = new ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param \varchar $name
     *
     * @return Country
     */
    public function setName(\varchar $name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return \varchar
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Add beer
     *
     * @param Beer $beer
     *
     * @return Country
     */
    public function addBeer(Beer $beer)
    {
        $this->beers[] = $beer;

        return $this;
    }

    /**
     * Remove beer
     *
     * @param Beer $beer
     */
    public function removeBeer(Beer $beer)
    {
        $this->beers->removeElement($beer);
    }

    /**
     * Get beers
     *
     * @return ArrayCollection
     */
    public function getBeers()
    {
        return $this->beers;
    }
}
