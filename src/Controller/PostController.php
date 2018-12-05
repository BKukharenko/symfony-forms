<?php

namespace App\Controller;

use App\Form\CommentType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class PostController extends AbstractController
{
    /**
     * @Route("/post", name="post")
     */
  public function post(Request $request)
  {
    $post = null;
    $form = $this->createForm(CommentType::class, $post);

    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
      $post = $form->getData();


      return $this->redirectToRoute('comment_success');
    }

    return $this->render('post/post.html.twig', [
      'form' => $form->createView(),
    ]);
  }
}
