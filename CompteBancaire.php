<?php

Class CompteBancaire
{
    private string $_libelleCompte;
    private float $_soldeInitial;
    private string $_devise;
    private Titulaire $_titulaire;

    public function __construct(string $libelleCompte, float $soldeInitial, string $devise, Titulaire $titulaire)
    {
        $this->_libelleCompte = $libelleCompte;
        $this->_soldeInitial = $soldeInitial;
        $this->_devise = $devise;
        $this->_titulaire = $titulaire;
        $this->_titulaire->addCompteBancaire($this);
    }

 
    public function getLibelleCompte()
    {
        return $this->_libelleCompte;
    }

    public function setLibelleCompte($libelleCompte)
    {
        $this->_libelleCompte = $libelleCompte;

        return $this;
    }

    public function getSoldeInitial()
    {
        return $this->_soldeInitial;
    }

    public function setSoldeInitial($soldeInitial)
    {
        $this->_soldeInitial = $soldeInitial;

        return $this;
    }

    public function getDevise()
    {
        return $this->_devise;
    }

    public function setDevise($devise)
    {
        $this->_devise = $devise;

        return $this;
    }

    public function getTitulaire()
    {
        return $this->_titulaire;
    }

    public function setTitulaire($titulaire)
    {
        $this->_titulaire = $titulaire;

        return $this;
    }

    public function crediterCompte($montant)
    {
        $this->_soldeInitial += $montant;
    }

    public function debiterCompte($montant)
    {
        $this->_soldeInitial -= $montant;
    }

    public function __toString()
    {
        return $this->_libelleCompte;
    }
}