<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisaMaster extends Model
{
    use HasFactory;

    protected $table = 'invoice_master';

    protected $primaryKey = "InvoiceMasterID";

    public $timestamps = false;


    protected $fillable = [
        'InvoiceTypeID',
        'Date',
        'DueDate',
        'PartyID',
        'GroupNo',
        'Total',
    ];
}
