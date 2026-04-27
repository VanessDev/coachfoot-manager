<?php

namespace App\Entity;

use App\Repository\JoueurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: JoueurRepository::class)]
class Joueur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $nom = null;

    #[ORM\Column(length: 100)]
    private ?string $prenom = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTime $dateNaissance = null;

    #[ORM\Column(length: 20, nullable: true)]
    private ?string $genre = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $docteurNom = null;

    #[ORM\Column(length: 30, nullable: true)]
    private ?string $docteurPhone = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $postePrefere = null;

    #[ORM\Column(length: 30)]
    private ?string $statut = null;

    #[ORM\ManyToOne(inversedBy: 'joueurs')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Equipe $equipe = null;

    #[ORM\ManyToOne(inversedBy: 'joueurs')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Responsable $responsable = null;

    /**
     * @var Collection<int, Carton>
     */
    #[ORM\OneToMany(targetEntity: Carton::class, mappedBy: 'joueur')]
    #[ORM\OrderBy(['dateCarton' => 'DESC'])]
    private Collection $cartons;

    public function __construct()
    {
        $this->cartons = new ArrayCollection();
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

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): static
    {
        $this->prenom = $prenom;
        return $this;
    }

    public function getDateNaissance(): ?\DateTime
    {
        return $this->dateNaissance;
    }

    public function setDateNaissance(\DateTime $dateNaissance): static
    {
        $this->dateNaissance = $dateNaissance;
        return $this;
    }

    public function getGenre(): ?string
    {
        return $this->genre;
    }

    public function setGenre(?string $genre): static
    {
        $this->genre = $genre;
        return $this;
    }

    public function getDocteurNom(): ?string
    {
        return $this->docteurNom;
    }

    public function setDocteurNom(?string $docteurNom): static
    {
        $this->docteurNom = $docteurNom;
        return $this;
    }

    public function getDocteurPhone(): ?string
    {
        return $this->docteurPhone;
    }

    public function setDocteurPhone(?string $docteurPhone): static
    {
        $this->docteurPhone = $docteurPhone;
        return $this;
    }

    public function getPostePrefere(): ?string
    {
        return $this->postePrefere;
    }

    public function setPostePrefere(?string $postePrefere): static
    {
        $this->postePrefere = $postePrefere;
        return $this;
    }

    public function getStatut(): ?string
    {
        return $this->statut;
    }

    public function setStatut(string $statut): static
    {
        $this->statut = $statut;
        return $this;
    }

    public function getEquipe(): ?Equipe
    {
        return $this->equipe;
    }

    public function setEquipe(?Equipe $equipe): static
    {
        $this->equipe = $equipe;
        return $this;
    }

    public function getResponsable(): ?Responsable
    {
        return $this->responsable;
    }

    public function setResponsable(?Responsable $responsable): static
    {
        $this->responsable = $responsable;
        return $this;
    }

    /**
     * @return Collection<int, Carton>
     */
    public function getCartons(): Collection
    {
        return $this->cartons;
    }

    public function addCarton(Carton $carton): static
    {
        if (!$this->cartons->contains($carton)) {
            $this->cartons->add($carton);
            $carton->setJoueur($this);
        }

        return $this;
    }

    public function removeCarton(Carton $carton): static
    {
        if ($this->cartons->removeElement($carton)) {
            if ($carton->getJoueur() === $this) {
                $carton->setJoueur(null);
            }
        }

        return $this;
    }

    public function getNombreCartons(): int
    {
        return $this->cartons->count();
    }

    public function getNombreCartonsJaunes(): int
    {
        return $this->cartons->filter(function (Carton $carton) {
            return strtolower($carton->getCouleurCarton()) === 'jaune';
        })->count();
    }

    public function getNombreCartonsRouges(): int
    {
        return $this->cartons->filter(function (Carton $carton) {
            return strtolower($carton->getCouleurCarton()) === 'rouge';
        })->count();
    }

    public function isSuspendu(): bool
    {
        return $this->getNombreCartonsRouges() >= 1
            || $this->getNombreCartonsJaunes() >= 3
            || $this->statut === 'suspendu';
    }
}