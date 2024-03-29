<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomPage extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'slug', 'seo_title', 'content', 'meta_description', 'meta_keywords', 'active', 'account_id'
    ];

    public function account(){
        return $this->belongsTo(Account::class);
    }
}
