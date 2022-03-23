<?php

namespace App\Entity;

use App\Repository\ProfilroleRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProfilroleRepository::class)
 */
class Profilrole
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
    private $ajouterutilisateur;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $activutilisateur;

    /**
     * @ORM\Column(type="boolean")
     */
    private $desactutilisateur;

    /**
     * @ORM\Column(type="boolean")
     */
    private $modifierutilisateur;

    /**
     * @ORM\Column(type="boolean")
     */
    private $ajouterservice;

    /**
     * @ORM\Column(type="boolean")
     */
    private $supprimerservice;

    /**
     * @ORM\Column(type="boolean")
     */
    private $modifierservice;

    /**
     * @ORM\Column(type="boolean")
     */
    private $ajouteregimesalimentaires;

    /**
     * @ORM\Column(type="boolean")
     */
    private $supprimerregimesalimentaires;

    /**
     * @ORM\Column(type="boolean")
     */
    private $ajouterpi;

    /**
     * @ORM\Column(type="boolean")
     */
    private $ajouterlespatients;

    /**
     * @ORM\Column(type="boolean")
     */
    private $activationoudesactivationdespatients;

    /**
     * @ORM\Column(type="boolean")
     */
    private $ajouterregimesalimentairesp;

    /**
     * @ORM\Column(type="boolean")
     */
    private $ajouterprofilerole;

    /**
     * @ORM\Column(type="boolean")
     */
    private $modifierprofilerole;

    /**
     * @ORM\Column(type="boolean")
     */
    private $supprimerprofilerole;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAjouterutilisateur(): ?string
    {
        return $this->ajouterutilisateur;
    }

    public function setAjouterutilisateur(string $ajouterutilisateur): self
    {
        $this->ajouterutilisateur = $ajouterutilisateur;

        return $this;
    }

    public function getActivutilisateur(): ?string
    {
        return $this->activutilisateur;
    }

    public function setActivutilisateur(string $activutilisateur): self
    {
        $this->activutilisateur = $activutilisateur;

        return $this;
    }

    public function getDesactutilisateur(): ?bool
    {
        return $this->desactutilisateur;
    }

    public function setDesactutilisateur(bool $desactutilisateur): self
    {
        $this->desactutilisateur = $desactutilisateur;

        return $this;
    }

    public function getModifierutilisateur(): ?bool
    {
        return $this->modifierutilisateur;
    }

    public function setModifierutilisateur(bool $modifierutilisateur): self
    {
        $this->modifierutilisateur = $modifierutilisateur;

        return $this;
    }

    public function getAjouterservice(): ?bool
    {
        return $this->ajouterservice;
    }

    public function setAjouterservice(bool $ajouterservice): self
    {
        $this->ajouterservice = $ajouterservice;

        return $this;
    }

    public function getSupprimerservice(): ?bool
    {
        return $this->supprimerservice;
    }

    public function setSupprimerservice(bool $supprimerservice): self
    {
        $this->supprimerservice = $supprimerservice;

        return $this;
    }

    public function getModifierservice(): ?bool
    {
        return $this->modifierservice;
    }

    public function setModifierservice(bool $modifierservice): self
    {
        $this->modifierservice = $modifierservice;

        return $this;
    }

    public function getAjouteregimesalimentaires(): ?bool
    {
        return $this->ajouteregimesalimentaires;
    }

    public function setAjouteregimesalimentaires(bool $ajouteregimesalimentaires): self
    {
        $this->ajouteregimesalimentaires = $ajouteregimesalimentaires;

        return $this;
    }

    public function getSupprimerregimesalimentaires(): ?bool
    {
        return $this->supprimerregimesalimentaires;
    }

    public function setSupprimerregimesalimentaires(bool $supprimerregimesalimentaires): self
    {
        $this->supprimerregimesalimentaires = $supprimerregimesalimentaires;

        return $this;
    }

    public function getAjouterpi(): ?bool
    {
        return $this->ajouterpi;
    }

    public function setAjouterpi(bool $ajouterpi): self
    {
        $this->ajouterpi = $ajouterpi;

        return $this;
    }

    public function getAjouterlespatients(): ?bool
    {
        return $this->ajouterlespatients;
    }

    public function setAjouterlespatients(bool $ajouterlespatients): self
    {
        $this->ajouterlespatients = $ajouterlespatients;

        return $this;
    }

    public function getActivationoudesactivationdespatients(): ?bool
    {
        return $this->activationoudesactivationdespatients;
    }

    public function setActivationoudesactivationdespatients(bool $activationoudesactivationdespatients): self
    {
        $this->activationoudesactivationdespatients = $activationoudesactivationdespatients;

        return $this;
    }

    public function getAjouterregimesalimentairesp(): ?bool
    {
        return $this->ajouterregimesalimentairesp;
    }

    public function setAjouterregimesalimentairesp(bool $ajouterregimesalimentairesp): self
    {
        $this->ajouterregimesalimentairesp = $ajouterregimesalimentairesp;

        return $this;
    }

    public function getAjouterprofilerole(): ?bool
    {
        return $this->ajouterprofilerole;
    }

    public function setAjouterprofilerole(bool $ajouterprofilerole): self
    {
        $this->ajouterprofilerole = $ajouterprofilerole;

        return $this;
    }

    public function getModifierprofilerole(): ?bool
    {
        return $this->modifierprofilerole;
    }

    public function setModifierprofilerole(bool $modifierprofilerole): self
    {
        $this->modifierprofilerole = $modifierprofilerole;

        return $this;
    }

    public function getSupprimerprofilerole(): ?bool
    {
        return $this->supprimerprofilerole;
    }

    public function setSupprimerprofilerole(bool $supprimerprofilerole): self
    {
        $this->supprimerprofilerole = $supprimerprofilerole;

        return $this;
    }
}
