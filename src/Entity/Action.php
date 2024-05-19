<?php

namespace App\Entity;

use App\Repository\ActionRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ActionRepository::class)]
class Action
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne]
    private ?TypeName $type = null;

    #[ORM\Column]
    private ?float $quantite = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date = null;

    #[ORM\Column(length: 255)]
    private ?string $description = null;

    #[ORM\ManyToOne]
    private ?User $user = null;

    #[ORM\Column]
    private ?float $actionScore = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $quantiteTime = null;

    #[ORM\ManyToOne]
    private ?ActionType $categorie = null;

    #[ORM\Column]
    private ?int $niveauDanger = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?TypeName
    {
        return $this->type;
    }

    public function setType(?TypeName $type): static
    {
        $this->type = $type;

        return $this;
    }

    public function getQuantite(): ?float
    {
        return $this->quantite;
    }

    public function setQuantite(float $quantite): static
    {
        $this->quantite = $quantite;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): static
    {
        $this->date = $date;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): static
    {
        $this->user = $user;

        return $this;
    }

    public function getActionScore(): ?float
    {
        return $this->actionScore;
    }

    public function setActionScore(float $actionScore): static
    {
        $this->actionScore = $actionScore;

        return $this;
    }

    public function getQuantiteTime(): ?\DateTimeInterface
    {
        return $this->quantiteTime;
    }

    public function setQuantiteTime(\DateTimeInterface $quantiteTime): static
    {
        $this->quantiteTime = $quantiteTime;

        return $this;
    }

    public function getCategorie(): ?ActionType
    {
        return $this->categorie;
    }

    public function setCategorie(?ActionType $categorie): static
    {
        $this->categorie = $categorie;

        return $this;
    }

    public function getNiveauDanger(): ?int
    {
        return $this->niveauDanger;
    }

    public function setNiveauDanger(int $niveauDanger): static
    {
        $this->niveauDanger = $niveauDanger;

        return $this;
    }
}
