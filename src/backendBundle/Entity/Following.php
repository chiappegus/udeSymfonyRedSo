<?php

namespace backendBundle\Entity;

/**
 * Following
 */
class Following
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var \backendBundle\Entity\User
     */
    private $followed;

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
     * Set followed
     *
     * @param \backendBundle\Entity\User $followed
     *
     * @return Following
     */
    public function setFollowed(\backendBundle\Entity\User $followed = null)
    {
        $this->followed = $followed;

        return $this;
    }

    /**
     * Get followed
     *
     * @return \backendBundle\Entity\User
     */
    public function getFollowed()
    {
        return $this->followed;
    }

    /**
     * Set user
     *
     * @param \backendBundle\Entity\User $user
     *
     * @return Following
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

