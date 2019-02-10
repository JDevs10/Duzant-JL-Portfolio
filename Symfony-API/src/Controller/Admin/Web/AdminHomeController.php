<?php
namespace App\Controller\Admin\Web;

// use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
// use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
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

    // ======================== Home Bodies Section =======================================
    /**
     * @Route("/home/home-bodies/new", name="new_body_admin")
     */
    public function newBody(Request $request){
        $body = new Bodies();
        
        $form = $this->createFormBuilder($body)
            ->add('Home_body', TextareaType::class)
            ->add('Resume_body', TextareaType::class)
            ->add('Work_body', TextareaType::class)
            ->add('Contact_body', TextareaType::class)
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
            'form' => $form->createView(),
            'status' => 'new body'
        ));

    }
    
    /**
     * @Route("/home/home-bodies/edit/{id}", name="edit_body_admin")
     */
    public function editBody($id, Request $request){

        $repository = $this->getDoctrine()->getRepository(Bodies::class);
        $body = $repository->find($id);
        
        $form = $this->createFormBuilder($body)
            ->add('Home_body', TextareaType::class)
            ->add('Resume_body', TextareaType::class)
            ->add('Work_body', TextareaType::class)
            ->add('Contact_body', TextareaType::class)
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
            'form' => $form->createView(),
            'status' => 'edit body'
        ));

    }
    
    /**
     * @Route("/home/home-bodies/delete/{id}", name="delete_body_admin")
     */
    public function deleteBody($id, Request $request){
        $repository = $this->getDoctrine()->getRepository(Bodies::class);
        $body = $repository->find($id);

        $entityManager = $this->getDoctrine()->getEntityManager();
        $entityManager->remove($body);
        $entityManager->flush();
    }


    // ======================== Skill Section =======================================
    /**
     * @Route("/home/skill/add", name="add_skill_admin")
     */
    public function addSkill(Request $request){
        $skill = new Skills();
        
        $form = $this->createFormBuilder($skill)
            ->add('Name', TextType::class)
            ->add('Percentage', TextType::class, [
                'data' => 'Example : 50%',
            ])
            ->add('Category', ChoiceType::class, [
                'choices' => [
                    'Framework' => 'framework',
                    'Software' => 'software',
                    'Web' => 'web',
                    'Other' => 'zother',
                ]
            ])
            ->add('Save', SubmitType::class, array('label' => 'Save'))
            ->getForm();
        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($skill);
            $entityManager->flush();
    
            return $this->redirectToRoute('home_admin');
        }

        return $this->render('Admin/new.html.twig', array(
            'form' => $form->createView(),
            'status' => 'add skill'
        ));
    }

    /**
     * @Route("/home/skill/edit/{id}", name="edit_skill_admin")
     */
    public function editSkill($id, Request $request){
        $repository = $this->getDoctrine()->getRepository(Skills::class);
        $skill = $repository->find($id);

        $form = $this->createFormBuilder($skill)
            ->add('Name', TextType::class)
            ->add('Percentage', TextType::class)
            ->add('Category', ChoiceType::class, [
                'choices' => [
                    'Framework' => 'framework',
                    'Software' => 'software',
                    'Web' => 'web',
                    'Other' => 'zother',
                ]
            ])
            ->add('Save', SubmitType::class, array('label' => 'Save'))
            ->getForm();
        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($skill);
            $entityManager->flush();
    
            return $this->redirectToRoute('home_admin');
        }

        return $this->render('Admin/new.html.twig', array(
            'form' => $form->createView(),
            'status' => 'edit skill'
        ));
    }

    /**
     * @Route("/home/skill/delete/{id}", name="delete_skill_admin")
     */
    public function deleteSkill($id, Request $request){
        $repository = $this->getDoctrine()->getRepository(Skills::class);
        $kill = $repository->find($id);

        $entityManager = $this->getDoctrine()->getEntityManager();
        $entityManager->remove($kill);
        $entityManager->flush();

        return $this->redirectToRoute('home_admin');
    }


    // ======================== Education Section =======================================
    /**
     * @Route("/home/education/add", name="add_education_admin")
     */
    public function addEducation(Request $request){
        $educ = new Schools();
        
        $form = $this->createFormBuilder($educ)
            ->add('Name', TextType::class)
            ->add('Diploma_Name', TextType::class)
            ->add('Period', TextType::class, [
                'data' => 'Example : "Date: 2018 - 2019" OR "2019"'
            ])
            ->add('Address', TextType::class)
            ->add('Save', SubmitType::class, array('label' => 'Save'))
            ->getForm();
        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($educ);
            $entityManager->flush();
    
            return $this->redirectToRoute('home_admin');
        }

        return $this->render('Admin/new.html.twig', array(
            'form' => $form->createView(),
            'status' => 'add school'
        ));
    }

    /**
     * @Route("/home/education/edit/{id}", name="edit_education_admin")
     */
    public function editEducation($id, Request $request){
        $repository = $this->getDoctrine()->getRepository(Schools::class);
        $educ = $repository->find($id);

        $form = $this->createFormBuilder($educ)
            ->add('Name', TextType::class)
            ->add('Diploma_Name', TextType::class)
            ->add('Period', TextType::class)
            ->add('Address', TextType::class)
            ->add('Save', SubmitType::class, array('label' => 'Save'))
            ->getForm();
        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($educ);
            $entityManager->flush();
    
            return $this->redirectToRoute('home_admin');
        }

        return $this->render('Admin/new.html.twig', array(
            'form' => $form->createView(),
            'status' => 'edit school'
        ));
    }

    /**
     * @Route("/home/education/delete/{id}", name="delete_education_admin")
     */
    public function deleteEducation($id, Request $request){
        $repository = $this->getDoctrine()->getRepository(Schools::class);
        $educ = $repository->find($id);

        $entityManager = $this->getDoctrine()->getEntityManager();
        $entityManager->remove($educ);
        $entityManager->flush();

        return $this->redirectToRoute('home_admin');
    }

    // ======================== Job Section =======================================
    /**
     * @Route("/home/job/add", name="add_job_admin")
     */
    public function addJob(Request $request){
        $job = new Jobs();
        
        $form = $this->createFormBuilder($job)
            ->add('Title', TextType::class)
            ->add('Name', TextType::class)
            ->add('Link', TextType::class)
            ->add('The_Mission', TextareaType::class)
            ->add('Address', TextType::class)
            ->add('Period', TextType::class, [
                'data' => 'Example : "Date: Day Month – Day Month Year"'
            ])
            ->add('Save', SubmitType::class, array('label' => 'Save'))
            ->getForm();
        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($job);
            $entityManager->flush();
    
            return $this->redirectToRoute('home_admin');
        }

        return $this->render('Admin/new.html.twig', array(
            'form' => $form->createView(),
            'status' => 'add job'
        ));
    }

    /**
     * @Route("/home/job/edit/{id}", name="edit_job_admin")
     */
    public function editJob($id, Request $request){
        $repository = $this->getDoctrine()->getRepository(Jobs::class);
        $job = $repository->find($id);

        $form = $this->createFormBuilder($job)
        ->add('Title', TextType::class)
        ->add('Name', TextType::class)
        ->add('Link', TextType::class)
        ->add('The_Mission', TextareaType::class)
        ->add('Address', TextType::class)
        ->add('Period', TextType::class)
            ->add('Save', SubmitType::class, array('label' => 'Save'))
            ->getForm();
        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($job);
            $entityManager->flush();
    
            return $this->redirectToRoute('home_admin');
        }

        return $this->render('Admin/new.html.twig', array(
            'form' => $form->createView(),
            'status' => 'edit job'
        ));
    }

    /**
     * @Route("/home/job/delete/{id}", name="delete_job_admin")
     */
    public function deleteJob($id, Request $request){
        $repository = $this->getDoctrine()->getRepository(Jobs::class);
        $job = $repository->find($id);

        $entityManager = $this->getDoctrine()->getEntityManager();
        $entityManager->remove($job);
        $entityManager->flush();

        return $this->redirectToRoute('home_admin');
    }

    // ======================== Project Section =======================================
    /**
     * @Route("/home/project/add", name="add_project_admin")
     */
    public function addProject(Request $request){
        $project = new Work();
        
        $form = $this->createFormBuilder($project)
            ->add('Title', TextType::class)
            ->add('Text', TextareaType::class)
            ->add('Worklink', TextType::class)
            ->add('Type', ChoiceType::class, [
                'choices' => [
                    'Mobile' => 'fa fa-mobile fa-2x',
                    'Website' => 'fa fa-globe fa-2x'
                ]
            ])
            ->add('Save', SubmitType::class, array('label' => 'Save'))
            ->getForm();
        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($project);
            $entityManager->flush();
    
            return $this->redirectToRoute('home_admin');
        }

        return $this->render('Admin/new.html.twig', array(
            'form' => $form->createView(),
            'status' => 'add project'
        ));
    }

    /**
     * @Route("/home/project/edit/{id}", name="edit_project_admin")
     */
    public function editProject($id, Request $request){
        $repository = $this->getDoctrine()->getRepository(Work::class);
        $project = $repository->find($id);

        $form = $this->createFormBuilder($project)
            ->add('Title', TextType::class)
            ->add('Text', TextareaType::class)
            ->add('Worklink', TextType::class)
            ->add('Type', ChoiceType::class, [
                'choices' => [
                    'Mobile' => 'fa fa-mobile fa-2x',
                    'Website' => 'fa fa-globe fa-2x'
                ]
            ])
            ->add('Save', SubmitType::class, array('label' => 'Save'))
            ->getForm();
        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($project);
            $entityManager->flush();
    
            return $this->redirectToRoute('home_admin');
        }

        return $this->render('Admin/new.html.twig', array(
            'form' => $form->createView(),
            'status' => 'edit project'
        ));
    }

    /**
     * @Route("/home/project/delete/{id}", name="delete_project_admin")
     */
    public function deleteProject($id, Request $request){
        $repository = $this->getDoctrine()->getRepository(Work::class);
        $project = $repository->find($id);

        $entityManager = $this->getDoctrine()->getEntityManager();
        $entityManager->remove($project);
        $entityManager->flush();

        return $this->redirectToRoute('home_admin');
    }
}