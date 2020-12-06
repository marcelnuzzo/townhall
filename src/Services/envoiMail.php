<?php

namespace App\Services;

class envoiMail
{
    public function envoi($message)
    {
        $body="Objet : ".$message->getObject().'</br>'."Email : ".$message->getEmail().'</br>'."Statut : ".$message->getStatus().'</br>'."Contenu : ".$message->getContent().'</br>'."Accept : ".$message->getAccept().'</br>';
        $message = (new \Swift_Message('Mairie de Cergy'))
                ->setFrom('nuzzomarcel358@gmail.com')
                ->setTo('nuzzo.marcel@aliceadsl.fr')
                ->setBody($body,
                        'text/html'
            );
            
       return $message;

    }

}