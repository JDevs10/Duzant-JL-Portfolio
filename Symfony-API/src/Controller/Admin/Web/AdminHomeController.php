<?php
namespace App\Controller\Admin\Web;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

/**
 * @Route("/admin")
 */
class AdminHomeController extends AbstractController{

    /**
     * @Route("/home", name="home_admin")
     */
    public function login(Request $request){
        // show tables of each database table data

        return $this->render('Admin/home.html.twig');
    }
        
}