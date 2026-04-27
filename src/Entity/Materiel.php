<?php

namespace App\Entity;

use App\Repository\MaterielRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MaterielRepository::class)]
class Materiel
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $nomMateriel = null;

    #[ORM\Column]
    private ?int $quantiteActuelle = null;

    #[ORM\Column]
    private ?int $seuilAlerte = null;

    /**
     * @var Collection<int, SuiviStock>
     */
    #[ORM\OneToMany(targetEntity: SuiviStock::class, mappedBy: 'materiel')]
    private Collection $suiviStocks;

    public function __construct()
    {
        $this->suiviStocks = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomMateriel(): ?string
    {
        return $this->nomMateriel;
    }

    public function setNomMateriel(string $nomMateriel): static
    {
        $this->nomMateriel = $nomMateriel;

        return $this;
    }

    public function getQuantiteActuelle(): ?int
    {
        return $this->quantiteActuelle;
    }

    public function setQuantiteActuelle(int $quantiteActuelle): static
    {
        $this->quantiteActuelle = $quantiteActuelle;

        return $this;
    }

    public function getSeuilAlerte(): ?int
    {
        return $this->seuilAlerte;
    }

    public function setSeuilAlerte(int $seuilAlerte): static
    {
        $this->seuilAlerte = $seuilAlerte;

        return $this;
    }

    /**
     * @return Collection<int, SuiviStock>
     */
    public function getSuiviStocks(): Collection
    {
        return $this->suiviStocks;
    }

    public function addSuiviStock(SuiviStock $suiviStock): static
    {
        if (!$this->suiviStocks->contains($suiviStock)) {
            $this->suiviStocks->add($suiviStock);
            $suiviStock->setMateriel($this);
        }

        return $this;
    }

    public function removeSuiviStock(SuiviStock $suiviStock): static
    {
        if ($this->suiviStocks->removeElement($suiviStock)) {
            // set the owning side to null (unless already changed)
            if ($suiviStock->getMateriel() === $this) {
                $suiviStock->setMateriel(null);
            }
        }

        return $this;
    }
}
