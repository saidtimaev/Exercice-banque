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

        // Ajoute l'objet CompteBancaire à sa création dans le tableau de l'objet de la classe Titulaire
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

    // Fonction qui va créditer le compte d'un montant indiqué
    public function crediterCompte(float $montantCredit)
    {
        $this->_soldeInitial += $montantCredit;
        echo "Le compte '$this' a été crédité de ".$montantCredit." ".$this->_devise."<br>";
        echo "Nouveau solde du compte $this ".$this->_soldeInitial." ".$this->_devise."<br><br>";
    }

    // Fonction qui va débiter le compte d'un montant indiqué
    public function debiterCompte(float $montantDebit)
    {
        if ($this->_soldeInitial < $montantDebit)
        {
            echo "Solde insuffisant, votre contrat ne vous permet pas le découvert.<br>";
            return false;
        }
        
        $this->_soldeInitial -= $montantDebit;
        echo "Le compte '$this' a été débité de ".$montantDebit." ".$this->_devise."<br>";
        echo "Nouveau solde du compte '$this' ".$this->_soldeInitial." ".$this->_devise."<br><br>";
        return true;
    }

    // Fonction qui va effectuer un virement d'un compte à l'autre
    public function effectuerVirement(float $montantVirement, CompteBancaire $compteDestinataire)
    {
        if ($this->debiterCompte($montantVirement))
        {
            $compteDestinataire->crediterCompte($montantVirement);
        }

    }

    public function __toString()
    {
        return $this->_libelleCompte;
    }
}