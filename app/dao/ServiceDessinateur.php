<?php

namespace App\dao;

use App\Models\Dessinateur;

class ServiceDessinateur
{
    public function getDessinateurs()
    {
        try {
            return Dessinateur::all();
        } catch (QueryException $e) {
            throw new MonException($e->getMessage(), 5);
        }
    }

}
