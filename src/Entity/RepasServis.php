<?php

namespace App\Entity;

use App\Repository\RepasServisRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RepasServisRepository::class)
 */
class RepasServis
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $DateHeure;

    /**
     * @ORM\Column(type="boolean")
     */
    private $servis;

    /**
     * @ORM\ManyToOne(targetEntity=Patient::class, inversedBy="RepaServi")
     */
    private $patient;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateHeure(): ?\DateTimeInterface
    {
        return $this->DateHeure;
    }

    public function setDateHeure(\DateTimeInterface $DateHeure): self
    {
        $this->DateHeure = $DateHeure;

        return $this;
    }

    public function getServis(): ?bool
    {
        return $this->servis;
    }

    public function setServis(bool $servis): self
    {
        $this->servis = $servis;

        return $this;
    }

    public function getPatient(): ?Patient
    {
        return $this->patient;
    }

    public function setPatient(?Patient $patient): self
    {
        $this->patient = $patient;

        return $this;
    }
}
