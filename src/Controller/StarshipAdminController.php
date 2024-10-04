<?php

namespace App\Controller;

use App\Entity\StarshipAdmin;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class StarshipAdminController extends AbstractController
{
    #[Route('/admin/starship/new')]
    public function new(EntityManagerInterface $em)
    {
        $starship = new StarshipAdmin();
        $starship->setName('USS LeafyCruiser (NCC-0001)')
            ->setClass('Garden')
            ->setCaptain('Jean-Luc Pickles')
            ->setStatus('in_progress');

        $em->persist($starship);
        $em->flush();

        return new Response("Starship created with name {$starship->getName()}");
    }
}
