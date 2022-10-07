<?php

namespace App\Entity;

use App\Repository\TuteurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TuteurRepository::class)]
class Tuteur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $name_father;

    #[ORM\Column(type: 'string', length: 255)]
    private $name_mather;

    #[ORM\Column(type: 'string', length: 255)]
    private $telephone_father;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $telephone_mother;

    #[ORM\Column(type: 'string', length: 255)]
    private $email;

    #[ORM\Column(type: 'string', length: 255)]
    private $password;

    #[ORM\Column(type: 'string', length: 255)]
    private $adresse;

    #[ORM\Column(type: 'string', length: 255)]
    private $city;

    #[ORM\OneToMany(mappedBy: 'tuteur', targetEntity: Student::class)]
    private $students;

    public function __construct()
    {
        $this->students = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameFather(): ?string
    {
        return $this->name_father;
    }

    public function setNameFather(string $name_father): self
    {
        $this->name_father = $name_father;

        return $this;
    }

    public function getNameMather(): ?string
    {
        return $this->name_mather;
    }

    public function setNameMather(string $name_mather): self
    {
        $this->name_mather = $name_mather;

        return $this;
    }

    public function getTelephoneFather(): ?string
    {
        return $this->telephone_father;
    }

    public function setTelephoneFather(string $telephone_father): self
    {
        $this->telephone_father = $telephone_father;

        return $this;
    }

    public function getTelephoneMother(): ?string
    {
        return $this->telephone_mother;
    }

    public function setTelephoneMother(?string $telephone_mother): self
    {
        $this->telephone_mother = $telephone_mother;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    /**
     * @return Collection|Student[]
     */
    public function getStudents(): Collection
    {
        return $this->students;
    }

    public function addStudent(Student $student): self
    {
        if (!$this->students->contains($student)) {
            $this->students[] = $student;
            $student->setTuteur($this);
        }

        return $this;
    }

    public function removeStudent(Student $student): self
    {
        if ($this->students->removeElement($student)) {
            // set the owning side to null (unless already changed)
            if ($student->getTuteur() === $this) {
                $student->setTuteur(null);
            }
        }

        return $this;
    }

    public function __toString(): string
    {
         return (string) $this->getEmail();
    }

}
