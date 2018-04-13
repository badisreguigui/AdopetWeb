<?php
/**
 * Created by PhpStorm.
 * User: emna
 * Date: 11/04/2018
 * Time: 01:23
 */

namespace PetSittingBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * DemandeFavoris
 * @ORM\Entity
 * @ORM\Table(name="demandefavoris")
 */
class DemandeFavoris
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $iddfav;

    /**
     * @ORM\Column(type="integer")
     */
    private $id_demande;

    /**
     * @ORM\Column(type="integer")
     */
    private $id_user;

    /**
     * Get iddfav
     *
     * @return integer
     */
    public function getIddfav()
    {
        return $this->iddfav;
    }

    /**
     * Set iddfav
     *
     * @param integer $iddfav
     */
    public function setIddfav($iddfav)
    {
        $this->iddfav = $iddfav;
    }

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
     * @param integer $id_demande
     *
     */
    public function setIdDemande($id_demande)
    {
        $this->id_demande = $id_demande;
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