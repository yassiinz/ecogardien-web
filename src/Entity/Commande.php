<?php

namespace App\Entity;

use App\Repository\CommandeRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CommandeRepository::class)]
class Commande
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $DateCommande = null;

    #[ORM\ManyToOne(inversedBy: 'commandes')]
    private ?User $client = null;

    #[ORM\Column]
    private ?float $montantTotale = null;

    #[ORM\ManyToOne(inversedBy: 'commande')]
    private ?ProduitCommande $produitCommande = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateCommande(): ?\DateTimeInterface
    {
        return $this->DateCommande;
    }

    public function setDateCommande(\DateTimeInterface $DateCommande): static
    {
        $this->DateCommande = $DateCommande;

        return $this;
    }

    public function getClient(): ?User
    {
        return $this->client;
    }

    public function setClient(?User $client): static
    {
        $this->client = $client;

        return $this;
    }

    public function getMontantTotale(): ?float
    {
        return $this->montantTotale;
    }

    public function setMontantTotale(float $montantTotale): static
    {
        $this->montantTotale = $montantTotale;

        return $this;
    }

    public function getProduitCommande(): ?ProduitCommande
    {
        return $this->produitCommande;
    }

    public function setProduitCommande(?ProduitCommande $produitCommande): static
    {
        $this->produitCommande = $produitCommande;

        return $this;
    }
}
