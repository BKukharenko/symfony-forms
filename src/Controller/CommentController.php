<?php

namespace App\Controller;

use App\Form\CommentType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class CommentController extends AbstractController
{
    /**
     * @Route("/comment", name="comment")
     */
  public function post(Request $request)
  {
    $comment = null;
    $form = $this->createForm(CommentType::class, $comment);

    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
      $comment = $form->getData();


      return $this->redirectToRoute('comment_success');
    }

    return $this->render('post/post.html.twig', [
      'form' => $form->createView(),
    ]);
  }
}
