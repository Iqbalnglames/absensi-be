<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employer extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $primaryKey = 'cust_id';
    public $incerement = false;
    protected static function boot ()
    {
        parent::boot();

        static::creating(function ($model){
            $model->cust_id = random_int(1,999999);
        });
    }
    public function mapels()
    {
        return $this->belongsToMany(Mapel::class, 'employer_lesson');
    }
}
