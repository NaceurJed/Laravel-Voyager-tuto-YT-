<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Contact; // on va importer la classe contact pour pouvoir enregister les info envoyer par la méthode post
use Illuminate\Http\Request;


class SiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // on a enlever toutes les méthode pour ne laisser que la méthode index.

    /********* METHODE INDEX **********/
    public function index()
    {
        $post = Post::orderby('created_at', 'asc')//on va ramener tout ce qu'il y a dans la table posts grace à cette méthode de Post, qu'on stocke dans la variable $post
                    ->whereStatus('PUBLISHED') 
                    ->take(6)
                    ->get(); 
        return view('voyagerLaravel.index', ['myPosts' => $post]); // on va créer un tableau myPost au quel on associe la variable $post,
        //on va exploiter la variable dans la vue index.
    }



    /********* METHODE BLOG **********/
    public function blog($id = null){
        //on va recupérer les posts en fonction de leur id s'il existe
        if ($id){
             
            $post = Post::orderby('created_at', 'desc')
            ->whereStatus('PUBLISHED')
            ->whereCategoryId($id)
            ->paginate(3);

            // @if(!$id)

            // @endif
        }else{
            // ça va me ramener un tableau d'objet contenant tous les article articles si id n'existe pas
            $post = Post::orderby('created_at', 'desc')
            ->whereStatus('PUBLISHED') //ici on demande que ceux qui ont un status PUBLISHED (voir table blog)
            ->paginate(3); //ici au lieu de faire get on a utiliser la méthoe paginate avec 3 article par page, il faut aussi créer la pagination dans le fichier blog.blade.php
        }
        
        $categories = Category::all(); //On récupére toutes les catégories (n'oublie pas d'apporter le model Category) qu'on stocke dans un tableau
        return view('voyagerLaravel.blog', ['id'=>$id,'myPosts' => $post, 'myCategories' => $categories]);
    }



    /********* METHODE SHOW **********/
    public function show($slug){ //slug est un attribut dans la table Posts
        $post = Post::whereSlug($slug)->first();
        $post-> nb_visite++; //on incrémente notre colonne nb_viste pour ce poste
        $post->save(); //pour enregistrer notre modification dans la base de donnée
        return view('voyagerLaravel.show', ['post'=>$post]);
    }




    /********* METHODE STORE **********/
    public function store(Request $request){ //on utilise l'objet Request de Laravel et on récupére les info dans $request
        //Cette classe doit être injecter ici, voir tout en haut: use Illuminate\Http\Request;
        // return $request->all(); //cette methode all va récupérer les champs du formulaire et les afficher
        $contact = new Contact(); // on instancie la classe contact
        $contact->objet   = $request->objet; //$request->name du champs du formulaire 
        $contact->email   = $request->email;
        $contact->message = $request->message;

        $contact->save();//pour persister en base de données

        return redirect()->route('contact')->with('success', 'Message envoyé'); // cette variable success va s'enregistrer dans une session, contient la valeur 'Contact réussi', c'est un flash message, sa durée de vie est une requette HTTP, Pour la récupérer dans la vue on doit faire: @if (session('status'))

    }
}
