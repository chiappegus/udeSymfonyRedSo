<?php

namespace backendBundle\Entity;

/**
 * Like
 */
class Like
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var \backendBundle\Entity\Publication
     */
    private $publication;

    /**
     * @var \backendBundle\Entity\User
     */
    private $user;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set publication
     *
     * @param \backendBundle\Entity\Publication $publication
     *
     * @return Like
     */
    public function setPublication(\backendBundle\Entity\Publication $publication = null)
    {
        $this->publication = $publication;

        return $this;
    }

    /**
     * Get publication
     *
     * @return \backendBundle\Entity\Publication
     */
    public function getPublication()
    {
        return $this->publication;
    }

    /**
     * Set user
     *
     * @param \backendBundle\Entity\User $user
     *
     * @return Like
     */
    public function setUser(\backendBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \backendBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }
}

