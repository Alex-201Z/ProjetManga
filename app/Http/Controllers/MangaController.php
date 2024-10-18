<?php

namespace App\Http\Controllers;
use Exception;
use App\Models\Manga;
use App\dao\ServiceManga;
use App\dao\ServiceDessinateur;
use App\dao\ServiceGenre;
use App\dao\ServiceScenariste;
use Illuminate\Http\Request;



class MangaController extends Controller
{
    public function listerMangas()
    {
        try {
            $serviceManga = new ServiceManga();
            $mangas = $serviceManga->getMangasAvecNoms();

            foreach ($mangas as $manga) {
                if (!file_exists('assets\\images\\' . $manga->couverture)) {
                    $manga->couverture = 'erreur.png';
                }
            }

            return view('vues/pageMangas', compact('mangas'));
        } catch (Exception $e) {
            $erreur = $e->getMessage();
            return view('vues/pageErreur', compact('erreur'));
        }
    }
    public function AjouterManga()
    {
        try {
            $ServiceGenre = new ServiceGenre();
            $genres = $ServiceGenre -> getGenres();
            $ServiceDessinateur = new ServiceDessinateur();
            $dessinateur = $ServiceDessinateur ->getdessinateur();
            $ServiceScenariste = new ServiceScenariste();
            $scenariste = $ServiceScenariste ->getScenariste();
            return view('vues/formManga',compact('genres','dessinateur','scenariste'));
        } catch (Exception $e){
            $erreur = $e->getMessage();
            return view('vues/pageErreur', compact('erreur'));
        }
    }
    public function validerManga(Request $request)
    {
        try {
            $serviceManga = new ServiceManga();
            $manga = new Manga();
            $manga->titre = $request->input('txt_titre');
            $manga->id_genre = $request->input('sel_genre');
            $manga->id_dessinateur = $request->input('sel_dessinateur');
            $manga->id_scenariste = $request->input('sel_scenariste');
            $manga->prix = $request->input('num_prix');
            $couv = $request->file('fil_couv');
            if (isset($couv)) {
                $manga->couverture = $couv->getClientOriginalName();
                $couv->move(public_path() . '/assets/images/', $manga->couverture);
            }

            $serviceManga->saveManga($manga);
            return redirect('listerMangas');
        } catch (Exception $e) {
            $erreur = $e->getMessage();
            return view('vues/pageErreur', compact('erreur'));
        }
    }

}
