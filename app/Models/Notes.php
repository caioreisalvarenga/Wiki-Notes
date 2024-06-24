<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notes extends Model

{
    protected $table = 'notes_wiki';

    protected $fillable = ['nome', 'data', 'imagem', 'descricao'];
}