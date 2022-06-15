<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\UsersRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;

#[ORM\Entity(repositoryClass: UsersRepository::class)]
class Users implements UserInterface, PasswordAuthenticatedUserInterface
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

    #[ORM\ManyToOne(targetEntity: Roles::class, inversedBy: 'users')]
    private $roles_users;

    #[ORM\ManyToMany(targetEntity: Articles::class, inversedBy: 'users')]
    private $articles;

    #[ORM\ManyToMany(targetEntity: Projets::class, inversedBy: 'users')]
    private $projet;

    #[ORM\Column(type: 'string', length: 255)]
    private $imgprofil_users;

    #[ORM\Column(type: 'string', length: 255)]
    private $password;

    #[ORM\Column(type: 'array')]
    private $roles = [];

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

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->mail_users;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getImgprofilUsers(): ?string
    {
        return $this->imgprofil_users;
    }

    public function setImgprofilUsers(string $imgprofil_users): self
    {
        $this->imgprofil_users = $imgprofil_users;

        return $this;
    }

}
