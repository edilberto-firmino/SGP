<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alimentacao extends Model
{
    use HasFactory;
    
    protected $table = 'alimentacoes'; 


    protected $fillable = ['data', 'descricao', 'calorias'];
}
