<?php

namespace App\dao;

use App\Models\Manga;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use App\Exceptions\MonException;

class ServiceManga
{
    public function getMangasAvecNoms()
    {
        try {
            $mangas = DB::table('manga')
                ->select('id_manga', 'titre', 'prix', 'couverture', 'genre.lib_genre', 'dessinateur.nom_dessinateur', 'scenariste.nom_scenariste')
                ->join('genre', 'genre.id_genre', '=', 'manga.id_genre')
                ->join('dessinateur', 'dessinateur.id_dessinateur', '=', 'manga.id_dessinateur')
                ->join('scenariste', 'scenariste.id_scenariste', '=', 'manga.id_scenariste')
                ->get();
            return $mangas;
        } catch (QueryException $e) {
            throw new MonException($e->getMessage(), 5);
        }
    }
public function AjouterManga(Request $request)
{
    try {
        $id_dessinateur = $request->input('prenom');
        $id_scenariste = $request->input('nom');
        $prix = $request->input('passe');
        $titre = $request->input('profil');
        $couverture = $request->input('interet');
        $message = "";

        $serviceManga = new ServiceManga();
        $serviceManga->AjoutManga($id_dessinateur, $id_scenariste, $prix, $titre, $couverture, $message);
        $serviceGenre = new ServiceGenre();
        $genres = $serviceGenre->getGenres();
        $ServiceDessinateur = new ServiceDessinateur();
        $id_dessinateur = $ServiceDessinateur->getDessinateur();
        $ServiceScenariste = new ServiceScenariste();
        $id_scenariste = $ServiceScenariste->getScenariste();
        return view('vues/formManga', compact('genres', 'id_dessinateur', 'id_scenariste'));

    } catch (Exception $e) {
        $monErreur = $e->getMessage();
        return view('vues/error', compact('monErreur'));
    }
}
        public function saveManga(Manga $manga)
        {
            try {
                $manga->save();
            } catch (QueryException $e) {
                $erreur = $e->getMessage();
                throw new MonException($erreur, 5);
            }
        }
}

