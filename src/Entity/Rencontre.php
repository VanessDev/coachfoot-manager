<?php

namespace App\Entity;

use App\Repository\RencontreRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RencontreRepository::class)]
class Rencontre
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTime $dateMatch = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTime $heureMatch = null;

    #[ORM\Column(length: 150, nullable: true)]
    private ?string $lieu = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $adversaire = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $typeMatch = null;

    #[ORM\Column(nullable: true)]
    private ?int $scoreEquipe = null;

    #[ORM\Column(nullable: true)]
    private ?int $scoreAdversaire = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $resume = null;

    #[ORM\ManyToOne(inversedBy: 'rencontres')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Equipe $equipe = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateMatch(): ?\DateTime
    {
        return $this->dateMatch;
    }

    public function setDateMatch(\DateTime $dateMatch): static
    {
        $this->dateMatch = $dateMatch;

        return $this;
    }

    public function getHeureMatch(): ?\DateTime
    {
        return $this->heureMatch;
    }

    public function setHeureMatch(\DateTime $heureMatch): static
    {
        $this->heureMatch = $heureMatch;

        return $this;
    }

    public function getLieu(): ?string
    {
        return $this->lieu;
    }

    public function setLieu(?string $lieu): static
    {
        $this->lieu = $lieu;

        return $this;
    }

    public function getAdversaire(): ?string
    {
        return $this->adversaire;
    }

    public function setAdversaire(?string $adversaire): static
    {
        $this->adversaire = $adversaire;

        return $this;
    }

    public function getTypeMatch(): ?string
    {
        return $this->typeMatch;
    }

    public function setTypeMatch(?string $typeMatch): static
    {
        $this->typeMatch = $typeMatch;

        return $this;
    }

    public function getScoreEquipe(): ?int
    {
        return $this->scoreEquipe;
    }

    public function setScoreEquipe(?int $scoreEquipe): static
    {
        $this->scoreEquipe = $scoreEquipe;

        return $this;
    }

    public function getScoreAdversaire(): ?int
    {
        return $this->scoreAdversaire;
    }

    public function setScoreAdversaire(?int $scoreAdversaire): static
    {
        $this->scoreAdversaire = $scoreAdversaire;

        return $this;
    }

    public function getResume(): ?string
    {
        return $this->resume;
    }

    public function setResume(?string $resume): static
    {
        $this->resume = $resume;

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
}
