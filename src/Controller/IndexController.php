<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class IndexController
 * @package App\Controller
 */
class IndexController extends AbstractController
{
    /**
     * @Route("/", name="app_index")
     */
    public function index(): Response
    {
        $user = $this->getUser();
        if (isset($user) && in_array('ROLE_ADMIN', $user->getRoles())) {
            return new RedirectResponse($this->generateUrl('admin_dashboard'));
        }

        return $this->render('index/index.html.twig');
    }
}
