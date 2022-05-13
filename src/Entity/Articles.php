<?php

namespace App\Entity;

use App\Repository\ArticlesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Cocur\Slugify\Slugify;

#[ORM\Entity(repositoryClass: ArticlesRepository::class)]
class Articles
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $name_articles;

    #[ORM\Column(type: 'string', length: 255)]
    private $image_articles;

    #[ORM\Column(type: 'string', length: 255)]
    private $titlep1_articles;

    #[ORM\Column(type: 'string', length: 255)]
    private $textp1_articles;

    #[ORM\Column(type: 'string', length: 255)]
    private $titlep2_articles;

    #[ORM\Column(type: 'string', length: 255)]
    private $textp2_articles;

    #[ORM\Column(type: 'string', length: 255)]
    private $titlep3_articles;

    #[ORM\Column(type: 'string', length: 255)]
    private $textp3_articles;

    #[ORM\Column(type: 'string', length: 255)]
    private $image_annexe_articles;

    #[ORM\ManyToMany(targetEntity: Users::class, mappedBy: 'articles')]
    private $users;

    #[ORM\Column(type: 'string', length: 255)]
    private $link_articles;

    public function __construct()
    {
        $this->users = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameArticles(): ?string
    {
        return $this->name_articles;
    }

    public function setNameArticles(string $name_articles): self
    {
        $this->name_articles = $name_articles;

        return $this;
    }

    public function getSlug(): string {
        return (new Slugify())->slugify($this->name_articles);
    }

    public function getImageArticles(): ?string
    {
        return $this->image_articles;
    }

    public function setImageArticles(string $image_articles): self
    {
        $this->image_articles = $image_articles;

        return $this;
    }

    public function getTitlep1Articles(): ?string
    {
        return $this->titlep1_articles;
    }

    public function setTitlep1Articles(string $titlep1_articles): self
    {
        $this->titlep1_articles = $titlep1_articles;

        return $this;
    }

    public function getTextp1Articles(): ?string
    {
        return $this->textp1_articles;
    }

    public function setTextp1Articles(string $textp1_articles): self
    {
        $this->textp1_articles = $textp1_articles;

        return $this;
    }

    public function getTitlep2Articles(): ?string
    {
        return $this->titlep2_articles;
    }

    public function setTitlep2Articles(string $titlep2_articles): self
    {
        $this->titlep2_articles = $titlep2_articles;

        return $this;
    }

    public function getTextp2Articles(): ?string
    {
        return $this->textp2_articles;
    }

    public function setTextp2Articles(string $textp2_articles): self
    {
        $this->textp2_articles = $textp2_articles;

        return $this;
    }

    public function getTitlep3Articles(): ?string
    {
        return $this->titlep3_articles;
    }

    public function setTitlep3Articles(string $titlep3_articles): self
    {
        $this->titlep3_articles = $titlep3_articles;

        return $this;
    }

    public function getTextp3Articles(): ?string
    {
        return $this->textp3_articles;
    }

    public function setTextp3Articles(string $textp3_articles): self
    {
        $this->textp3_articles = $textp3_articles;

        return $this;
    }

    public function getImageAnnexeArticles(): ?string
    {
        return $this->image_annexe_articles;
    }

    public function setImageAnnexeArticles(string $image_annexe_articles): self
    {
        $this->image_annexe_articles = $image_annexe_articles;

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
            $user->addArticle($this);
        }

        return $this;
    }

    public function removeUser(Users $user): self
    {
        if ($this->users->removeElement($user)) {
            $user->removeArticle($this);
        }

        return $this;
    }

    public function getLinkArticles(): ?string
    {
        return $this->link_articles;
    }

    public function setLinkArticles(string $link_articles): self
    {
        $this->link_articles = $link_articles;

        return $this;
    }
}
