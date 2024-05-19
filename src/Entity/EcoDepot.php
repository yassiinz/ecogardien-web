<?php

namespace App\Entity;

use App\Repository\EcoDepotRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EcoDepotRepository::class)]
class EcoDepot
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $adresse = null;

    #[ORM\Column(length: 255)]
    private ?string $type = null;

    #[ORM\Column]
    private ?int $capaciteStockage = null;

    #[ORM\Column(length: 255)]
    private ?string $statutPointCollecte = null;

    #[ORM\OneToMany(mappedBy: 'ecoDepot', targetEntity: ProduitRecyclable::class)]
    private Collection $produitRecyclable;

    public function __construct()
    {
        $this->produitRecyclable = new ArrayCollection();
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

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): static
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): static
    {
        $this->type = $type;

        return $this;
    }

    public function getCapaciteStockage(): ?int
    {
        return $this->capaciteStockage;
    }

    public function setCapaciteStockage(int $capaciteStockage): static
    {
        $this->capaciteStockage = $capaciteStockage;

        return $this;
    }

    public function getStatutPointCollecte(): ?string
    {
        return $this->statutPointCollecte;
    }

    public function setStatutPointCollecte(string $statutPointCollecte): static
    {
        $this->statutPointCollecte = $statutPointCollecte;

        return $this;
    }

    /**
     * @return Collection<int, ProduitRcyclable>
     */

    /**
     * @return Collection<int, ProduitRecyclable>
     */
    public function getProduitRecyclable(): Collection
    {
        return $this->produitRecyclable;
    }

    public function addProduitRecyclable(ProduitRecyclable $produitRecyclable): static
    {
        if (!$this->produitRecyclable->contains($produitRecyclable)) {
            $this->produitRecyclable->add($produitRecyclable);
            $produitRecyclable->setEcoDepot($this);
        }

        return $this;
    }

    public function removeProduitRecyclable(ProduitRecyclable $produitRecyclable): static
    {
        if ($this->produitRecyclable->removeElement($produitRecyclable)) {
            // set the owning side to null (unless already changed)
            if ($produitRecyclable->getEcoDepot() === $this) {
                $produitRecyclable->setEcoDepot(null);
            }
        }

        return $this;
    }
    

   

   

     

}
