<?php

namespace App\Entity;

use App\Repository\TestRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TestRepository::class)
 */
class Test
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
    private $TEST;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTEST(): ?string
    {
        return $this->TEST;
    }

    public function setTEST(string $TEST): self
    {
        $this->TEST = $TEST;

        return $this;
    }
}
