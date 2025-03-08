<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\LaptopModel> $models
 * @property-read int|null $models_count
 * @method static \Database\Factories\LaptopBrandFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LaptopBrand newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LaptopBrand newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LaptopBrand query()
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LaptopBrand whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LaptopBrand whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LaptopBrand whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LaptopBrand whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class LaptopBrand extends Model
{
    use HasFactory;
    protected $fillable = ['name'];
    public function models() {
        return $this->hasMany(LaptopModel::class, 'brand_id');
    }
}
