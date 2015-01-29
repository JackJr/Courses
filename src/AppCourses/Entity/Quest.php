<?php

namespace AppCourses\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Quest
 *
 * @ORM\Table(name="questions")
 * @ORM\Entity
 */
class Quest
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="quest", type="string", length=255)
     */
    private $quest;

    /**
     * @var integer
     *
     * @ORM\Column(name="order_by", type="integer")
     */
    private $order_by;

    /**
     * @var integer
     *
     * @ORM\Column(name="courses_id", type="integer")
     */
    private $courses_id;

    /**
     * @ORM\OneToMany(targetEntity="Options", mappedBy="option")
     */
    protected $option;


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
     * Set quest
     *
     * @param \stdClass $quest
     * @return Quest
     */
    public function setQuest($quest)
    {
        $this->quest = $quest;

        return $this;
    }

    /**
     * Get quest
     *
     * @return \stdClass 
     */
    public function getQuest()
    {
        return $this->quest;
    }
    

    /**
     * Set order_by
     *
     * @param integer $orderBy
     * @return Quest
     */
    public function setOrderBy($orderBy)
    {
        $this->order_by = $orderBy;

        return $this;
    }

    /**
     * Get order_by
     *
     * @return integer 
     */
    public function getOrderBy()
    {
        return $this->order_by;
    }

    /**
     * Set courses_id
     *
     * @param integer $coursesId
     * @return Quest
     */
    public function setCoursesId($coursesId)
    {
        $this->courses_id = $coursesId;

        return $this;
    }

    /**
     * Get courses_id
     *
     * @return integer 
     */
    public function getCoursesId()
    {
        return $this->courses_id;
    }

    /**
     * Add options
     *
     * @param \AppCourses\Entity\Options $options
     * @return Quest
     */
    public function addOption(\AppCourses\Entity\Options $options)
    {
        $this->options[] = $options;

        return $this;
    }

    /**
     * Remove options
     *
     * @param \AppCourses\Entity\Options $options
     */
    public function removeOption(\AppCourses\Entity\Options $options)
    {
        $this->options->removeElement($options);
    }

    /**
     * Get options
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getOptions()
    {
        return $this->options;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->option = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get option
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getOption()
    {
        return $this->option;
    }
}
