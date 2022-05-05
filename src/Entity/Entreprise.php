<?php

namespace App\Entity;

use App\Repository\EntrepriseRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EntrepriseRepository::class)]
class Entreprise
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $Designation;

    #[ORM\OneToMany(mappedBy: 'Entreprise', targetEntity: PFE::class)]
    private $pFEs;

    #[ORM\ManyToOne(targetEntity: PFE::class, inversedBy: 'entreprises')]
    private $PFE;

    #[ORM\OneToMany(mappedBy: 'Entreprise', targetEntity: PFE::class)]
    private $PFEs;

    public function __construct()
    {
        $this->pFEs = new ArrayCollection();
        $this->PFEs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDesignation(): ?string
    {
        return $this->Designation;
    }

    public function setDesignation(string $Designation): self
    {
        $this->Designation = $Designation;

        return $this;
    }

    public function getPFE(): ?PFE
    {
        return $this->PFE;
    }

    public function setPFE(?PFE $PFE): self
    {
        $this->PFE = $PFE;

        return $this;
    }

    /**
     * @return Collection<int, PFE>
     */
    public function getPFEs(): Collection
    {
        return $this->PFEs;
    }
}
