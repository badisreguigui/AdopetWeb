<?php

namespace ShopBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Boutique
 *
 * @ORM\Table(name="boutique", indexes={@ORM\Index(name="nomboutique", columns={"nomboutique"})})
 * @ORM\Entity
 */
class Boutique
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idboutique", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idboutique;

    /**
     * @var string
     *
     * @ORM\Column(name="nomboutique", type="string", length=50, nullable=false)
     */
    private $nomboutique;

    /**
     * @var integer
     *
     * @ORM\Column(name="telboutique", type="integer", nullable=false)
     */
    private $telboutique;

    /**
     * @var string
     *
     * @ORM\Column(name="adresseboutique", type="string", length=50, nullable=false)
     */
    private $adresseboutique;

    /**
     * @var string
     *
     * @ORM\Column(name="imageboutique", type="string", length=500, nullable=false)
     */
    private $imageboutique;


}

