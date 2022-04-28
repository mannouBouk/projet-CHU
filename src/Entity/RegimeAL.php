<?php

namespace App\Entity;

use App\Repository\RegimeALRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RegimeALRepository::class)
 */
class RegimeAL
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
    private $type;


    /**
     * @ORM\ManyToMany(targetEntity=Repa::class, mappedBy="repas")
     */
    private $repas;

    /**
     * @ORM\ManyToMany(targetEntity=Patient::class, mappedBy="regimes")
     */
    private $patients;

    public function __construct()
    {
        $this->repas = new ArrayCollection();
        $this->patients = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return Collection|Repa[]
     */
    public function getRepas(): Collection
    {
        return $this->repas;
    }

    public function addRepa(Repa $repa): self
    {
        if (!$this->repas->contains($repa)) {
            $this->repas[] = $repa;
            $repa->addRepa($this);
        }

        return $this;
    }

    public function removeRepa(Repa $repa): self
    {
        if ($this->repas->removeElement($repa)) {
            $repa->removeRepa($this);
        }

        return $this;
    }

    /**
     * @return Collection|Patient[]
     */
    public function getPatients(): Collection
    {
        return $this->patients;
    }

    public function addPatient(Patient $patient): self
    {
        if (!$this->patients->contains($patient)) {
            $this->patients[] = $patient;
            $patient->addRegime($this);
        }

        return $this;
    }

    public function removePatient(Patient $patient): self
    {
        if ($this->patients->removeElement($patient)) {
            $patient->removeRegime($this);
        }

        return $this;
    }
    public function __toString()
    {
        return   $this->getType();
    }
}
