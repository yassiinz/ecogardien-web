<?php

namespace App\Entity;

use App\Repository\WorkshopRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: WorkshopRepository::class)]
class Workshop
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $type = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $heure = null;

    #[ORM\Column(length: 255)]
    private ?string $cours = null;

    #[ORM\OneToMany(mappedBy: 'workshop', targetEntity: User::class)]
    private Collection $idUser;

    #[ORM\OneToMany(mappedBy: 'workshop', targetEntity: test::class)]
    private Collection $idTest;

    #[ORM\OneToMany(mappedBy: 'workshop', targetEntity: User::class)]
    private Collection $user;

    #[ORM\Column(length: 255)]
    private ?string $certificat = null;

    public function __construct()
    {
        $this->idUser = new ArrayCollection();
        $this->idTest = new ArrayCollection();
        $this->user = new ArrayCollection();
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

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): static
    {
        $this->type = $type;

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

    public function getHeure(): ?\DateTimeInterface
    {
        return $this->heure;
    }

    public function setHeure(\DateTimeInterface $heure): static
    {
        $this->heure = $heure;

        return $this;
    }

    public function getCours(): ?string
    {
        return $this->cours;
    }

    public function setCours(string $cours): static
    {
        $this->cours = $cours;

        return $this;
    }

    /**
     * @return Collection<int, User>
     */
    public function getIdUser(): Collection
    {
        return $this->idUser;
    }

    public function addIdUser(User $idUser): static
    {
        if (!$this->idUser->contains($idUser)) {
            $this->idUser->add($idUser);
            $idUser->setWorkshop($this);
        }

        return $this;
    }

    public function removeIdUser(User $idUser): static
    {
        if ($this->idUser->removeElement($idUser)) {
            // set the owning side to null (unless already changed)
            if ($idUser->getWorkshop() === $this) {
                $idUser->setWorkshop(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, test>
     */
    public function getIdTest(): Collection
    {
        return $this->idTest;
    }

    public function addIdTest(test $idTest): static
    {
        if (!$this->idTest->contains($idTest)) {
            $this->idTest->add($idTest);
            $idTest->setWorkshop($this);
        }

        return $this;
    }

    public function removeIdTest(test $idTest): static
    {
        if ($this->idTest->removeElement($idTest)) {
            // set the owning side to null (unless already changed)
            if ($idTest->getWorkshop() === $this) {
                $idTest->setWorkshop(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, User>
     */
    public function getUser(): Collection
    {
        return $this->user;
    }

    public function addUser(User $user): static
    {
        if (!$this->user->contains($user)) {
            $this->user->add($user);
            $user->setWorkshop($this);
        }

        return $this;
    }

    public function removeUser(User $user): static
    {
        if ($this->user->removeElement($user)) {
            // set the owning side to null (unless already changed)
            if ($user->getWorkshop() === $this) {
                $user->setWorkshop(null);
            }
        }

        return $this;
    }

    public function getCertifica(): ?string
    {
        return $this->certificat;
    }

    public function setCertifica(string $certificat): static
    {
        $this->certificat = $certificat;

        return $this;
    }
}
