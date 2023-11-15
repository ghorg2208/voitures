<?php

namespace App\Entity;

use App\Repository\MembreRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MembreRepository::class)]
class Membre
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(nullable: true)]
    private ?int $id_membre = null;

    #[ORM\Column(length: 20, nullable: true)]
    private ?string $pseudo = null;

    #[ORM\Column(length: 60, nullable: true)]
    private ?string $mdep = null;

    #[ORM\Column(length: 20, nullable: true)]
    private ?string $nom = null;

    #[ORM\Column(length: 20, nullable: true)]
    private ?string $prenom = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $email = null;

    #[ORM\Column(length: 1, nullable: true)]
    private ?string $civilite = null;

    #[ORM\Column]
    private ?int $statut = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $date_enregistrement = null;


    public function __construct()
    {
        $this->setDate_enregistrement(new \DateTimeImmutable());
    }
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdMembre(): ?int
    {
        return $this->id_membre;
    }

    public function setIdMembre(?int $id_membre): static
    {
        $this->id_membre = $id_membre;

        return $this;
    }

    public function getPseudo(): ?string
    {
        return $this->pseudo;
    }

    public function setPseudo(?string $pseudo): static
    {
        $this->pseudo = $pseudo;

        return $this;
    }

    public function getMdep(): ?string
    {
        return $this->mdep;
    }

    public function setMdep(?string $mdep): static
    {
        $this->mdep = $mdep;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(?string $prenom): static
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getCivilite(): ?string
    {
        return $this->civilite;
    }

    public function setCivilite(?string $civilite): static
    {
        $this->civilite = $civilite;

        return $this;
    }

    public function getStatut(): ?int
    {
        return $this->statut;
    }

    public function setStatut(int $statut): static
    {
        $this->statut = $statut;

        return $this;
    }

    public function getDate_enregistrement(): ?\DateTimeInterface
    {
        return $this->date_enregistrement;
    }

    public function setDate_enregistrement(?\DateTimeInterface $date_enregistrement): static
    {
        $this->date_enregistrement = $date_enregistrement;

        return $this;
    }
}
