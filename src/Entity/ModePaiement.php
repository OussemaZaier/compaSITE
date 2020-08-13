<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ModePaiementRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=ModePaiementRepository::class)
 */
class ModePaiement
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nomMDP;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomMDP(): ?string
    {
        return $this->nomMDP;
    }

    public function setNomMDP(string $nomMDP): self
    {
        $this->nomMDP = $nomMDP;

        return $this;
    }
}
