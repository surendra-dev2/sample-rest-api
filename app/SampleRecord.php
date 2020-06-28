<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SampleRecord extends Model
{
    protected $table = 'sample_record';
    protected $primaryKey = 'email';
    public $incrementing = false;
    public $timestamps = false;
}
