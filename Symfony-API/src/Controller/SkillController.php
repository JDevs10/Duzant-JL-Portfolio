<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use App\Entity\Skills;

class SkillController extends AbstractController
{
    /**
     * @Route("/api/skills")
     */
    public function getAllSkill()
    {
        $repository = $this->getDoctrine()->getRepository(Skills::class);
        $skills = $repository->findBy(array(), array('category' =>  'ASC'));  //findAll();

        $data = [];
        foreach($skills as $skill){
            $table = [
                "id"=> $skill->getId(),
                "name"=> $skill->getName(),
                "percentage"=> $skill->getPercentage(),
                "category"=> $skill->getCategory()
            ];
            array_push($data, $table);
        }

        return new JsonResponse($data);
    }
}