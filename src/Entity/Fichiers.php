<?php

namespace App\Entity;

use App\Repository\FichiersRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FichiersRepository::class)]
class Fichiers
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $name_fichier;

    #[ORM\ManyToOne(targetEntity: projets::class, inversedBy: 'fichiers')]
    private $projet_fichier;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameFichier(): ?string
    {
        return $this->name_fichier;
    }

    public function setNameFichier(string $name_fichier): self
    {
        $this->name_fichier = $name_fichier;

        return $this;
    }

    public function getProjetFichier(): ?projets
    {
        return $this->projet_fichier;
    }

    public function setProjetFichier(?projets $projet_fichier): self
    {
        $this->projet_fichier = $projet_fichier;

        return $this;
    }
}
