<?php

namespace AppCourses\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Options
 *
 * @ORM\Table(name="question_options")
 * @ORM\Entity
 */
class Options
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
     * @var integer
     *
     * @ORM\Column(name="questions_id", type="integer")
     */
    private $questionsId;

    /**
     * @var string
     *
     * @ORM\Column(name="answer", type="string", length=255)
     */
    private $answer;

    /**
     * @var integer
     *
     * @ORM\Column(name="points", type="integer")
     */
    private $points;

    /**
     * @ORM\ManyToOne(targetEntity="Quest", inversedBy="option")
     * @ORM\JoinColumn(name="questions_id", referencedColumnName="id")
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
     * Set questionsId
     *
     * @param integer $questionsId
     * @return Options
     */
    public function setQuestionsId($questionsId)
    {
        $this->questionsId = $questionsId;

        return $this;
    }

    /**
     * Get questionsId
     *
     * @return integer 
     */
    public function getQuestionsId()
    {
        return $this->questionsId;
    }

    /**
     * Set answer
     *
     * @param string $answer
     * @return Options
     */
    public function setAnswer($answer)
    {
        $this->answer = $answer;

        return $this;
    }

    /**
     * Get answer
     *
     * @return string 
     */
    public function getAnswer()
    {
        return $this->answer;
    }

    /**
     * Set points
     *
     * @param integer $points
     * @return Options
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
     * Set options
     *
     * @param \AppCourses\Entity\Options $options
     * @return Options
     */
    public function setOptions(\AppCourses\Entity\Options $options = null)
    {
        $this->options = $options;

        return $this;
    }

    /**
     * Get options
     *
     * @return \AppCourses\Entity\Options 
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * Set option
     *
     * @param \AppCourses\Entity\Quest $option
     * @return Options
     */
    public function setOption(\AppCourses\Entity\Quest $option = null)
    {
        $this->option = $option;

        return $this;
    }

    /**
     * Get option
     *
     * @return \AppCourses\Entity\Quest 
     */
    public function getOption()
    {
        return $this->option;
    }
}
