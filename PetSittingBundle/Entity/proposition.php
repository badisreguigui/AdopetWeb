<?php
/**
 * Created by PhpStorm.
 * User: emna
 * Date: 12/04/2018
 * Time: 00:49
 */

namespace PetSittingBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Mgilet\NotificationBundle\Annotation\Notifiable;
use Mgilet\NotificationBundle\NotifiableInterface;

/**
 * Proposition
 * @ORM\Entity
 * @ORM\Table(name="proposition")
 * @Notifiable(name="proposition")
 */
class proposition implements NotifiableInterface
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer",name="id")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="integer",name="cin")
     */
    private $cin;

    /**
     * @ORM\Column(type="string",length=255,name="nomcomplet")
     */
    private $nomcomplet;

    /**
     * @ORM\Column(type="float",name="budget")
     */
    private $budget;

    /**
     * @ORM\Column(type="date",name="datedebut")
     */
    private $datedebut;

    /**
     * @ORM\Column(type="date",name="datefin")
     */
    private $datefin;

    /**
     * @ORM\Column(type="string",length=255,name="animal")
     */
    private $animal;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getCin()
    {
        return $this->cin;
    }

    /**
     * @param mixed $cin
     */
    public function setCin($cin)
    {
        $this->cin = $cin;
    }

    /**
     * @return mixed
     */
    public function getNomcomplet()
    {
        return $this->nomcomplet;
    }

    /**
     * @param mixed $nomcomplet
     */
    public function setNomcomplet($nomcomplet)
    {
        $this->nomcomplet = $nomcomplet;
    }

    /**
     * @return mixed
     */
    public function getBudget()
    {
        return $this->budget;
    }

    /**
     * @param mixed $budget
     */
    public function setBudget($budget)
    {
        $this->budget = $budget;
    }

    /**
     * @return mixed
     */
    public function getDatedebut()
    {
        return $this->datedebut;
    }

    /**
     * @param mixed $datedebut
     */
    public function setDatedebut($datedebut)
    {
        $this->datedebut = $datedebut;
    }

    /**
     * @return mixed
     */
    public function getDatefin()
    {
        return $this->datefin;
    }

    /**
     * @param mixed $datefin
     */
    public function setDatefin($datefin)
    {
        $this->datefin = $datefin;
    }

    /**
     * @return mixed
     */
    public function getAnimal()
    {
        return $this->animal;
    }

    /**
     * @param mixed $animal
     */
    public function setAnimal($animal)
    {
        $this->animal = $animal;
    }




}