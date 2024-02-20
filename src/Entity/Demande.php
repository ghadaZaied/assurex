<?php

namespace App\Entity;

use App\Repository\DemandeRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


#[ORM\Entity(repositoryClass: DemandeRepository::class)]
class Demande
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: 'Le nom de la victime ne peut pas être vide.')]
    #[Assert\Length(min: 4, maxMessage: 'Le nom de la victime ne peut pas dépasser {{ limit }} caractères.')]
    private ?string $nomVictime = null;

    #[ORM\Column]
    #[Assert\NotBlank(message: 'Le numéro de constat ne peut pas être vide.')]
    #[Assert\GreaterThan(value: 0, message: 'Le numéro de constat doit être supérieur à zéro.')]
    private ?int $numConstat = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $dateRealisation = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: 'La localisation ne peut pas être vide.')]
    #[Assert\Length(min: 7, maxMessage: 'La localisation ne peut pas dépasser {{ limit }} caractères.')]
    private ?string $localisation = null;

    #[ORM\ManyToOne(inversedBy: 'demandes')]
    private ?User $user = null;

    #[ORM\Column(length: 255)]
    private ?string $etatDemande = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomVictime(): ?string
    {
        return $this->nomVictime;
    }

    public function setNomVictime(string $nomVictime): static
    {
        $this->nomVictime = $nomVictime;

        return $this;
    }

    public function getNumConstat(): ?int
    {
        return $this->numConstat;
    }

    public function setNumConstat(int $numConstat): static
    {
        $this->numConstat = $numConstat;

        return $this;
    }

    public function getDateRealisation(): ?\DateTimeInterface
    {
        return $this->dateRealisation;
    }

    public function setDateRealisation(\DateTimeInterface $dateRealisation): static
    {
        $this->dateRealisation = $dateRealisation;

        return $this;
    }

    public function getLocalisation(): ?string
    {
        return $this->localisation;
    }

    public function setLocalisation(string $localisation): static
    {
        $this->localisation = $localisation;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): static
    {
        $this->user = $user;

        return $this;
    }

    public function getEtatDemande(): ?string
    {
        return $this->etatDemande;
    }

    public function setEtatDemande(string $etatDemande): static
    {
        $this->etatDemande = $etatDemande;

        return $this;
    }
    public function __toString(): string
    {
        return $this->nomVictime ?? ''; 
    }
}
