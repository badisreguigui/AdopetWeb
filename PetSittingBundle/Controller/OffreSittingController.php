<?php

namespace PetSittingBundle\Controller;

use PetSittingBundle\Entity\OffreSitting;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Offresitting controller.
 *
 */
class OffreSittingController extends Controller
{
    /**
     * Lists all offreSitting entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $offreSittings = $em->getRepository('PetSittingBundle:OffreSitting')->findAll();

        return $this->render('PetSittingBundle:offresitting:index.html.twig', array(
            'offreSittings' => $offreSittings,
        ));
    }

    /**
     * Creates a new offreSitting entity.
     *
     */
    public function newAction(Request $request)
    {
        $offreSitting = new OffreSitting();
        $form = $this->createForm('PetSittingBundle\Form\OffreSittingType', $offreSitting);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $offreSitting->setIdUser($this->getUser()->getId());
            $em = $this->getDoctrine()->getManager();
            $em->persist($offreSitting);
            $em->flush();

            return $this->redirectToRoute('offre_showmine', array('id_offre' => $offreSitting->getIdOffre()));
        }

        return $this->render('PetSittingBundle:offresitting:new.html.twig', array(
            'offreSitting' => $offreSitting,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a offreSitting entity.
     *
     */
    public function showAction(OffreSitting $offreSitting)
    {

        return $this->render('PetSittingBundle:offresitting:show.html.twig', array(
            'offreSitting' => $offreSitting,

        ));
    }

    /**
     * Finds and displays a offreSitting entity.
     *
     */
    public function showmineAction(OffreSitting $offreSitting)
    {

        return $this->render('PetSittingBundle:offresitting:showmine.html.twig', array(
            'offreSitting' => $offreSitting,
        ));
    }

    /**
     * Lists your offreSitting entities.
     *
     */
    public function mineAction()
    {
        $em = $this->getDoctrine()->getManager();

        $offreSittings = $em->getRepository('PetSittingBundle:OffreSitting')->findBy(array('id_user' => $this->getUser()->getId()));

        return $this->render('PetSittingBundle:offresitting:mesoffres.html.twig', array(
            'offreSittings' => $offreSittings,
        ));
    }

    /**
     * Displays a form to edit an existing offreSitting entity.
     *
     */
    public function editAction(Request $request, OffreSitting $offreSitting)
    {
        $deleteForm = $this->createDeleteForm($offreSitting);
        $editForm = $this->createForm('PetSittingBundle\Form\OffreSittingType', $offreSitting);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('offresitting_edit', array('id_offre' => $offreSitting->getIdOffre()));
        }

        return $this->render('PetSittingBundle:offresitting:edit.html.twig', array(
            'offreSitting' => $offreSitting,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a offreSitting entity.
     *
     */
    public function deleteAction(Request $request, OffreSitting $offreSitting)
    {
        $form = $this->createDeleteForm($offreSitting);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($offreSitting);
            $em->flush();
        }

        return $this->redirectToRoute('offre_index');
    }

    /**
     * Creates a form to delete a offreSitting entity.
     *
     * @param OffreSitting $offreSitting The offreSitting entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(OffreSitting $offreSitting)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('offresitting_delete', array('id_offre' => $offreSitting->getId_offre())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
