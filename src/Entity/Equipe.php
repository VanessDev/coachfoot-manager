<?php

namespace App\Entity;

use App\Repository\EquipeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EquipeRepository::class)]
class Equipe
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $nomEquipe = null;

    #[ORM\Column(length: 50)]
    private ?string $categorie = null;

    #[ORM\Column(length: 20)]
    private ?string $saison = null;

    #[ORM\ManyToOne(inversedBy: 'equipes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Entraineur $entraineur = null;

    /**
     * @var Collection<int, Joueur>
     */
    #[ORM\OneToMany(targetEntity: Joueur::class, mappedBy: 'Equipe')]
    private Collection $joueurs;

    /**
     * @var Collection<int, Rencontre>
     */
    #[ORM\OneToMany(targetEntity: Rencontre::class, mappedBy: 'equipe')]
    private Collection $rencontres;

    /**
     * @var Collection<int, Entrainement>
     */
    #[ORM\OneToMany(targetEntity: Entrainement::class, mappedBy: 'equipe')]
    private Collection $entrainements;

    public function __construct()
    {
        $this->joueurs = new ArrayCollection();
        $this->rencontres = new ArrayCollection();
        $this->entrainements = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomEquipe(): ?string
    {
        return $this->nomEquipe;
    }

    public function setNomEquipe(string $nomEquipe): static
    {
        $this->nomEquipe = $nomEquipe;

        return $this;
    }

    public function getCategorie(): ?string
    {
        return $this->categorie;
    }

    public function setCategorie(string $categorie): static
    {
        $this->categorie = $categorie;

        return $this;
    }

    public function getSaison(): ?string
    {
        return $this->saison;
    }

    public function setSaison(string $saison): static
    {
        $this->saison = $saison;

        return $this;
    }

    public function getEntraineur(): ?Entraineur
    {
        return $this->entraineur;
    }

    public function setEntraineur(?Entraineur $entraineur): static
    {
        $this->entraineur = $entraineur;

        return $this;
    }

    /**
     * @return Collection<int, Joueur>
     */
    public function getJoueurs(): Collection
    {
        return $this->joueurs;
    }

    public function addJoueur(Joueur $joueur): static
    {
        if (!$this->joueurs->contains($joueur)) {
            $this->joueurs->add($joueur);
            $joueur->setEquipe($this);
        }

        return $this;
    }

    public function removeJoueur(Joueur $joueur): static
    {
        if ($this->joueurs->removeElement($joueur)) {
            // set the owning side to null (unless already changed)
            if ($joueur->getEquipe() === $this) {
                $joueur->setEquipe(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Rencontre>
     */
    public function getRencontres(): Collection
    {
        return $this->rencontres;
    }

    public function addRencontre(Rencontre $rencontre): static
    {
        if (!$this->rencontres->contains($rencontre)) {
            $this->rencontres->add($rencontre);
            $rencontre->setEquipe($this);
        }

        return $this;
    }

    public function removeRencontre(Rencontre $rencontre): static
    {
        if ($this->rencontres->removeElement($rencontre)) {
            // set the owning side to null (unless already changed)
            if ($rencontre->getEquipe() === $this) {
                $rencontre->setEquipe(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Entrainement>
     */
    public function getEntrainements(): Collection
    {
        return $this->entrainements;
    }

    public function addEntrainement(Entrainement $entrainement): static
    {
        if (!$this->entrainements->contains($entrainement)) {
            $this->entrainements->add($entrainement);
            $entrainement->setEquipe($this);
        }

        return $this;
    }

    public function removeEntrainement(Entrainement $entrainement): static
    {
        if ($this->entrainements->removeElement($entrainement)) {
            // set the owning side to null (unless already changed)
            if ($entrainement->getEquipe() === $this) {
                $entrainement->setEquipe(null);
            }
        }

        return $this;
    }
}
