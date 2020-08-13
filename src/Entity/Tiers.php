<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\TiersRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=TiersRepository::class)
 */
class Tiers
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
    private $nomTiers;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $adresseTiers;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $codepostalTiers;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $villeTiers;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $paysTiers;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $commentaireTiers;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomTiers(): ?string
    {
        return $this->nomTiers;
    }

    public function setNomTiers(string $nomTiers): self
    {
        $this->nomTiers = $nomTiers;

        return $this;
    }

    public function getAdresseTiers(): ?string
    {
        return $this->adresseTiers;
    }

    public function setAdresseTiers(?string $adresseTiers): self
    {
        $this->adresseTiers = $adresseTiers;

        return $this;
    }

    public function getCodepostalTiers(): ?int
    {
        return $this->codepostalTiers;
    }

    public function setCodepostalTiers(?int $codepostalTiers): self
    {
        $this->codepostalTiers = $codepostalTiers;

        return $this;
    }

    public function getVilleTiers(): ?string
    {
        return $this->villeTiers;
    }

    public function setVilleTiers(?string $villeTiers): self
    {
        $this->villeTiers = $villeTiers;

        return $this;
    }

    public function getPaysTiers(): ?string
    {
        return $this->paysTiers;
    }

    public function setPaysTiers(?string $paysTiers): self
    {
        $this->paysTiers = $paysTiers;

        return $this;
    }

    public function getCommentaireTiers(): ?string
    {
        return $this->commentaireTiers;
    }

    public function setCommentaireTiers(?string $commentaireTiers): self
    {
        $this->commentaireTiers = $commentaireTiers;

        return $this;
    }
}
