<?php

namespace ShopBundle\Controller;

use ShopBundle\Entity\Produit;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ProduitController extends Controller
{
    public function ProduitsAction()
    {
        $produits = new Produit();
        $em = $this->getDoctrine()->getManager();
        $produits = $em->getRepository(Produit::class)->findAll();
        return $this->render('ShopBundle::Produits.html.twig', ['produits' => $produits]);
    }
}
