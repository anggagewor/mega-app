<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property string $url
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $last_checked
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\ScrapedLaptopFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ScrapedLaptop newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ScrapedLaptop newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ScrapedLaptop query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ScrapedLaptop whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ScrapedLaptop whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ScrapedLaptop whereLastChecked($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ScrapedLaptop whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ScrapedLaptop whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ScrapedLaptop whereUrl($value)
 * @mixin \Eloquent
 */
class ScrapedLaptop extends Model
{
    use HasFactory;

    protected $table = 'scraped_laptops';

    protected $fillable = ['url', 'status', 'last_checked'];

    protected $casts = [
        'last_checked' => 'datetime',
    ];
}
