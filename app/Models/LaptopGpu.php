<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property-read \App\Models\LaptopModel|null $laptopModel
 * @method static \Database\Factories\LaptopGpuFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LaptopGpu newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LaptopGpu newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LaptopGpu query()
 * @property int $id
 * @property int $model_id
 * @property string|null $brand
 * @property string|null $model
 * @property string|null $vram
 * @property int|null $is_integrated
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LaptopGpu whereBrand($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LaptopGpu whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LaptopGpu whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LaptopGpu whereIsIntegrated($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LaptopGpu whereModel($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LaptopGpu whereModelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LaptopGpu whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LaptopGpu whereVram($value)
 * @mixin \Eloquent
 */
class LaptopGpu extends Model
{
    use HasFactory;
    protected $fillable = ['model_id', 'brand', 'model', 'vram', 'is_integrated'];
    public function laptopModel() {
        return $this->belongsTo(LaptopModel::class, 'model_id');
    }
}
