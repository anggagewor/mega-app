<?php

namespace App\Models;

use Database\Factories\LaptopBrandFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * 
 *
 * @property-read Collection<int, LaptopModel> $models
 * @property-read int|null $models_count
 * @method static LaptopBrandFactory factory($count = null, $state = [])
 * @method static Builder<static>|LaptopBrand newModelQuery()
 * @method static Builder<static>|LaptopBrand newQuery()
 * @method static Builder<static>|LaptopBrand query()
 * @property int $id
 * @property string $name
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder<static>|LaptopBrand whereCreatedAt($value)
 * @method static Builder<static>|LaptopBrand whereId($value)
 * @method static Builder<static>|LaptopBrand whereName($value)
 * @method static Builder<static>|LaptopBrand whereUpdatedAt($value)
 * @mixin Eloquent
 */
class LaptopBrand extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function models()
    {
        return $this->hasMany(LaptopModel::class, 'brand_id');
    }
}
