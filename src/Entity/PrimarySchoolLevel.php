<?php

namespace App\Entity;

use App\Repository\PrimarySchoolLevelRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PrimarySchoolLevelRepository::class)]
class PrimarySchoolLevel
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $name;

    #[ORM\ManyToMany(targetEntity: Classeroom::class, inversedBy: 'primarySchoolLevels')]
    private $classes;

    public function __construct()
    {
        $this->classes = new ArrayCollection();
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
     * @return Collection|Classeroom[]
     */
    public function getClasses(): Collection
    {
        return $this->classes;
    }

    public function addClass(Classeroom $class): self
    {
        if (!$this->classes->contains($class)) {
            $this->classes[] = $class;
        }

        return $this;
    }

    public function removeClass(Classeroom $class): self
    {
        $this->classes->removeElement($class);

        return $this;
    }

    public function __toString(): string
    {
         return (string) $this->getName();
    }
}
