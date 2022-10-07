<?php

namespace App\Entity;

use App\Repository\LessonRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LessonRepository::class)]
class Lesson
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $name;

    #[ORM\Column(type: 'text')]
    private $content;

    #[ORM\ManyToOne(targetEntity: Teacher::class, inversedBy: 'lessons')]
    private $teacher;

    #[ORM\ManyToOne(targetEntity: Specialization::class, inversedBy: 'classeroom')]
    private $education_material;

    #[ORM\ManyToMany(targetEntity: Classeroom::class, inversedBy: 'lessons')]
    private $classerooms;

    #[ORM\Column(type: 'datetime_immutable')]
    private $createdAt;

    #[ORM\Column(type: 'datetime_immutable', nullable: true)]
    private $updatedAt;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $file;

    public function __construct()
    {
        $this->classerooms = new ArrayCollection();
    }

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

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getTeacher(): ?Teacher
    {
        return $this->teacher;
    }

    public function setTeacher(?Teacher $teacher): self
    {
        $this->teacher = $teacher;

        return $this;
    }

    public function getEducationMaterial(): ?Specialization
    {
        return $this->education_material;
    }

    public function setEducationMaterial(?Specialization $education_material): self
    {
        $this->education_material = $education_material;

        return $this;
    }

    /**
     * @return Collection|Classeroom[]
     */
    public function getClasserooms(): Collection
    {
        return $this->classerooms;
    }

    public function addClasseroom(Classeroom $classeroom): self
    {
        if (!$this->classerooms->contains($classeroom)) {
            $this->classerooms[] = $classeroom;
        }

        return $this;
    }

    public function removeClasseroom(Classeroom $classeroom): self
    {
        $this->classerooms->removeElement($classeroom);

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTimeImmutable $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getFile(): ?string
    {
        return $this->file;
    }

    public function setFile(?string $file): self
    {
        $this->file = $file;

        return $this;
    }

    public function __toString(): string
    {
         return (string) $this->getName();
    }
}
