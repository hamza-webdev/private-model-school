<?php

namespace App\Entity;

use App\Repository\SpecializationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SpecializationRepository::class)]
class Specialization
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $name;

    #[ORM\ManyToMany(targetEntity: Teacher::class, inversedBy: 'specializations')]
    private $teacher;

    #[ORM\OneToMany(mappedBy: 'education_material', targetEntity: Lesson::class)]
    private $lessons;

    public function __construct()
    {
        $this->teacher = new ArrayCollection();
        $this->classeroom = new ArrayCollection();
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

    /**
     * @return Collection|Teacher[]
     */
    public function getTeacher(): Collection
    {
        return $this->teacher;
    }

    public function addTeacher(Teacher $teacher): self
    {
        if (!$this->teacher->contains($teacher)) {
            $this->teacher[] = $teacher;
        }

        return $this;
    }

    public function removeTeacher(Teacher $teacher): self
    {
        $this->teacher->removeElement($teacher);

        return $this;
    }

    /**
     * @return Collection|Lesson[]
     */
    public function getLessons(): Collection
    {
        return $this->lessons;
    }

    public function addLessons(Lesson $lessons): self
    {
        if (!$this->lessons->contains($lessons)) {
            $this->lessons[] = $lessons;
            $lessons->setEducationMaterial($this);
        }

        return $this;
    }

    public function removeLessons(Lesson $lessons): self
    {
        if ($this->lessons->removeElement($lessons)) {
            // set the owning side to null (unless already changed)
            if ($lessons->getEducationMaterial() === $this) {
                $lessons->setEducationMaterial(null);
            }
        }

        return $this;
    }

    public function __toString(): string
    {
         return (string) $this->getName();
    }
}
