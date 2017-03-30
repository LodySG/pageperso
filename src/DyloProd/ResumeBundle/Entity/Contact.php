<?php

namespace DyloProd\ResumeBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use EWZ\Bundle\RecaptchaBundle\Validator\Constraints as Recaptcha;

class Contact
{
    /**
     * @Assert\NotBlank()
     */
	protected $nom;
	
    /**
     * @Assert\NotBlank()
     */
	protected $prenom;
	
    /**
     * @Assert\Email()
     */
    protected $email;
    
    /**
     * @Assert\NotBlank()
     */
	protected $sujet;
	
    /**
     * @Assert\NotBlank()
     */
	protected $message;

    /**
    * @Recaptcha\IsTrue
    */
    public $recaptcha;
    
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getPrenom()
    {
        return $this->prenom;
    }

    public function setSujet($sujet)
    {
        $this->sujet = $sujet;

        return $this;
    }

    public function getSujet()
    {
        return $this->sujet;
    }

    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    public function getMessage()
    {
        return $this->message;
    }

    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    public function getEmail()
    {
        return $this->email;
    }
    
}
