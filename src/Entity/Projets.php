<?php

namespace App\Entity;

use App\Repository\ProjetsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProjetsRepository::class)]
class Projets
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $name_projet;

    #[ORM\Column(type: 'string', length: 255)]
    private $image_projet;

    #[ORM\Column(type: 'string', length: 255)]
    private $link_projet;

    #[ORM\ManyToOne(targetEntity: Types::class, inversedBy: 'projets')]
    private $type_projet;

    #[ORM\ManyToOne(targetEntity: Etapes::class, inversedBy: 'projets')]
    private $etape_projet;

    #[ORM\OneToMany(mappedBy: 'projet_fichier', targetEntity: Fichiers::class)]
    private $fichiers;

    #[ORM\ManyToMany(targetEntity: Users::class, mappedBy: 'projet')]
    private $users;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $titlep1_articles;

    public function __construct()
    {
        $this->fichiers = new ArrayCollection();
        $this->users = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameProjet(): ?string
    {
        return $this->name_projet;
    }

    public function setNameProjet(string $name_projet): self
    {
        $this->name_projet = $name_projet;

        return $this;
    }

    public function getImageProjet(): ?string
    {
        return $this->image_projet;
    }

    public function setImageProjet(string $image_projet): self
    {
        $this->image_projet = $image_projet;

        return $this;
    }

    public function getLinkProjet(): ?string
    {
        return $this->link_projet;
    }

    public function setLinkProjet(string $link_projet): self
    {
        $this->link_projet = $link_projet;

        return $this;
    }

    public function getTypeProjet(): ?types
    {
        return $this->type_projet;
    }

    public function setTypeProjet(?types $type_projet): self
    {
        $this->type_projet = $type_projet;

        return $this;
    }

    public function getEtapeProjet(): ?etapes
    {
        return $this->etape_projet;
    }

    public function setEtapeProjet(?etapes $etape_projet): self
    {
        $this->etape_projet = $etape_projet;

        return $this;
    }

    /**
     * @return Collection<int, Fichiers>
     */
    public function getFichiers(): Collection
    {
        return $this->fichiers;
    }

    public function addFichier(Fichiers $fichier): self
    {
        if (!$this->fichiers->contains($fichier)) {
            $this->fichiers[] = $fichier;
            $fichier->setProjetFichier($this);
        }

        return $this;
    }

    public function removeFichier(Fichiers $fichier): self
    {
        if ($this->fichiers->removeElement($fichier)) {
            // set the owning side to null (unless already changed)
            if ($fichier->getProjetFichier() === $this) {
                $fichier->setProjetFichier(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Users>
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(Users $user): self
    {
        if (!$this->users->contains($user)) {
            $this->users[] = $user;
            $user->addProjet($this);
        }

        return $this;
    }

    public function removeUser(Users $user): self
    {
        if ($this->users->removeElement($user)) {
            $user->removeProjet($this);
        }

        return $this;
    }

    public function getTitlep1Articles(): ?string
    {
        return $this->titlep1_articles;
    }

    public function setTitlep1Articles(?string $titlep1_articles): self
    {
        $this->titlep1_articles = $titlep1_articles;

        return $this;
    }
}
