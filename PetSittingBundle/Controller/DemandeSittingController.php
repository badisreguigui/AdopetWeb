<?php

namespace PetSittingBundle\Controller;

use PetSittingBundle\Entity\DemandeFavoris;
use PetSittingBundle\Entity\DemandeSitting;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Demandesitting controller.
 *
 */
class DemandeSittingController extends Controller
{
    /**
     * Lists all demandeSitting entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $demandeSittings = $em->getRepository('PetSittingBundle:DemandeSitting')->findAll();

        return $this->render('PetSittingBundle:demandesitting:index.html.twig', array(
            'demandeSittings' => $demandeSittings,
        ));
    }

    public function sendNotification(Request $request)
    {
        $manager = $this->get('mgilet.notification');
        $notif = $manager->createNotification('Hello world !');
        $notif->setMessage('This a notification.');
        $notif->setLink('http://symfony.com/');
        // or the one-line method :
        // $manager->createNotification('Notification subject','Some random text','http://google.fr');

        // you can add a notification to a list of entities
        // the third parameter ``$flush`` allows you to directly flush the entities
        $manager->addNotification(array($this->getUser()), $notif, true);

        return $this->redirectToRoute('demande_index');
    }

    public function favorisAction(Request $request)
    {

        $em = $this->getDoctrine()->getManager();
        $favoris = new DemandeFavoris();
        $demande = $em->getRepository('PetSittingBundle:DemandeSitting')->find(id_demande);
        if ($request->isMethod(post)){
            $favoris->setIdDemande()->$demande->getIdDemande();


        }

    }
    /**
     * Creates a new demandeSitting entity.
     *
     */
    public function newAction(Request $request)
    {
        $demandeSitting = new Demandesitting();
        $form = $this->createForm('PetSittingBundle\Form\DemandeSittingType', $demandeSitting);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $demandeSitting->setIdUser($this->getUser()->getId());
            $em = $this->getDoctrine()->getManager();
            $em->persist($demandeSitting);
            $em->flush();

            return $this->redirectToRoute('demande_showmine', array('id_demande' => $demandeSitting->getIdDemande()));
        }

        return $this->render('PetSittingBundle:demandesitting:new.html.twig', array(
            'demandeSitting' => $demandeSitting,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a demandeSitting entity.
     *
     */
    public function showAction(DemandeSitting $demandeSitting)
    {
        $deleteForm = $this->createDeleteForm($demandeSitting);

        return $this->render('PetSittingBundle:demandesitting:show.html.twig', array(
            'demandeSitting' => $demandeSitting,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Finds and displays a demandeSitting entity.
     *
     */
    public function showmineAction(DemandeSitting $demandeSitting)
    {
        $deleteForm = $this->createDeleteForm($demandeSitting);

        return $this->render('PetSittingBundle:demandesitting:showmine.html.twig', array(
            'demandeSitting' => $demandeSitting,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Lists your demandeSitting entities.
     *
     */
    public function mineAction()
    {
        $em = $this->getDoctrine()->getManager();

        $demandeSittings = $em->getRepository('PetSittingBundle:DemandeSitting')->findBy(array('id_user' => $this->getUser()->getId()));

        return $this->render('PetSittingBundle:demandesitting:mesdemandes.html.twig', array(
            'demandeSittings' => $demandeSittings,
        ));
    }

    /**
     * Displays a form to edit an existing demandeSitting entity.
     *
     */
    public function editAction(Request $request, DemandeSitting $demandeSitting)
    {
        $deleteForm = $this->createDeleteForm($demandeSitting);
        $editForm = $this->createForm('PetSittingBundle\Form\DemandeSittingType', $demandeSitting);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('demande_edit', array('id_demande' => $demandeSitting->getIdDemande()));
        }

        return $this->render('PetSittingBundle:demandesitting:edit.html.twig', array(
            'demandeSitting' => $demandeSitting,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a demandeSitting entity.
     *
     */
    public function deleteAction(Request $request, DemandeSitting $demandeSitting)
    {
        $form = $this->createDeleteForm($demandeSitting);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($demandeSitting);
            $em->flush();
        }

        return $this->redirectToRoute('demande_index');
    }

    /**
     * Creates a form to delete a demandeSitting entity.
     *
     * @param DemandeSitting $demandeSitting The demandeSitting entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(DemandeSitting $demandeSitting)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('demande_delete', array('id_demande' => $demandeSitting->getIdDemande())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
