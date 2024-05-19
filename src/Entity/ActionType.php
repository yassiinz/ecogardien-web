<?php

namespace App\Entity;

use App\Repository\ActionTypeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ActionTypeRepository::class)]
class ActionType
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column]
    private ?float $TypeScore = null;

    #[ORM\OneToMany(mappedBy: 'actionType', targetEntity: TypeName::class)]
    private Collection $typeNames;

    public function __construct()
    {
        $this->typeNames = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getTypeScore(): ?float
    {
        return $this->TypeScore;
    }

    public function setTypeScore(float $TypeScore): static
    {
        $this->TypeScore = $TypeScore;

        return $this;
    }

    /**
     * @return Collection<int, TypeName>
     */
    public function getTypeNames(): Collection
    {
        return $this->typeNames;
    }

    public function addTypeName(TypeName $typeName): static
    {
        if (!$this->typeNames->contains($typeName)) {
            $this->typeNames->add($typeName);
            $typeName->setActionType($this);
        }

        return $this;
    }

    public function removeTypeName(TypeName $typeName): static
    {
        if ($this->typeNames->removeElement($typeName)) {
            // set the owning side to null (unless already changed)
            if ($typeName->getActionType() === $this) {
                $typeName->setActionType(null);
            }
        }

        return $this;
    }
}
