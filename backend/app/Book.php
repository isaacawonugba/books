<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Book extends Model 
{
   
    protected $fillable = [
       'book_title', 'book_description', 'book_author', 'book_cover', 'book_price', 'book_status'
    ];

   
}
