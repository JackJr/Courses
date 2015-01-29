<?php

namespace AppCourses\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Scores
 *
 * @ORM\Table(name="scores")
 * @ORM\Entity
 */
class Scores
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
     * @ORM\Column(name="value", type="string", length=255)
     */
    private $value;

    /**
     * @var integer
     *
     * @ORM\Column(name="points", type="integer")
     */
    private $points;

    /**
     * @var integer
     *
     * @ORM\Column(name="courses_id", type="integer")
     */
    private $coursesId;


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
     * Set value
     *
     * @param string $value
     * @return Scores
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Get value
     *
     * @return string 
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set points
     *
     * @param integer $points
     * @return Scores
     */
    public function setPoints($points)
    {
        $this->points = $points;

        return $this;
    }

    /**
     * Get points
     *
     * @return integer 
     */
    public function getPoints()
    {
        return $this->points;
    }

    /**
     * Set coursesId
     *
     * @param integer $coursesId
     * @return Scores
     */
    public function setCoursesId($coursesId)
    {
        $this->coursesId = $coursesId;

        return $this;
    }

    /**
     * Get coursesId
     *
     * @return integer 
     */
    public function getCoursesId()
    {
        return $this->coursesId;
    }
}
