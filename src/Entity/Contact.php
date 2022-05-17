<?php

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;

class Contact {

    /**
     * @var string|null
     * @Assert\NotBlank()
     * @Assert\Length(min=2, max=100)
     */
    private $name;

    /**
     * @var string|null
     * @Assert\NotBlank()
     * @Assert\Length(min=2, max=100)
     */
    private $firstname;

    /**
     * @var string|null
     * @Assert\NotBlank()
     * @Assert\Regex(
     *  pattern="/[0-9]{10}/"
     * )
     */
    private $phone;

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
    private $subject;

    /**
     * @var string|null
     * @Assert\NotBlank()
     * @Assert\Length(min=10)
     */
    private $message;

    /**
     * @var Property|null
     */
    private $property;

    /**
     * @return null|string
     */
    public function getName(): ?string {
        return $this->name;
    }

    /**
     * @param null|string $name
     * @return Contact
     */
    public function setName(?string $name): Contact {
        $this->name = $name;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getFirstname(): ?string {
        return $this->firstname;
    }

    /**
     * @param null|string $firstname
     * @return Contact
     */
    public function setFirstname(?string $firstname): Contact {
        $this->firstname = $firstname;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getPhone(): ?string {
        return $this->phone;
    }

    /**
     * @param null|string $phone
     * @return Contact
     */
    public function setPhone(?string $phone): Contact {
        $this->phone = $phone;
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
     * @return Contact
     */
    public function setMail(?string $mail): Contact {
        $this->mail = $mail;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getSubject(): ?string {
        return $this->subject;
    }

    /**
     * @param null|string $subject
     * @return Contact
     */
    public function setSubject(?string $subject): Contact {
        $this->subject = $subject;
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
     * @return Contact
     */
    public function setMessage(?string $message): Contact {
        $this->message = $message;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getProperty(): ?string {
        return $this->property;
    }

    /**
     * @param null|string $property
     * @return Contact
     */
    public function setProperty(?string $property): Contact {
        $this->property = $property;
        return $this;
    }
}