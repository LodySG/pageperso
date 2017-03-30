<?php

namespace DyloProd\ResumeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use DyloProd\ResumeBundle\Entity\Contact;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\FormError;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('DyloProdResumeBundle:Default:index.html.twig');
    }
    
    public function contactAction(Request $request)
    {
        $ar_view = array();
        
        $contact = new Contact();
        $form = $this->createForm('contact', $contact);
        
        $form->handleRequest($request);
        
        if( $form->isSubmitted() && $form->isValid() ) {
        
            $mail_address = $this->container->getParameter("mail_address");
            
            $msg = \Swift_Message::newInstance()
                    ->setSubject($contact->getSujet())
                    ->setFrom(array($contact->getEmail() => $contact->getNom().' '.$contact->getPrenom()))
                    ->setTo($mail_address)
                    ->setBody($contact->getMessage()."\nEnvoyé depuis lodysaintgermain.com");
            
            $this->get('mailer')->send($msg);
            
            return $this->render('DyloProdResumeBundle:Default:success.html.twig');
            
        }

        $ar_view['form'] = $form->createView();
        
        return $this->render('DyloProdResumeBundle:Default:contact.html.twig', $ar_view);
    }
    
    public function vcardAction()
    {
        $vcard = $this->get('jeroendesloovere.vcard');
        
        $photoPath =  getcwd()."/bundles/dyloprodresume/images/lody1.png";

        $vcard->addName('SAINT-GERMAIN', 'Lody');
        $vcard->addJobtitle('Analyste-programmeur');
        $vcard->addEmail('lodysg@gmail.com');
        $vcard->addPhoneNumber("+33623116615", 'WORK');
        $vcard->addAddress(null, null, '71 avenue de la Paix', 'FRESNES', null, '94260', 'FRANCE');
        $vcard->addURL('http://www.lodysaintgermain.com');
        $vcard->addPhoto($photoPath);
        
        $response = new Response();
        $response->setContent($vcard->getOutput());
        $response->setStatusCode(200);
        $response->headers->set('Content-Type','text/x-vcard');
        
        $response->send();
    }
    
}
