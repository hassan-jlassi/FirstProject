<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\AuteurRepository;

class AuthorController extends AbstractController
{
 private $authors = array(
    array('id' => 1, 'picture' => '/images/Victor-Hugo.jpg','username' => 'Victor Hugo', 'email' =>
    'victor.hugo@gmail.com ', 'nb_books' => 100),
    array('id' => 2, 'picture' => '/images/william-shakespeare.jpg','username' => ' William Shakespeare', 'email' =>
    ' william.shakespeare@gmail.com', 'nb_books' => 200 ),
    array('id' => 3, 'picture' => '/images/Taha_Hussein.jpg','username' => 'Taha Hussein', 'email' =>
    'taha.hussein@gmail.com', 'nb_books' => 300),
    );
    #[Route('/author', name: 'app_author')]
    public function index(): Response
    {
        return $this->render('author/index.html.twig', [
            'controller_name' => 'AuthorController',
        ]);
    } 
    #[Route('/author/show/{name}', name: 'show')]
  public function showAuthor($name):Response
  {
    return
    $this->render('author/show.html.twig',['name'=>$name]);
  }

  #[Route('/author/list', name: 'list')]
  public function list():Response{
    $authors = array(
      array('id' => 1, 'picture' => '/images/Victor-Hugo.jpg','username' => 'Victor Hugo', 'email' =>
      'victor.hugo@gmail.com ', 'nb_books' => 100),
      array('id' => 2, 'picture' => '/images/william-shakespeare.jpg','username' => ' William Shakespeare', 'email' =>
      ' william.shakespeare@gmail.com', 'nb_books' => 200 ),
      array('id' => 3, 'picture' => '/images/Taha_Hussein.jpg','username' => 'Taha Hussein', 'email' =>
      'taha.hussein@gmail.com', 'nb_books' => 300),
      );
  return
  $this->render('author/list.html.twig',['authors'=>$authors]);
    
  }
  #[Route('/author/details/{id}', name: 'details')]

  public function details($id):Response{
    return 
          $this->render('author/showAuthor.html.twig',['authors'=>$this->authors,'id'=>$id]); 
    



  }
  #[Route('/author/read', name: 'read') ]
  public function read (AuteurRepository $auteurrepo){
    $auteur = $auteurrepo->findAll();
    return 
    $this->render('author/read.html.twig',['auteur'=>$auteur]);
  }


}

