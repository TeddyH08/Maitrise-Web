<?php

namespace App\Entity;

use App\Repository\MailRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: MailRepository::class)]
class Mail
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    public function getId(): ?int
    {
        return $this->id;
    }

        /**
     * @var string|null
     * @Assert\NotBlank()
     * @Assert\Length(min=2, max=100)
     */
    private $nom;

    /**
     * @var string|null
     * @Assert\NotBlank()
     * @Assert\Length(min=2, max=100)
     */
    private $prenom;

    /**
     * @var string|null
     * @Assert\NotBlank()
     * @Assert\Regex(
     *  pattern="/[0-9]{10}/"
     * )
     */
    private $telephone;

    /**
     * @var string|null
     * @Assert\NotBlank()
     * @Assert\Email()
     */
    private $mail;

    /**
     * @var string|null
     * @Assert\NotBlank()
     * @Assert\Length(min=2, max=100)
     */
    private $sujet;

    /**
     * @var string|null
     * @Assert\NotBlank()
     * @Assert\Length(min=10)
     */
    private $message;

    // /**
    //  * @var Property|null
    //  */
    // private $property;

    /**
     * @return null|string
     */
    public function getNom(): ?string {
        return $this->nom;
    }

    /**
     * @param null|string $nom
     * @return Mail
     */
    public function setNom(?string $nom): Mail {
        $this->nom = $nom;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getPrenom(): ?string {
        return $this->prenom;
    }

    /**
     * @param null|string $prenom
     * @return Mail
     */
    public function setPrenom(?string $prenom): Mail {
        $this->prenom = $prenom;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getTelephone(): ?string {
        return $this->telephone;
    }

    /**
     * @param null|string $telephone
     * @return Mail
     */
    public function setTelephone(?string $telephone): Mail {
        $this->telephone = $telephone;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getMail(): ?string {
        return $this->mail;
    }

    /**
     * @param null|string $mail
     * @return Mail
     */
    public function setMail(?string $mail): Mail {
        $this->mail = $mail;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getSujet(): ?string {
        return $this->sujet;
    }

    /**
     * @param null|string $sujet
     * @return Mail
     */
    public function setSujet(?string $sujet): Mail {
        $this->sujet = $sujet;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getMessage(): ?string {
        return $this->message;
    }

    /**
     * @param null|string $message
     * @return Mail
     */
    public function setMessage(?string $message): Mail {
        $this->message = $message;
        return $this;
    }
}