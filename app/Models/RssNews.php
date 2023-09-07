<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RssNews extends Model
{
    use HasFactory;
    protected $table = 'rssnews';

    protected $fillable = ['title','link','description','pubDate','author','category'];
}
