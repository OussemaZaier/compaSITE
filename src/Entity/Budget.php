<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\BudgetRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=BudgetRepository::class)
 */
class Budget
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
    private $nomBudget;

    /**
     * @ORM\Column(type="float")
     */
    private $montantBudget;

    /**
     * @ORM\Column(type="date")
     */
    private $apartirDate;

    /**
     * @ORM\Column(type="float")
     */
    private $depenceBudget;

    /**
     * @ORM\ManyToOne(targetEntity=Categorie::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $association;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomBudget(): ?string
    {
        return $this->nomBudget;
    }

    public function setNomBudget(string $nomBudget): self
    {
        $this->nomBudget = $nomBudget;

        return $this;
    }

    public function getMontantBudget(): ?float
    {
        return $this->montantBudget;
    }

    public function setMontantBudget(float $montantBudget): self
    {
        $this->montantBudget = $montantBudget;

        return $this;
    }

    public function getApartirDate(): ?\DateTimeInterface
    {
        return $this->apartirDate;
    }

    public function setApartirDate(\DateTimeInterface $apartirDate): self
    {
        $this->apartirDate = $apartirDate;

        return $this;
    }

    public function getDepenceBudget(): ?float
    {
        return $this->depenceBudget;
    }

    public function setDepenceBudget(float $depenceBudget): self
    {
        $this->depenceBudget = $depenceBudget;

        return $this;
    }

    public function getAssociation(): ?Categorie
    {
        return $this->association;
    }

    public function setAssociation(?Categorie $association): self
    {
        $this->association = $association;

        return $this;
    }
}
