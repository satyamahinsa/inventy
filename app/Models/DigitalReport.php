<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DigitalReport extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'type', 'total_sales', 'products_sold', 'total_customers', 'total_orders'];
}
