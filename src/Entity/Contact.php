<?php

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Mapping\ClassMetadata;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ContactRepository::class)
 */
class Contact
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $companyName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $phone;
    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $email;
    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $messageType;
    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $message;
    /**
     * @ORM\Column(type="boolean")
     */
    protected $subscribedToNewsletter;

    public static function loadValidatorMetadata(ClassMetadata $metadata)
    {

        $metadata->addPropertyConstraint('name', new Assert\NotBlank());

        $metadata->addPropertyConstraint('phone', new Assert\Length([
            'min' => 10,
            'max' => 11
        ]));
        $metadata->addPropertyConstraint('email', new Assert\Email([
            'message' => 'The email {{ value }} is not a valid email.',
        ]));
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }
    public function setName($name)
    {
        $this->name = $name;
    }

    public function getCompanyName()
    {
        return $this->companyName;
    }
    public function setCompanyName($companyName)
    {
        $this->companyName = $companyName;
    }

    public function getPhone()
    {
        return $this->phone;
    }
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    public function getEmail()
    {
        return $this->email;
    }
    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getMessageType()
    {
        return $this->messageType;
    }
    public function setMessageType($messageType)
    {
        $this->messageType = $messageType;
    }

    public function getMessage()
    {
        return $this->message;
    }
    public function setMessage($message)
    {
        $this->message = $message;
    }

    public function getSubscribedToNewsletter()
    {
        return $this->subscribedToNewsletter;
    }
    public function setSubscribedToNewsletter($subscribedToNewsletter)
    {
        $this->subscribedToNewsletter = $subscribedToNewsletter;
    }
}
