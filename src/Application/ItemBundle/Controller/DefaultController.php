<?php

namespace Application\ItemBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Application\ItemBundle\Entity\Enquiry;
use Application\ItemBundle\Form\EnquiryType;

class DefaultController extends Controller
{
    /**
	 * @Route("/", name="home")
     */
    public function indexAction()
    {
		$em = $this->getDoctrine()->getManager();

		$items = $em->getRepository('ItemBundle:Item')->findAll();
		$categories = $em->getRepository('ItemBundle:Category')->findAll();

		$paginator  = $this->get('knp_paginator');
		$pagination = $paginator->paginate(
			$items,
			$this->get('request')->query->get('page', 1),
			3
		);

		if (!$items) {
			throw $this->createNotFoundException('Unable to find items.');
		}

		return $this->render('ItemBundle:Default:index.html.twig', array(
			'items'      => $items,
			'categories'      => $categories,
			'pagination' => $pagination,
		));
    }

	/**
	 * @Route("/contact", name="contact")
	 */
	public function contactAction(Request $request)
	{
		$enquiry = new Enquiry();

		$form = $this->createForm(EnquiryType::class, $enquiry);

		if ($request->isMethod($request::METHOD_POST)) {
			$form->handleRequest($request);

			if ($form->isValid()) {
				$message = \Swift_Message::newInstance()
					->setSubject('Contact enquiry from test site')
					->setFrom('enquiries@test.com')
					->setTo('sorocakagu@doanart.com')
					->setBody($this->renderView('ItemBundle:Default:contactEmail.txt.twig', array('enquiry' => $enquiry)));


				$this->get('mailer')->send($message);

				$this->get('session')->getFlashBag()->add('contact-notice', 'Your contact enquiry was successfully sent. Thank you!');

				return $this->redirect($this->generateUrl('contact'));
			}
		}

		return $this->render('ItemBundle:Default:contact.html.twig', array(
			'form' => $form->createView()
		));
	}

	/**
	 * Show a Item entry
	 * @Route("/item/{id}", name="item")
	 */
	public function showItemAction($id)
	{
		$em = $this->getDoctrine()->getManager();

		$item = $em->getRepository('ItemBundle:Item')->find($id);

		if (!$item) {
			throw $this->createNotFoundException('Unable to find item.');
		}

		return $this->render('ItemBundle:Item:show.html.twig', array(
			'item'      => $item,
		));
	}

	/**
	 * Show a Category entry
	 * @Route("/category/{id}", name="category")
	 */
	public function showCategoryAction($id)
	{
		$em = $this->getDoctrine()->getManager();

		$items = $em->getRepository('ItemBundle:Item')->findAllIncluded($id);
		$category = $em->getRepository('ItemBundle:Category')->find($id);

		if (!$items) {
			throw $this->createNotFoundException('Unable to find items.');
		}

		return $this->render('ItemBundle:Category:show.html.twig', array(
			'items' => $items,
			'category' => $category,
		));
	}
}
