<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use App\Entity\Schools;

class EducationController extends AbstractController
{
    /**
     * @Route("/api/education")
     */
    public function getEducation()
    {
        $repository = $this->getDoctrine()->getRepository(Schools::class);
        $schools = $repository->findAll();

        $data = [];
        foreach($schools as $school){
            $table = [
                "id"=> $school->getId(),
                "name"=> $school->getName(),
                "diplomaName"=> $school->getDiplomaname(),
                "period"=> $school->getPeriod(),
                "address"=> $school->getAddress()
            ];
            array_push($data, $table);
        }

        return new JsonResponse($data);
    }
}