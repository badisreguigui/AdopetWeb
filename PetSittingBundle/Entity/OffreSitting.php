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
 * OffreSitting
 * @ORM\Entity
 * @ORM\Table(name="offresitting")
 */
class OffreSitting
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer",name="id_offre")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id_offre;

    /**
     * @ORM\Column(type="boolean",name="nourriture")
     */
    private $nourriture;

    /**
     * @ORM\Column(type="boolean",name="visite")
     */
    private $visite;

    /**
     * @ORM\Column(type="string",length=255,name="description")
     */
    private $description;

    /**
     * @ORM\Column(type="boolean",name="chat")
     */
    private $chat;

    /**
     * @ORM\Column(type="boolean",name="chien")
     */
    private $chien;

    /**
     * @ORM\Column(type="boolean",name="autre")
     */
    private $autre;

    /**
     * @ORM\Column(type="boolean",name="promenade")
     */
    private $promenade;

    /**
     * @ORM\Column(type="string",length=255,name="lieu")
     */
    private $lieu;

    /**
     * @ORM\Column(type="integer",name="num_tel")
     */
    private $num_tel;

    /**
     * @ORM\Column(type="date",name="date_debut_dispo")
     */
    private $date_debut_dispo;

    /**
     * @ORM\Column(type="date",name="date_fin_dispo")
     */
    private $date_fin_dispo;

    /**
     * @ORM\Column(type="float",name="prix_demande")
     */
    private $prix_demande;

    /**
     * @ORM\Column(type="time",name="tmp_debut")
     */
    private $tmp_debut;

    /**
     * @ORM\Column(type="time",name="tmp_fin")
     */
    private $tmp_fin;

    /**
     * @ORM\Column(type="string",length=255,name="titre")
     */
    private $titre;

    /**
     * @ORM\Column(type="integer",name="id_user")
     */
    private $id_user;

    /**
     * Get id_offre
     *
     * @return integer
     */
    public function getIdOffre()
    {
        return $this->id_offre;
    }

    /**
     * Set id_offre
     *
     * @param mixed $id_offre
     */
    public function setIdOffre($id_offre)
    {
        $this->id_offre = $id_offre;
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
     * Get date_debut_dispo
     *
     * @return date
     */
    public function getDateDebutDispo()
    {
        return $this->date_debut_dispo;
    }

    /**
     * Set date_debut_dispo
     *
     * @param date $date_debut_dispo
     *
     */
    public function setDateDebutDispo($date_debut_dispo)
    {
        $this->date_debut_dispo = $date_debut_dispo;
    }

    /**
     * Get date_fin_dispo
     *
     * @return date
     */
    public function getDateFinDispo()
    {
        return $this->date_fin_dispo;
    }

    /**
     * Set date_fin_dispo
     *
     * @param date $date_fin_dispo
     *
     */
    public function setDateFinDispo($date_fin_dispo)
    {
        $this->date_fin_dispo = $date_fin_dispo;
    }

    /**
     * Get prix_demande
     *
     * @return float
     */
    public function getPrixDemande()
    {
        return $this->prix_demande;
    }

    /**
     * Set prix_demande
     *
     * @param float $prix_demande
     *
     */
    public function setPrixDemande($prix_demande)
    {
        $this->prix_demn = $prix_demande;
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