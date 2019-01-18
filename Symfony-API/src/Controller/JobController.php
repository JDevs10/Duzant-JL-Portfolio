<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use App\Entity\Jobs;

class JobController extends AbstractController
{
    /**
     * @Route("/api/jobs")
     */
    public function getJobs()
    {
        $repository = $this->getDoctrine()->getRepository(Jobs::class);
        $jobs = $repository->findAll();

        $data = [];
        foreach($jobs as $job){
            $table = [
                "id"=> $job->getId(),
                "title"=> $job->getTitle(),
                "name"=> $job->getName(),
                "link"=> $job->getLink(),
                "theMission"=> $job->getThemission(),
                "address"=> $job->getAddress(),
                "period"=> $job->getPeriod()
            ];
            array_push($data, $table);
        }

        return new JsonResponse($data);
    }
}