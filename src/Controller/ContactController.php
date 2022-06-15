<?php
    namespace App\Controller;

    use App\Entity\Mail;
    use App\Form\ContactType;
    use Doctrine\ORM\EntityManagerInterface;
    use Symfony\Component\Form\FormTypeInterface;
    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\Mailer\MailerInterface;
    use Symfony\Component\Mime\Email;
    use Symfony\Component\Routing\Annotation\Route;

    class ContactController extends AbstractController {

        /**
         * @Route("/contact", name="contact")
         * @return Response
         */
        public function index(
            Request $request,
            EntityManagerInterface $manager,
            MailerInterface $mailer
            ): Response 
        {
            $contact = new Mail();
            $form = $this->createForm(ContactType::class, $contact);

            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()) {
                $contact = $form->getData();

                $manager->persist($contact);
                $manager->flush();

                $email = (new Email())
                    ->from($contact->getMail())
                    ->to('admin@symrecipe.com')
                    ->subject($contact->getSujet())
                    ->html($contact->getMessage());

                $mailer->send($email);

                $this->addFlash(
                    'success',
                    'Votre mail a bien été envoyé.'
                );

                return $this->redirectToRoute('contact');
            }
            
            return $this->render('pages/contact.html.twig', [
                "form" => $form->createView()
            ]);
        }
    }