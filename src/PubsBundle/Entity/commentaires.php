<?php

namespace PubsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * commentaires
 *
 * @ORM\Table(name="commentaires")
 * @ORM\Entity(repositoryClass="PubsBundle\Repository\commentairesRepository")
 */
class commentaires
{
    /**
     * @var int
     *
     * @ORM\Column(name="idcom", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;

    /**
     * @var int
     *
     * @ORM\Column(name="iduser", type="integer")
     */
    private $iduser;

    /**
     * @var int
     *
     * @ORM\Column(name="idpub", type="integer")
     */
    private $idpub;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return commentaires
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
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
     * Set iduser
     *
     * @param integer $iduser
     *
     * @return commentaires
     */
    public function setIduser($iduser)
    {
        $this->iduser = $iduser;

        return $this;
    }

    /**
     * Get iduser
     *
     * @return int
     */
    public function getIduser()
    {
        return $this->iduser;
    }

    /**
     * Set idpub
     *
     * @param integer $idpub
     *
     * @return commentaires
     */
    public function setIdpub($idpub)
    {
        $this->idpub = $idpub;

        return $this;
    }

    /**
     * Get idpub
     *
     * @return int
     */
    public function getIdpub()
    {
        return $this->idpub;
    }
}

