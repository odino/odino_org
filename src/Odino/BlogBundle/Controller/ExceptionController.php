<?php

namespace Odino\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Log\DebugLoggerInterface;

class ExceptionController extends Controller
{
    public function notFoundAction()
    {
        $response = $this->render('OdinoBlogBundle:Default:404.html.twig', array());
        $response->setStatusCode(404);

        return $response;
    }

    public function exceptionAction(FlattenException $exception, DebugLoggerInterface $logger = null, $format = 'html', $embedded = false)
    {
        if ($exception instanceOf \Symfony\Component\HttpKernel\Exception\NotFoundHttpException)
        {
          return $this->forward('OdinoBlogBundle:Exception:notFound');
        }

        $response =  $this->render('OdinoBlogBundle:Default:500.html.twig');
        $response->setStatusCode(500);

        return $response;
    }
}
