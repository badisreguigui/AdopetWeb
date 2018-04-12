<?php
/**
 * Created by PhpStorm.
 * User: emna
 * Date: 21/03/2018
 * Time: 14:07
 */

namespace PetSittingBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * DemandeSitting
 * @ORM\Entity
 * @ORM\Table(name="demandesitting")
 */
class DemandeSitting
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id_demande;

    /**
     * @ORM\Column(type="boolean")
     */
    private $nourriture;

    /**
     * @ORM\Column(type="boolean")
     */
    private $visite;

    /**
     * @ORM\Column(type="string",length=255)
     */
    private $description;

    /**
     * @ORM\Column(type="boolean")
     */
    private $chat;

    /**
     * @ORM\Column(type="boolean")
     */
    private $chien;

    /**
     * @ORM\Column(type="boolean")
     */
    private $autre;

    /**
     * @ORM\Column(type="boolean")
     */
    private $promenade;

    /**
     * @ORM\Column(type="string",length=255)
     */
    private $lieu;

    /**
     * @ORM\Column(type="integer")
     */
    private $num_tel;

    /**
     * @ORM\Column(type="date")
     */
    private $date_debut_demande;

    /**
     * @ORM\Column(type="date")
     */
    private $date_fin_demande;

    /**
     * @ORM\Column(type="float")
     */
    private $prix_souhaite;

    /**
     * @ORM\Column(type="time")
     */
    private $tmp_debut;

    /**
     * @ORM\Column(type="time")
     */
    private $tmp_fin;

    /**
     * @ORM\Column(type="string",length=255)
     */
    private $titre;

    /**
     * @ORM\Column(type="integer")
     */
    private $id_user;

    /**
     * Get id_demande
     *
     * @return integer
     */
    public function getIdDemande()
    {
        return $this->id_demande;
    }

    /**
     * Set id_demande
     *
     * @param mixed $id_demande
     */
    public function setIdDemande($id_demande)
    {
        $this->id_demande = $id_demande;
    }

    /**
     * Get nourriture
     *
     * @return boolean
     */
    public function getNourriture()
    {
        return $this->nourriture;
    }

    /**
     * Set nourriture
     *
     * @param boolean $nourriture
     *
     */
    public function setNourriture($nourriture)
    {
        $this->nourriture = $nourriture;
    }

    /**
     * Get visite
     *
     * @return boolean
     */
    public function getVisite()
    {
        return $this->visite;
    }

    /**
     * Set visite
     *
     * @param boolean $visite
     *
     */
    public function setVisite($visite)
    {
        $this->visite = $visite;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * Get chat
     *
     * @return boolean
     */
    public function getChat()
    {
        return $this->chat;
    }

    /**
     * Set chat
     *
     * @param boolean $chat
     *
     */
    public function setChat($chat)
    {
        $this->chat = $chat;
    }

    /**
     * Get chien
     *
     * @return boolean
     */
    public function getChien()
    {
        return $this->chien;
    }

    /**
     * Set chien
     *
     * @param integer $chien
     *
     */
    public function setChien($chien)
    {
        $this->chien = $chien;
    }

    /**
     * Get autre
     *
     * @return boolean
     */
    public function getAutre()
    {
        return $this->autre;
    }

    /**
     * Set autre
     *
     * @param boolean $autre
     *
     */
    public function setAutre($autre)
    {
        $this->autre = $autre;
    }

    /**
     * Get promenade
     *
     * @return boolean
     */
    public function getPromenade()
    {
        return $this->promenade;
    }

    /**
     * Set promenade
     *
     * @param boolean $promenade
     *
     */
    public function setPromenade($promenade)
    {
        $this->promenade = $promenade;
    }

    /**
     * Get lieu
     *
     * @return string
     */
    public function getLieu()
    {
        return $this->lieu;
    }

    /**
     * Set lieu
     *
     * @param string $lieu
     *
     */
    public function setLieu($lieu)
    {
        $this->lieu = $lieu;
    }

    /**
     * Get num_tel
     *
     * @return integer
     */
    public function getNumTel()
    {
        return $this->num_tel;
    }

    /**
     * Set num_tel
     *
     * @param integer $num_tel
     *
     */
    public function setNumTel($num_tel)
    {
        $this->num_tel = $num_tel;
    }

    /**
     * Get date_debut_demande
     *
     * @return date
     */
    public function getDateDebutDemande()
    {
        return $this->date_debut_demande;
    }

    /**
     * Set date_debut_demande
     *
     * @param date $date_debut_demande
     *
     */
    public function setDateDebutDemande($date_debut_demande)
    {
        $this->date_debut_demande = $date_debut_demande;
    }

    /**
     * Get date_fin_demande
     *
     * @return date
     */
    public function getDateFinDemande()
    {
        return $this->date_fin_demande;
    }

    /**
     * Set date_fin_demande
     *
     * @param date $date_fin_demande
     *
     */
    public function setDateFinDemande($date_fin_demande)
    {
        $this->date_fin_demande = $date_fin_demande;
    }

    /**
     * Get prix_souhaite
     *
     * @return float
     */
    public function getPrixSouhaite()
    {
        return $this->prix_souhaite;
    }

    /**
     * Set prix_souhaite
     *
     * @param float $prix_souhaite
     *
     */
    public function setPrixSouhaite($prix_souhaite)
    {
        $this->prix_souhaite = $prix_souhaite;
    }


    /**
     * Get tmp_debut
     *
     * @return time
     */
    public function getTmpDebut()
    {
        return $this->tmp_debut;
    }

    /**
     * Set tmp_debut
     *
     * @param time $tmp_debut
     *
     */
    public function setTmpDebut($tmp_debut)
    {
        $this->tmp_debut = $tmp_debut;
    }

    /**
     * Get tmp_fin
     *
     * @return time
     */
    public function getTmpFin()
    {
        return $this->tmp_fin;
    }

    /**
     * Set tmp_fin
     *
     * @param time $tmp_fin
     *
     */
    public function setTmpFin($tmp_fin)
    {
        $this->tmp_fin = $tmp_fin;
    }

    /**
     * Get titre
     *
     * @return string
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set titre
     *
     * @param string $titre
     *
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;
    }

    /**
     * Get id_user
     *
     * @return integer
     */
    public function getIdUser()
    {
        return $this->id_user;
    }

    /**
     * Set iduser
     *
     * @param integer $id_user
     *
     */
    public function setIdUser($id_user)
    {
        $this->id_user = $id_user;
    }

}