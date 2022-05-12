<?php

namespace App\Entity;

use App\Repository\UsersRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UsersRepository::class)]
class Users
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $name_users;

    #[ORM\Column(type: 'string', length: 255)]
    private $firstname_users;

    #[ORM\Column(type: 'string', length: 255)]
    private $mail_users;

    #[ORM\Column(type: 'string', length: 255)]
    private $password_users;

    #[ORM\ManyToOne(targetEntity: Roles::class, inversedBy: 'users')]
    private $roles_users;

    #[ORM\ManyToMany(targetEntity: Articles::class, inversedBy: 'users')]
    private $articles;

    #[ORM\ManyToMany(targetEntity: Projets::class, inversedBy: 'users')]
    private $projet;

    public function __construct()
    {
        $this->articles = new ArrayCollection();
        $this->projet = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameUsers(): ?string
    {
        return $this->name_users;
    }

    public function setNameUsers(string $name_users): self
    {
        $this->name_users = $name_users;

        return $this;
    }

    public function getFirstnameUsers(): ?string
    {
        return $this->firstname_users;
    }

    public function setFirstnameUsers(string $firstname_users): self
    {
        $this->firstname_users = $firstname_users;

        return $this;
    }

    public function getMailUsers(): ?string
    {
        return $this->mail_users;
    }

    public function setMailUsers(string $mail_users): self
    {
        $this->mail_users = $mail_users;

        return $this;
    }

    public function getPasswordUsers(): ?string
    {
        return $this->password_users;
    }

    public function setPasswordUsers(string $password_users): self
    {
        $this->password_users = $password_users;

        return $this;
    }

    public function getRolesUsers(): ?roles
    {
        return $this->roles_users;
    }

    public function setRolesUsers(?roles $roles_users): self
    {
        $this->roles_users = $roles_users;

        return $this;
    }

    /**
     * @return Collection<int, articles>
     */
    public function getArticles(): Collection
    {
        return $this->articles;
    }

    public function addArticle(articles $article): self
    {
        if (!$this->articles->contains($article)) {
            $this->articles[] = $article;
        }

        return $this;
    }

    public function removeArticle(articles $article): self
    {
        $this->articles->removeElement($article);

        return $this;
    }

    /**
     * @return Collection<int, projets>
     */
    public function getProjet(): Collection
    {
        return $this->projet;
    }

    public function addProjet(projets $projet): self
    {
        if (!$this->projet->contains($projet)) {
            $this->projet[] = $projet;
        }

        return $this;
    }

    public function removeProjet(projets $projet): self
    {
        $this->projet->removeElement($projet);

        return $this;
    }
}
