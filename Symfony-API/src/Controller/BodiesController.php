<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use App\Entity\Bodies;

class BodiesController extends AbstractController
{
    /**
     * @Route("/api/home")
     */
    public function getHome()
    {
        $repository = $this->getDoctrine()->getRepository(Bodies::class);
        $homes = $repository->findAll();

        $data = [];
        foreach($homes as $home){
            $table = [
                "id"=> $home->getId(),
                "homeBody"=> $home->getHomebody(),
                "resumeBody"=> $home->getResumeBody(),
                "workBody"=> $home->getWorkBody(),
                "contactBody"  =>  $home->getContactBody()
            ];
            array_push($data, $table);
        }

        return new JsonResponse($data);
    }
}