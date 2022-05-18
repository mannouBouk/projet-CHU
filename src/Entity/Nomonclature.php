<?php

namespace App\Entity;

use App\Repository\NomonclatureRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=NomonclatureRepository::class)
 */
class Nomonclature
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="float")
     */
    private $prix;

    /**
     * @ORM\ManyToOne(targetEntity=Repa::class, inversedBy="nomonclatures")
     */
    private $repa;

    /**
     * @ORM\ManyToOne(targetEntity=RegimeAL::class, inversedBy="nomonclatures")
     */
    private $regime;





    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getRepa(): ?Repa
    {
        return $this->repa;
    }

    public function setRepa(?Repa $repa): self
    {
        $this->repa = $repa;

        return $this;
    }

    public function getRegime(): ?RegimeAL
    {
        return $this->regime;
    }

    public function setRegime(?RegimeAL $regime): self
    {
        $this->regime = $regime;

        return $this;
    }
}
