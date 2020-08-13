<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\CompteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=CompteRepository::class)
 */
class Compte
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
    private $nomCompte;

    /**
     * @ORM\Column(type="float")
     */
    private $soldeCompte;

    /**
     * @ORM\Column(type="string", length=3)
     */
    private $deviceCompte;

    /**
     * @ORM\Column(type="string", length=1)
     */
    private $separateurMilles;

    /**
     * @ORM\Column(type="string", length=1)
     */
    private $separateurDecimale;

    /**
     * @ORM\Column(type="integer")
     */
    private $nombreDecimale;

    /**
     * @ORM\Column(type="boolean")
     */
    private $deviseDroite=false;

    /**
     * @ORM\Column(type="boolean")
     */
    private $masquerCompte=false;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $classeCompte;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="comptes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $association;

    /**
     * @ORM\OneToMany(targetEntity=Operation::class, mappedBy="assosiation", orphanRemoval=true)
     */
    private $operations;

    public function __construct()
    {
        $this->operations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomCompte(): ?string
    {
        return $this->nomCompte;
    }

    public function setNomCompte(string $nomCompte): self
    {
        $this->nomCompte = $nomCompte;

        return $this;
    }

    public function getSoldeCompte(): ?float
    {
        return $this->soldeCompte;
    }

    public function setSoldeCompte(float $soldeCompte): self
    {
        $this->soldeCompte = $soldeCompte;

        return $this;
    }

    public function getDeviceCompte(): ?string
    {
        return $this->deviceCompte;
    }

    public function setDeviceCompte(string $deviceCompte): self
    {
        $this->deviceCompte = $deviceCompte;

        return $this;
    }

    public function getSeparateurMilles(): ?string
    {
        return $this->separateurMilles;
    }

    public function setSeparateurMilles(string $separateurMilles): self
    {
        $this->separateurMilles = $separateurMilles;

        return $this;
    }

    public function getSeparateurDecimale(): ?string
    {
        return $this->separateurDecimale;
    }

    public function setSeparateurDecimale(string $separateurDecimale): self
    {
        $this->separateurDecimale = $separateurDecimale;

        return $this;
    }

    public function getNombreDecimale(): ?int
    {
        return $this->nombreDecimale;
    }

    public function setNombreDecimale(int $nombreDecimale): self
    {
        $this->nombreDecimale = $nombreDecimale;

        return $this;
    }

    public function getDeviseDroite(): ?bool
    {
        return $this->deviseDroite;
    }

    public function setDeviseDroite(bool $deviseDroite): self
    {
        $this->deviseDroite = $deviseDroite;

        return $this;
    }

    public function getMasquerCompte(): ?bool
    {
        return $this->masquerCompte;
    }

    public function setMasquerCompte(bool $masquerCompte): self
    {
        $this->masquerCompte = $masquerCompte;

        return $this;
    }

    public function getClasseCompte(): ?string
    {
        return $this->classeCompte;
    }

    public function setClasseCompte(?string $classeCompte): self
    {
        $this->classeCompte = $classeCompte;

        return $this;
    }

    public function getAssociation(): ?User
    {
        return $this->association;
    }

    public function setAssociation(?User $association): self
    {
        $this->association = $association;

        return $this;
    }

    /**
     * @return Collection|Operation[]
     */
    public function getOperations(): Collection
    {
        return $this->operations;
    }

    public function addOperation(Operation $operation): self
    {
        if (!$this->operations->contains($operation)) {
            $this->operations[] = $operation;
            $operation->setAssosiation($this);
        }

        return $this;
    }

    public function removeOperation(Operation $operation): self
    {
        if ($this->operations->contains($operation)) {
            $this->operations->removeElement($operation);
            // set the owning side to null (unless already changed)
            if ($operation->getAssosiation() === $this) {
                $operation->setAssosiation(null);
            }
        }

        return $this;
    }
}
