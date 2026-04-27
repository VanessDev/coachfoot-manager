<?php

namespace App\Entity;

use App\Repository\CartonRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CartonRepository::class)]
class Carton
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 20)]
    private ?string $couleurCarton = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTime $dateCarton = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $motif = null;

    #[ORM\ManyToOne(inversedBy: 'cartons')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Joueur $joueur = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCouleurCarton(): ?string
    {
        return $this->couleurCarton;
    }

    public function setCouleurCarton(string $couleurCarton): static
    {
        $this->couleurCarton = $couleurCarton;

        return $this;
    }

    public function getDateCarton(): ?\DateTime
    {
        return $this->dateCarton;
    }

    public function setDateCarton(\DateTime $dateCarton): static
    {
        $this->dateCarton = $dateCarton;

        return $this;
    }

    public function getMotif(): ?string
    {
        return $this->motif;
    }

    public function setMotif(?string $motif): static
    {
        $this->motif = $motif;

        return $this;
    }

    public function getJoueur(): ?Joueur
    {
        return $this->joueur;
    }

    public function setJoueur(?Joueur $joueur): static
    {
        $this->joueur = $joueur;

        return $this;
    }
}
