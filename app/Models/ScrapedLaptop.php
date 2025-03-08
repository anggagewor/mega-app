<?php

namespace App\Models;

use Database\Factories\ScrapedLaptopFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 *
 *
 * @property int $id
 * @property string $url
 * @property string $status
 * @property Carbon|null $last_checked
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static ScrapedLaptopFactory factory($count = null, $state = [])
 * @method static Builder<static>|ScrapedLaptop newModelQuery()
 * @method static Builder<static>|ScrapedLaptop newQuery()
 * @method static Builder<static>|ScrapedLaptop query()
 * @method static Builder<static>|ScrapedLaptop whereCreatedAt($value)
 * @method static Builder<static>|ScrapedLaptop whereId($value)
 * @method static Builder<static>|ScrapedLaptop whereLastChecked($value)
 * @method static Builder<static>|ScrapedLaptop whereStatus($value)
 * @method static Builder<static>|ScrapedLaptop whereUpdatedAt($value)
 * @method static Builder<static>|ScrapedLaptop whereUrl($value)
 * @mixin Eloquent
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
