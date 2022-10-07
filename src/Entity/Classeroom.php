<?php

namespace App\Entity;

use App\Repository\ClasseroomRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ClasseroomRepository::class)]
class Classeroom
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $name;

    #[ORM\ManyToMany(targetEntity: PrimarySchoolLevel::class, mappedBy: 'classes')]
    private $primarySchoolLevels;

    #[ORM\ManyToMany(targetEntity: Lesson::class, mappedBy: 'classerooms')]
    private $lessons;

    public function __construct()
    {
        $this->primarySchoolLevels = new ArrayCollection();
        $this->lessons = new ArrayCollection();
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
     * @return Collection|PrimarySchoolLevel[]
     */
    public function getPrimarySchoolLevels(): Collection
    {
        return $this->primarySchoolLevels;
    }

    public function addPrimarySchoolLevel(PrimarySchoolLevel $primarySchoolLevel): self
    {
        if (!$this->primarySchoolLevels->contains($primarySchoolLevel)) {
            $this->primarySchoolLevels[] = $primarySchoolLevel;
            $primarySchoolLevel->addClass($this);
        }

        return $this;
    }

    public function removePrimarySchoolLevel(PrimarySchoolLevel $primarySchoolLevel): self
    {
        if ($this->primarySchoolLevels->removeElement($primarySchoolLevel)) {
            $primarySchoolLevel->removeClass($this);
        }

        return $this;
    }

    /**
     * @return Collection|Lesson[]
     */
    public function getLessons(): Collection
    {
        return $this->lessons;
    }

    public function addLesson(Lesson $lesson): self
    {
        if (!$this->lessons->contains($lesson)) {
            $this->lessons[] = $lesson;
            $lesson->addClasseroom($this);
        }

        return $this;
    }

    public function removeLesson(Lesson $lesson): self
    {
        if ($this->lessons->removeElement($lesson)) {
            $lesson->removeClasseroom($this);
        }

        return $this;
    }

    public function __toString(): string
    {
         return (string) $this->getName();
    }
}
