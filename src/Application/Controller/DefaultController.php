<?php namespace App\Application\Controller;

use Symfony\Component\HttpFoundation\Response;

class DefaultController extends \Symfony\Bundle\FrameworkBundle\Controller\AbstractController
{
    public function index(): Response {

        return (new Response())->setContent('Hello world !');
    }
}