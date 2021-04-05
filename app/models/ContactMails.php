<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class ContactMails extends Model
{
    protected $table = 'contact_mails';

    protected $fillable = [
        'subject_en',
        'subject_ar',
        'email',
    ];
}
