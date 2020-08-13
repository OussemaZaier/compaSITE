<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\OperationRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=OperationRepository::class)
 */
class Operation
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="float")
     */
    private $montantOperation;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $referenceOperation;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $descriptionOperation;

    /**
     * @ORM\Column(type="boolean")
     */
    private $pointeOperation=false;

    /**
     * @ORM\Column(type="date")
     */
    private $dateOperation;

    /**
     * @ORM\Column(type="string", length=2)
     */
    private $modeleOperation;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $idCompteTransfer;

    /**
     * @ORM\ManyToOne(targetEntity=Compte::class, inversedBy="operations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $assosiation;

    /**
     * @ORM\ManyToOne(targetEntity=Echeances::class)
     */
    private $associatione;

    /**
     * @ORM\ManyToOne(targetEntity=Categorie::class)
     */
    private $associationc;

    /**
     * @ORM\ManyToOne(targetEntity=Tiers::class)
     */
    private $associationt;

    /**
     * @ORM\ManyToOne(targetEntity=ModePaiement::class)
     */
    private $associationmp;

    

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMontantOperation(): ?float
    {
        return $this->montantOperation;
    }

    public function setMontantOperation(float $montantOperation): self
    {
        $this->montantOperation = $montantOperation;

        return $this;
    }

    public function getReferenceOperation(): ?string
    {
        return $this->referenceOperation;
    }

    public function setReferenceOperation(?string $referenceOperation): self
    {
        $this->referenceOperation = $referenceOperation;

        return $this;
    }

    public function getDescriptionOperation(): ?string
    {
        return $this->descriptionOperation;
    }

    public function setDescriptionOperation(?string $descriptionOperation): self
    {
        $this->descriptionOperation = $descriptionOperation;

        return $this;
    }

    public function getPointeOperation(): ?bool
    {
        return $this->pointeOperation;
    }

    public function setPointeOperation(bool $pointeOperation): self
    {
        $this->pointeOperation = $pointeOperation;

        return $this;
    }

    public function getDateOperation(): ?\DateTimeInterface
    {
        return $this->dateOperation;
    }

    public function setDateOperation(\DateTimeInterface $dateOperation): self
    {
        $this->dateOperation = $dateOperation;

        return $this;
    }

    public function getModeleOperation(): ?string
    {
        return $this->modeleOperation;
    }

    public function setModeleOperation(string $modeleOperation): self
    {
        $this->modeleOperation = $modeleOperation;

        return $this;
    }

    public function getIdCompteTransfer(): ?int
    {
        return $this->idCompteTransfer;
    }

    public function setIdCompteTransfer(?int $idCompteTransfer): self
    {
        $this->idCompteTransfer = $idCompteTransfer;

        return $this;
    }

    public function getAssosiation(): ?Compte
    {
        return $this->assosiation;
    }

    public function setAssosiation(?Compte $assosiation): self
    {
        $this->assosiation = $assosiation;

        return $this;
    }

    public function getAssociatione(): ?Echeances
    {
        return $this->associatione;
    }

    public function setAssociatione(?Echeances $associatione): self
    {
        $this->associatione = $associatione;

        return $this;
    }

    public function getAssociationc(): ?Categorie
    {
        return $this->associationc;
    }

    public function setAssociationc(?Categorie $associationc): self
    {
        $this->associationc = $associationc;

        return $this;
    }

    public function getAssociationt(): ?Tiers
    {
        return $this->associationt;
    }

    public function setAssociationt(?Tiers $associationt): self
    {
        $this->associationt = $associationt;

        return $this;
    }

    public function getAssociationmp(): ?ModePaiement
    {
        return $this->associationmp;
    }

    public function setAssociationmp(?ModePaiement $associationmp): self
    {
        $this->associationmp = $associationmp;

        return $this;
    }

    
}
