<?php

namespace App\Entity;

use App\Repository\EtapesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EtapesRepository::class)]
class Etapes
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $name_etapes;

    #[ORM\OneToMany(mappedBy: 'etape_projet', targetEntity: Projets::class)]
    private $projets;

    public function __construct()
    {
        $this->projets = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameEtapes(): ?string
    {
        return $this->name_etapes;
    }

    public function setNameEtapes(string $name_etapes): self
    {
        $this->name_etapes = $name_etapes;

        return $this;
    }

    /**
     * @return Collection<int, Projets>
     */
    public function getProjets(): Collection
    {
        return $this->projets;
    }

    public function addProjet(Projets $projet): self
    {
        if (!$this->projets->contains($projet)) {
            $this->projets[] = $projet;
            $projet->setEtapeProjet($this);
        }

        return $this;
    }

    public function removeProjet(Projets $projet): self
    {
        if ($this->projets->removeElement($projet)) {
            // set the owning side to null (unless already changed)
            if ($projet->getEtapeProjet() === $this) {
                $projet->setEtapeProjet(null);
            }
        }

        return $this;
    }
}
