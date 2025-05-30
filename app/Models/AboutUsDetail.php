<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutUsDetail extends Model
{
    use HasFactory;

    protected $fillable = ['company_name', 'company_description', 'image'];
}
