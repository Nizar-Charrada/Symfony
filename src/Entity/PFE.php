<?php

namespace App\Entity;

use App\Repository\PFERepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PFERepository::class)]
class PFE
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $Title;

    #[ORM\Column(type: 'string', length: 255)]
    private $Student;

    #[ORM\OneToMany(mappedBy: 'PFE', targetEntity: Entreprise::class)]
    private $entreprises;


    public function __construct()
    {
        $this->entreprises = new ArrayCollection();
    }




    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->Title;
    }

    public function setTitle(string $Title): self
    {
        $this->Title = $Title;

        return $this;
    }

    public function getStudent(): ?string
    {
        return $this->Student;
    }

    public function setStudent(string $Student): self
    {
        $this->Student = $Student;

        return $this;
    }
}
