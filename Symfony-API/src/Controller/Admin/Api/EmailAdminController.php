<?php
namespace App\Controller\Admin\Api;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

use App\Entity\Notification;

class EmailAdminController extends AbstractController{

    /**
     * @Route("api/admin/random", name="adminEmail_admin")
     */
    public function adminEmail(Request $request){

        $theRandomString = $request->get("random");

        $to = 'j-ldsxm18@hotmail.com';
        $from = 'no-reply@admin-portfolio-api.com';
        $user = 'Jean-Laurent [Admin]';
        $subject = 'Admin permission from Portfolio';
        $link = "https://www.thisIsTheLink.com";
        $message = "Hello ".$user."\n\n
            Follow this link to access your Portfolio Admin Manager,
            you will need this code : ' ".$theRandomString." ' form login procedure.\n\n"
            .$link."\n\n
            If you didn’t ask to access your Portfolio Admin Manager, you can ignore this email.
            \n\nThanks,\n\n
            Admin Portfolio API";
        $headers = "From: ".$from;

        if(mail($to, $subject, $message, $headers)){
            $msg = "Please Admin check your email !!!";
        }
        else{
            $msg = "Ops something went wrong ... Error: 500";
        }

        $notif = new Notification();
        $notif->setMsg($msg);
    }

    /**
     * @Route("api/admin/notification", name="adminEmailNotification_admin")
     */
    public function adminEmailNotification(){
        // redirect
        $notif = new Notification();
        $str = $notif->getMsg();
        if($str == ""){$str = "Error : Variable Nothing !!!";}

        return new JsonResponse(["notification" => $str]);
    }
}