<?php
namespace App\Controller\Admin\Web;

// use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
// use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;

use App\Entity\Bodies;
use App\Entity\Skills;
use App\Entity\Schools;
use App\Entity\Jobs;
use App\Entity\Work;

/**
 * @Route("/admin")
 */
class AdminHomeController extends AbstractController{

    /**
     * @Route("/home", name="home_admin")
     */
    public function home(Request $request){
        // show tables of each database table data
        // home data
        $repository = $this->getDoctrine()->getRepository(Bodies::class);
        $bodies = $repository->findAll();

        // skill data
        $repository = $this->getDoctrine()->getRepository(Skills::class);
        $skills = $repository->findAll();

        // education data
        $repository = $this->getDoctrine()->getRepository(Schools::class);
        $schools = $repository->findAll();

        // job data
        $repository = $this->getDoctrine()->getRepository(Jobs::class);
        $jobs = $repository->findAll();

        // projects data
        $repository = $this->getDoctrine()->getRepository(Work::class);
        $works = $repository->findAll();

        return $this->render('Admin/home.html.twig', array(
            "bodies" => $bodies,
            "skills" => $skills,
            "schools" => $schools,
            "jobs" => $jobs,
            "works" => $works
        ));
    }

    /**
     * @Route("/home/{new}", name="addNew_admin")
     */
    public function addnew($new){
        if($new == "new_body"){

            $repository = $this->getDoctrine()->getRepository(Bodies::class);
            $body = $repository->find(1);

            if($body == null && $body != 1){  $body = new Bodies();   }
            
            $form = $this->createFormBuilder($body)
                ->add('Home body', TextareaType::class)
                ->add('Resume body', TextareaType::class)
                ->add('Work body', TextareaType::class)
                ->add('Contact body', TextareaType::class)
                ->add('Save', SubmitType::class, array('label' => 'Save'))
                ->getForm();
            $form->handleRequest($request);

            if ($form->isSubmitted()) {
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($body);
                $entityManager->flush();
        
                return $this->redirectToRoute('home_admin');
            }

            return $this->render('Admin/new.html.twig', array(
                'form' => $form->createView()
            ));
        }

        // if($new == "newSkill"){

        // }

        // return $this->render('Admin/new.html.twig', array(
        //     'form' => $form->createView()
        // ));

    }
        
}