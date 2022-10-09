<?php

namespace App\Entity;

use App\Repository\EleveRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EleveRepository::class)]
class Eleve
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $name;

    #[ORM\Column(type: 'datetime')]
    private $dateNaissanceAt;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $photo;

    #[ORM\Column(type: 'string', length: 10)]
    private $gendre;

    #[ORM\Column(type: 'text', nullable: true)]
    private $infoPerso;

    #[ORM\ManyToOne(targetEntity: Tuteur::class, inversedBy: 'eleves')]
    private $tuteur;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private $dateInscriptionAt;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getDateNaissanceAt(): ?\datetime
    {
        return $this->dateNaissanceAt;
    }

    public function setDateNaissanceAt(\datetime $dateNaissanceAt): self
    {
        $this->dateNaissanceAt = $dateNaissanceAt;

        return $this;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(?string $photo): self
    {
        $this->photo = $photo;

        return $this;
    }

    public function getGendre(): ?string
    {
        return $this->gendre;
    }

    public function setGendre(string $gendre): self
    {
        $this->gendre = $gendre;

        return $this;
    }

    public function getInfoPerso(): ?string
    {
        return $this->infoPerso;
    }

    public function setInfoPerso(?string $infoPerso): self
    {
        $this->infoPerso = $infoPerso;

        return $this;
    }

    public function getTuteur(): ?Tuteur
    {
        return $this->tuteur;
    }

    public function setTuteur(?Tuteur $tuteur): self
    {
        $this->tuteur = $tuteur;

        return $this;
    }

    public function getDateInscriptionAt(): ?\datetime
    {
        return $this->dateInscriptionAt;
    }

    public function setDateInscriptionAt(?\datetime $dateInscriptionAt): self
    {
        $this->dateInscriptionAt = $dateInscriptionAt;

        return $this;
    }

    public function __toString(): string
    {
         return (string) $this->getName();
    }
}
