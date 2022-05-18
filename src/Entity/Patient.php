<?php

namespace App\Entity;

use App\Repository\PatientRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=PatientRepository::class)
 */
class Patient
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Regex(
     *     pattern="/\d/",
     *     match=false,
     *     message="Your name cannot contain a number"
     * )
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Regex(
     *     pattern="/\d/",
     *     match=false,
     *     message="Your name cannot contain a number"
     * )
     */
    private $prenom;





    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $dateEntree;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $dateSortie;

    /**
     * @ORM\ManyToMany(targetEntity=Service::class, inversedBy="patients")
     */
    private $services;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $service;

    /**
     * @ORM\ManyToMany(targetEntity=RegimeAL::class, inversedBy="patients")
     */
    private $regimes;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $regime;

    /**
     * @ORM\OneToMany(targetEntity=RepasServis::class, mappedBy="patient")
     */
    private $repasServis;

    /**
     * @ORM\OneToMany(targetEntity=RepasServis::class, mappedBy="patient")
     */
    private $RepaServi;







    public function __construct()
    {
        $this->services = new ArrayCollection();
        $this->regimes = new ArrayCollection();
        $this->repasServis = new ArrayCollection();
        $this->RepaServi = new ArrayCollection();
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

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }







    public function getDateEntree(): ?\DateTimeInterface
    {
        return $this->dateEntree;
    }

    public function setDateEntree(?\DateTimeInterface $dateEntree): self
    {

        $this->dateEntree = $dateEntree;

        return $this;
    }

    public function getDateSortie(): ?\DateTimeInterface
    {
        return $this->dateSortie;
    }

    public function setDateSortie(?\DateTimeInterface $dateSortie): self
    {
        $this->dateSortie = $dateSortie;

        return $this;
    }

    /**
     * @return Collection|Service[]
     */
    public function getServices(): Collection
    {
        return $this->services;
    }

    public function addService(Service $service): self
    {
        if (!$this->services->contains($service)) {
            $this->services[] = $service;
        }

        return $this;
    }

    public function removeService(Service $service): self
    {
        $this->services->removeElement($service);

        return $this;
    }


    public function getService(): ?string
    {
        return $this->service;
    }

    public function setService(?string $service): self
    {
        $this->service = $service;

        return $this;
    }

    /**
     * @return Collection|RegimeAL[]
     */
    public function getRegimes(): Collection
    {
        return $this->regimes;
    }

    public function addRegime(RegimeAL $regime): self
    {
        if (!$this->regimes->contains($regime)) {
            $this->regimes[] = $regime;
        }

        return $this;
    }

    public function removeRegime(RegimeAL $regime): self
    {
        $this->regimes->removeElement($regime);

        return $this;
    }

    public function getRegime(): ?string
    {
        return $this->regime;
    }

    public function setRegime(?string $regime): self
    {
        $this->regime = $regime;

        return $this;
    }

    /**
     * @return Collection<int, RepasServis>
     */
    public function getRepasServis(): Collection
    {
        return $this->repasServis;
    }

    public function addRepasServi(RepasServis $repasServi): self
    {
        if (!$this->repasServis->contains($repasServi)) {
            $this->repasServis[] = $repasServi;
            $repasServi->setPatient($this);
        }

        return $this;
    }

    public function removeRepasServi(RepasServis $repasServi): self
    {
        if ($this->repasServis->removeElement($repasServi)) {
            // set the owning side to null (unless already changed)
            if ($repasServi->getPatient() === $this) {
                $repasServi->setPatient(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, RepasServis>
     */
    public function getRepaServi(): Collection
    {
        return $this->RepaServi;
    }

    public function addRepaServi(RepasServis $repaServi): self
    {
        if (!$this->RepaServi->contains($repaServi)) {
            $this->RepaServi[] = $repaServi;
            $repaServi->setPatient($this);
        }

        return $this;
    }

    public function removeRepaServi(RepasServis $repaServi): self
    {
        if ($this->RepaServi->removeElement($repaServi)) {
            // set the owning side to null (unless already changed)
            if ($repaServi->getPatient() === $this) {
                $repaServi->setPatient(null);
            }
        }

        return $this;
    }
    public function __toString()
    {
        return   $this->getNom();
    }
}
