<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExampleRegister extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function ennovator()
    {
        return $this->belongsTo(EnovatorSource::class, 'ennovator_source', 'id')->select('id', 'name');
    }
    public function degree()
    {
        return $this->belongsTo(Degree::class, 'typeof_degree', 'id')->select('id', 'name');
    }

}
