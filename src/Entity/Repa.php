<?php

namespace App\Entity;

use App\Repository\RepaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RepaRepository::class)
 */
class Repa
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
     * @ORM\OneToMany(targetEntity=Nomonclature::class, mappedBy="repa")
     */
    private $nomonclatures;





    public function __construct()
    {
        $this->repas = new ArrayCollection();
        $this->nomonclatures = new ArrayCollection();
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
     * @return Collection|RegimeAL[]
     */
    public function getRepas(): Collection
    {
        return $this->repas;
    }

    public function addRepa(RegimeAL $repa): self
    {
        if (!$this->repas->contains($repa)) {
            $this->repas[] = $repa;
        }

        return $this;
    }

    public function removeRepa(RegimeAL $repa): self
    {
        $this->repas->removeElement($repa);

        return $this;
    }

    /**
     * @return Collection<int, Nomonclature>
     */
    public function getNomonclatures(): Collection
    {
        return $this->nomonclatures;
    }

    public function addNomonclature(Nomonclature $nomonclature): self
    {
        if (!$this->nomonclatures->contains($nomonclature)) {
            $this->nomonclatures[] = $nomonclature;
            $nomonclature->setRepa($this);
        }

        return $this;
    }

    public function removeNomonclature(Nomonclature $nomonclature): self
    {
        if ($this->nomonclatures->removeElement($nomonclature)) {
            // set the owning side to null (unless already changed)
            if ($nomonclature->getRepa() === $this) {
                $nomonclature->setRepa(null);
            }
        }

        return $this;
    }
    public function __toString()
    {
        return  $this->getType();
    }
}
