<?php

namespace App\Entity;

use App\Repository\RepasRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RepasRepository::class)
 */
class Repas
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $petitdej;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $dejeuner;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $diner;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPetitdej(): ?string
    {
        return $this->petitdej;
    }

    public function setPetitdej(string $petitdej): self
    {
        $this->petitdej = $petitdej;

        return $this;
    }

    public function getDejeuner(): ?string
    {
        return $this->dejeuner;
    }

    public function setDejeuner(string $dejeuner): self
    {
        $this->dejeuner = $dejeuner;

        return $this;
    }

    public function getDiner(): ?string
    {
        return $this->diner;
    }

    public function setDiner(string $diner): self
    {
        $this->diner = $diner;

        return $this;
    }
}
