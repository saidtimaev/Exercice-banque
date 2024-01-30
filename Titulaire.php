<?php

Class Titulaire
{
    private string $_nom;
    private string $_prenom;
    private DateTime $_dateNaissance;
    private string $_ville;
    private array $_compteBancaires;

    public function __construct(string $nom, string $prenom, string $dateNaissance, string $ville)
    {
        $this->_nom = $nom;
        $this->_prenom = $prenom;
        $this->_dateNaissance = new DateTime($dateNaissance);
        $this->_ville = $ville;
        $this->_compteBancaires = [];
    }

 

    public function getNom()
    {
        return $this->_nom;
    }

    public function setNom($nom)
    {
        $this->_nom = $nom;

        return $this;
    }
 
    public function getPrenom()
    {
        return $this->_prenom;
    }

    public function setPrenom($prenom)
    {
        $this->_prenom = $prenom;

        return $this;
    }
 
    public function getDateNaissance()
    {
        return $this->_dateNaissance;
    }

    public function setDateNaissance($dateNaissance)
    {
        $this->_dateNaissance = $dateNaissance;

        return $this;
    }

    public function getVille()
    {
        return $this->_ville;
    }

    public function setVille($ville)
    {
        $this->_ville = $ville;

        return $this;
    }

    public function getCompteBancaires()
    {
        return $this->_compteBancaires;
    }

    public function setCompteBancaires($compteBancaires)
    {
        $this->_compteBancaires = $compteBancaire;

        return $this;
    }

    public function afficherAge()
    {
        $dateCourante = new DateTime;
        $age = $dateCourante->diff($this->_dateNaissance);
        
        return $age->y;

    }

    public function addCompteBancaire(CompteBancaire $compteBancaire)
    {
        $this->_comptesBancaires[] = $compteBancaire;
    }

    public function afficherInfosComptes()
    {
        $result = "<h1>Comptes de $this, ".$this->afficherAge()." ans :</h1><br>";
        foreach($this->_comptesBancaires as $compteBancaire)
        {
            $result .= "<h2>$compteBancaire :</h2>".
                        "Le solde de ce compte est de ".$compteBancaire->getSoldeInitial()." ".$compteBancaire->getDevise()."<br><br>";
        }
        return $result;
    }

    public function __toString()
    {
        return $this->_prenom." ".$this->_nom;
    }
}