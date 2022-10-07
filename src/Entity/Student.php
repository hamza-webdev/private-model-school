<?php

namespace App\Entity;

use App\Repository\StudentRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StudentRepository::class)]
class Student
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $name;

    #[ORM\Column(type: 'string', length: 255)]
    private $surname;

    #[ORM\Column(type: 'datetime')]
    private $date_naissance;

    #[ORM\Column(type: 'datetime')]
    private $date_inscrit;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $photo;

    #[ORM\Column(type: 'string', length: 255)]
    private $sexe;

    #[ORM\Column(type: 'text', nullable: true)]
    private $info_perso;

    #[ORM\ManyToOne(targetEntity: Tuteur::class, inversedBy: 'students')]
    private $tuteur;

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

    public function getSurname(): ?string
    {
        return $this->surname;
    }

    public function setSurname(string $surname): self
    {
        $this->surname = $surname;

        return $this;
    }

    public function getDateNaissance(): ?\DateTimeInterface
    {
        return $this->date_naissance;
    }

    public function setDateNaissance(\DateTimeInterface $date_naissance): self
    {
        $this->date_naissance = $date_naissance;

        return $this;
    }

    public function getDateInscrit(): ?\DateTimeInterface
    {
        return $this->date_inscrit;
    }

    public function setDateInscrit(\DateTimeInterface $date_inscrit): self
    {
        $this->date_inscrit = $date_inscrit;

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

    public function getSexe(): ?string
    {
        return $this->sexe;
    }

    public function setSexe(string $sexe): self
    {
        $this->sexe = $sexe;

        return $this;
    }

    public function getInfoPerso(): ?string
    {
        return $this->info_perso;
    }

    public function setInfoPerso(?string $info_perso): self
    {
        $this->info_perso = $info_perso;

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

    public function __toString(): string
    {
         return (string) $this->getName();
    }

}
