<?php

namespace App\Entity;

use App\Repository\ServiceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ServiceRepository::class)
 */
class Service
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
    private $nom;

    /**
     * @ORM\ManyToMany(targetEntity=Patient::class, mappedBy="services")
     */
    private $patients;

    /**
     * @ORM\ManyToMany(targetEntity=CadreMedicale::class, mappedBy="services")
     */
    private $cadreMedicales;


    public function __construct()
    {
        $this->patients = new ArrayCollection();
        $this->cadreMedicales = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

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
            $patient->addService($this);
        }

        return $this;
    }

    public function removePatient(Patient $patient): self
    {
        if ($this->patients->removeElement($patient)) {
            $patient->removeService($this);
        }

        return $this;
    }

    public function __toString()
    {
        return $this->getNom();
    }

    /**
     * @return Collection|CadreMedicale[]
     */
    public function getCadreMedicales(): Collection
    {
        return $this->cadreMedicales;
    }

    public function addCadreMedicale(CadreMedicale $cadreMedicale): self
    {
        if (!$this->cadreMedicales->contains($cadreMedicale)) {
            $this->cadreMedicales[] = $cadreMedicale;
            $cadreMedicale->addService($this);
        }

        return $this;
    }

    public function removeCadreMedicale(CadreMedicale $cadreMedicale): self
    {
        if ($this->cadreMedicales->removeElement($cadreMedicale)) {
            $cadreMedicale->removeService($this);
        }

        return $this;
    }
}
