<?php

namespace Odino\BlogBundle\Entity;

/**
 * @orm:Entity
 * @orm:Table(name="content")
 */
class Content
{
    /**
     * @orm:Id
     * @orm:Column(type="integer")
     * @orm:GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @orm:Column(type="string", length="255")
     */
    protected $title;

    /**
     * @orm:Column(type="string", length="255")
     */
    protected $intro;

    /**
     * @orm:Column(type="boolean", name="is_active")
     */
    protected $isActive;

    /**
     * @orm:Column(type="text")
     */
    protected $body;

    /**
     * @orm:Column(type="string", length="255")
     */
    protected $keywords;

    /**
     * @orm:Column(type="datetime", name="published_at")
     */
    protected $publishedAt;

    public function  __toString()
    {
        return $this->getTitle();
    }
    public function getId()
    {
        return $this->id;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setIntro($intro)
    {
        $this->intro = $intro;
    }

    public function getIntro()
    {
        return $this->intro;
    }

    public function getIsActive()
    {
        return $this->isActive;
    }

    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;
    }

    public function getBody()
    {
        return $this->body;
    }

    public function setBody($body)
    {
        $this->body = $body;
    }

    public function getKeywords()
    {
        return $this->keywords;
    }

    public function setKeywords($keywords)
    {
        $this->keywords = $keywords;
    }

    public function getPublishedAt()
    {
        return $this->publishedAt;
    }

    public function setPublishedAt($publishedAt)
    {
        $this->publishedAt = $publishedAt;
    }

    public function getSlug()
    {
        return strtolower(trim(preg_replace('/\W+/', '-', $this->getTitle()), '-'));
    }

    public function isAged()
    {
        $date       = $this->getPublishedAt();
        $ageInDays  = $date->diff(new \DateTime('now'))->format('%a');

        if ($ageInDays > 5)
        {
          return true;
        }

        return false;
    }
}