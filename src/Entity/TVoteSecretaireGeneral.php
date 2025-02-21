<?php

namespace App\Entity;

use App\Repository\TVoteSecretaireGeneralRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TVoteSecretaireGeneralRepository::class)]
class TVoteSecretaireGeneral
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $numero_electeur = null;

    #[ORM\Column(length: 100)]
    private ?string $nom_prenom_electeur = null;

    #[ORM\Column(length: 100)]
    private ?string $login_email = null;

    #[ORM\Column(length: 50)]
    private ?string $mot_passe = null;

    #[ORM\Column(length: 1)]
    private ?string $sexe = null;

    #[ORM\Column]
    private ?int $etat_vote = null;

    #[ORM\Column]
    private ?int $Vote_Blanc = null;

    #[ORM\Column]
    private ?int $COULIBALY_Abdouramane = null;

    #[ORM\Column]
    private ?int $DIA_Aissata_Dite_Diodo = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumeroElecteur(): ?int
    {
        return $this->numero_electeur;
    }

    public function setNumeroElecteur(int $numero_electeur): static
    {
        $this->numero_electeur = $numero_electeur;

        return $this;
    }

    public function getNomPrenomElecteur(): ?string
    {
        return $this->nom_prenom_electeur;
    }

    public function setNomPrenomElecteur(string $nom_prenom_electeur): static
    {
        $this->nom_prenom_electeur = $nom_prenom_electeur;

        return $this;
    }

    public function getLoginEmail(): ?string
    {
        return $this->login_email;
    }

    public function setLoginEmail(string $login_email): static
    {
        $this->login_email = $login_email;

        return $this;
    }

    public function getMotPasse(): ?string
    {
        return $this->mot_passe;
    }

    public function setMotPasse(string $mot_passe): static
    {
        $this->mot_passe = $mot_passe;

        return $this;
    }

    public function getSexe(): ?string
    {
        return $this->sexe;
    }

    public function setSexe(string $sexe): static
    {
        $this->sexe = $sexe;

        return $this;
    }

    public function getEtatVote(): ?int
    {
        return $this->etat_vote;
    }

    public function setEtatVote(int $etat_vote): static
    {
        $this->etat_vote = $etat_vote;

        return $this;
    }

    public function getVoteBlanc(): ?int
    {
        return $this->Vote_Blanc;
    }

    public function setVoteBlanc(int $Vote_Blanc): static
    {
        $this->Vote_Blanc = $Vote_Blanc;

        return $this;
    }

    public function getCOULIBALYAbdouramane(): ?int
    {
        return $this->COULIBALY_Abdouramane;
    }

    public function setCOULIBALYAbdouramane(int $COULIBALY_Abdouramane): static
    {
        $this->COULIBALY_Abdouramane = $COULIBALY_Abdouramane;

        return $this;
    }

    public function getDIAAissataDiteDiodo(): ?int
    {
        return $this->DIA_Aissata_Dite_Diodo;
    }

    public function setDIAAissataDiteDiodo(int $DIA_Aissata_Dite_Diodo): static
    {
        $this->DIA_Aissata_Dite_Diodo = $DIA_Aissata_Dite_Diodo;

        return $this;
    }
}
