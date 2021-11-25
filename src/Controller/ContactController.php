<?php

namespace App\Controller;

use App\Entity\Contact;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Form\Type\ContactType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ContactController extends AbstractController
{
    public function index(): Response
    {
        return $this->redirectToRoute('contact_form');
    }

    public function new(Request $request): Response
    {
        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $contact = $form->getData();

            return $this->redirectToRoute('form_success', ['name' => $contact->getName()]);
        }
        return $this->render('contactform.html.twig', ['form' => $form->createView()]);
    }

    public function success(): Response
    {
        return $this->render('success.html.twig', []);
    }
}
