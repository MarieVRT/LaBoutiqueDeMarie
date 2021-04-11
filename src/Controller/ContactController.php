<?php

namespace App\Controller;

use App\Classe\Mail;
use App\Form\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{

    /**
     * @Route("/nous-contacter", name="contact")
     */

    public function index(Request $request)
    {
        $form = $this->createForm(ContactType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $this->addFlash('notice', 'Merci de nous avoir contacté, notre équipe va vous répondre dans les plus brefs délais.');

            //dd($form->getData());

            /*
            $mail = new Mail();
            $content = 'Contenu du mail';
            $mail->send('marie.verraest@gmail.com', 'La Boutique de Marie', 'Vous avez reçu une demande de contact', $content);
            */
        }
        return $this->render('contact/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
