<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seguidores extends Model
{
    protected $fillable = ['id_company', 'data_face', 'data_insta', 'data_contatos_linkedin', 'data_youtube', 
    'data_seguidores', 'fans_face', 'seguidores_insta', 'contatos_linkedin', 'inscritos', 'seguidores_twitter'];

    public function company()
    {
        return $this->belongsTo(Company::class, 'id_company');
    }
}
