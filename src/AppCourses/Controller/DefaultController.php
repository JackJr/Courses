<?php

namespace AppCourses\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use AppCourses\Entity\Courses;
use AppCourses\Entity\Quest;
use AppCourses\Entity\Options;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage2")
     */
    public function indexAction()
    {
        $repository = $this->getDoctrine()->getRepository('AppCourses:Courses');
        $courses = $repository->findByActive('0');
        
        return $this->render('AppCourses:default:index.html.twig', array('courses' => $courses));
    }

    /**
     * @Route("course/{id}/{question}", name="course")
     */
    public function course($id, $question, Request $request)
    {
       // crete connection
       $em = $this->getDoctrine()->getManager();
       
       // get course info
       $repository = $em->getRepository('AppCourses:Courses')->find($id);
       $course_name = $repository->getName();
       $course_des = $repository->getDescription();

       $query = $em->createQueryBuilder();

       // get options and question
       $query->select('q.id, q.quest, o.answer, o.points')
             ->from('AppCourses:Quest', 'q')
             ->leftJoin('AppCourses:Options', 'o', 'WITH', 'q.id = o.questionsId')
             ->where('q.order_by = :order_by AND q.courses_id = :course')
             ->setParameters(array('order_by' => $question, 'course' => $id));

       $result = $query->getQuery()->getResult();
   
       if(count($result) > 0){
          $quest = $result[0]['quest'];
       } else {
          $quest = 0;
       }

       $em->flush();
      
       // create form
       $form = $this->createFormBuilder()
             ->setAction($this->generateUrl('course', array('id' => $id, 'question' => $question + 1)))
             ->add('save', 'submit', array('label' => 'Volgende vraag'))
             ->getForm();

       $form->handleRequest($request);

       // submit form
       if ($request->isMethod('POST')) {
          $curPoints = $request->request->get('qu_points');
       } else {
          $curPoints = 0;
       }

       $data = array('course_name' => $course_name, 'course_des' => $course_des, 'quest' => $quest, 'options' => $result, 'curPoints' => $curPoints, 'form' => $form->createView() );
       
       return $this->render('AppCourses:default:course.html.twig', $data);
    }
}
