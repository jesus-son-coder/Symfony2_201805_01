<?php
/**
 * Created by PhpStorm.
 * User: Seka Herve
 * Date: 25/04/2018
 * Time: 23:54
 */
namespace TechCorp\HelloBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;

class DemoController extends Controller
{
    public function helloAction($name)
    {
        $response = new Response(sprintf("Hello %s !", $name), 200, array('content-type' => 'text/html'));

        return $response;

    }
}