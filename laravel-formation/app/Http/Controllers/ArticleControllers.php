<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Models\articles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleControllers extends Controller
{
    public function store(articles $article, ArticleRequest $request){
        articles::create([
            'titre' => $request -> titre,
            'description' => $request -> description,
            'user_id' => Auth::id()
        ]);
        // En retourne en arriere
        return redirect()->back()->with('success', 'L\'article a bel et bien ete enregistre');
    }

    public function index(){
        $articles = articles::paginate(10);
        return view('acceuil',['articles' => $articles
]);
    }

    public function show($id){
        $article = articles::findOrFail($id);
       return view('articles.show', [
        'article' => $article
       ]);
    }

    public function edit($id){
        return view('articles.edit',[
            'article' => articles::find($id)
        ]);
    }

    public function update($id,ArticleRequest $request){
        //l'id permet de recuperer l'article dont on souhaite faire la maj

        //La variable request recupere les donnees du formulaire
        //On cherche l'id de l'article
        $article = articles::find($id);

        //Ensuite on affecte a cet article ses nouvelles valeurs
        $article->titre = $request->titre;
        $article->description = $request->description;
        //Pour ecraser la valeurs precedente
        $article->save();

        //On retourne sur Acceuil
        return redirect('/acceuil')->with('success','L\'article a bel et bien ete mis a jour');
    }


    public function delete($id){
        $article = articles::find($id);
        $article->delete();
        return redirect('/acceuil')->with('success','L\'article a bel et bien ete supprime');
    }

    public function mine(){
        $MyArticles = articles::where('user_id', Auth::id())->get();
        return view('articles.mine',[
            'my_articles'=> $MyArticles
        ]);
    }
}
