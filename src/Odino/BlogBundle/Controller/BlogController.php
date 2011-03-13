<?php

namespace Odino\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class BlogController extends Controller
{
    /**
     * @extra:Route("/", name="homepage")
     * @extra:Template()
     */
    public function indexAction()
    {
        $em           = $this->get('doctrine.orm.entity_manager');
        $qb           = $em->getRepository('Odino\BlogBundle\Entity\Content')->createQueryBuilder('u')
                        ->where('u.isActive = 1')
                        ->orderBy('u.publishedAt', 'DESC');
        $qb2          = clone $qb;
        $contents     = $qb->setMaxResults(10)->setFirstResult($this->getFirstResult())->getQuery()->execute();
        $etag         = md5(implode('-', $contents));
        $notModified  = $this->checkEtag($etag);

        if($notModified)
        {
          return  $notModified;
        }

        $count      = $qb2->select('count(u.id)')->getQuery()->execute();
        $pages      = $count[0][1];
        
        $response = $this->render('OdinoBlogBundle:Default:index.html.twig', array(
            'title'       => 'Alessandro Nadalin: temptations of php, team leading and agile development',
            'description' => 'Blog of a young, passionate, heavy bearded, always learning team leader, developer and crappy-code writer.',
            'keywords'    => 'alessandro nadalin, odino, dnsee, php',
            'contents'    => $contents,
            'pages'       => ceil($pages / 10),
            'page'        => $this->getPage(),
        ));
        $response->setEtag($etag);
        $response->setPublic();
        $response->setMaxAge(3600);
        $response->setSharedMaxAge(3600);

        return $response;
    }

    /**
     * @extra:Route("/about", name="about")
     * @extra:Template()
     */
    public function aboutAction()
    {
        $response = $this->render('OdinoBlogBundle:Default:about.html.twig', array(
            'title'       => 'About Alessandro Nadalin',
            'description' => 'Young, passionate, heavy bearded, always learning team leader, developer and crappy-code writer.',
            'keywords'    => 'alessandro nadalin, odino, dnsee, php',
        ));
        $response->setPublic();
        $response->setSharedMaxAge(86400);
        $response->setMaxAge(86400);

        return $response;
    }

    /**
     * @extra:Route("/conferences", name="conferences")
     * @extra:Template()
     */
    public function conferencesAction()
    {
        $response = $this->render('OdinoBlogBundle:Default:conferences.html.twig', array(
            'title'       => 'Alessandro Nadalin\'s talks',
            'description' => 'Talks and slides from Alessandro Nadalin.',
            'keywords'    => 'alessandro nadalin, odino, dnsee, php',
        ));
        $response->setPublic();
        $response->setSharedMaxAge(86400);
        $response->setMaxAge(86400);

        return $response;
    }

    /**
     * @extra:Route("/tags", name="tags")
     * @extra:Template()
     */
    public function tagsAction()
    {
        $tag = $this->get('request')->get('tag');

        if ($tag)
        {
          $em           = $this->get('doctrine.orm.entity_manager');
          $qb           = $em->getRepository('Odino\BlogBundle\Entity\Content')->createQueryBuilder('u')
                          ->where('u.isActive = 1')
                          ->andWhere("u.keywords LIKE ?1")
                          ->orderBy('u.publishedAt', 'DESC')
                          ->setParameter(1, "%$tag%");

          $contents     = $qb->getQuery()->execute();
        }
        else
        {
          $contents = array();
        }

        $response =  $this->render('OdinoBlogBundle:Default:tags.html.twig', array(
            'title'       => 'Tag cloud about PHP, RESTful and agile',
            'description' => '',
            'keywords'    => 'tag cloud',
            'contents'    => $contents,
            'tag'         => $tag,
            'tags'        => $this->getTags(),
        ));

        return $response;
    }

    /**
     * @extra:Route("/rss", name="rss")
     * @extra:Template()
     */
    public function rssAction()
    {
        $em           = $this->get('doctrine.orm.entity_manager');
        $qb           = $em->getRepository('Odino\BlogBundle\Entity\Content')->createQueryBuilder('u')
                        ->where('u.isActive = 1')
                        ->orderBy('u.publishedAt', 'DESC');
        $contents     = $qb->setMaxResults(20)->getQuery()->execute();

        $response = $this->render('OdinoBlogBundle:Default:rss.xml.twig', array(
            'contents' => $contents
        ));
        $response->headers->set('Content-Type', 'text/xml');

        return $response;
    }

    /**
     * @extra:Route("/{id}/{slug}", name="content", requirements={"id" = "\d+"})
     * @extra:Template()
     */
    public function contentAction($id)
    {
        $em      = $this->get('doctrine.orm.entity_manager');
        $content = $em->getRepository('Odino\BlogBundle\Entity\Content')->find((int) $id);

        if(!$content)
        {
            throw new \Symfony\Component\HttpKernel\Exception\NotFoundHttpException('The content does not exist.');
        }

        $response =  $this->render('OdinoBlogBundle:Default:content.html.twig', array(
            'content' => $content,
        ));
        
        if ($content->isAged())
        {
            $response->setSharedMaxAge(86400);
            $response->setMaxAge(604800);
        }

        return $response;
    }

    /**
     * @extra:Route("/menu", name="menu")
     * @extra:Template()
     */
    public function menuAction()
    {

        $response =  $this->render('OdinoBlogBundle:Default:menu.html.twig');
        $response->setSharedMaxAge(30);
        $response->setMaxAge(0);

        return $response;
    }

    protected function getPage()
    {
        $request = $this->get('request');

        return $request->get('page') ?: 1;
    }

    protected function getFirstResult()
    {
        $page = $this->getPage() * 10 - 10;

        return ($page >= 0) ? $page : 0;
    }

    protected function checkEtag($etag)
    { 
        $response = new \Symfony\Component\HttpFoundation\Response();
        $response->setETag("$etag");

        if ($response->isNotModified($this->get('request'))) {
            return $response;
        }

        return false;
    }

    protected function getTags()
    {
        $em      = $this->get('doctrine.orm.entity_manager');
        $articles = $em->getRepository('Odino\BlogBundle\Entity\Content')->createQueryBuilder('u')
                    ->where('u.isActive = 1')
                    ->andWhere('u.id > 186')
                    ->getQuery()
                    ->getResult();

        $_tags = array();

        foreach ($articles as $article)
        {
          $tags = explode(',', $article->getKeywords());

          foreach ($tags as $tag)
          {
            $firstChar = substr($tag, 0, 1);

            if ($firstChar == ' ')
            {
              $tag = substr($tag, 1);
            }

            $_tags[] = strtolower($tag);
          }
        }

        return array_count_values($_tags);
    }
}
