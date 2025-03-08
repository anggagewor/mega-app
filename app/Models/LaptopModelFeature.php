<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property int $laptop_model_id
 * @property string $feature_name
 * @property string $feature_value
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\LaptopModel $laptopModel
 * @method static \Database\Factories\LaptopModelFeatureFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LaptopModelFeature newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LaptopModelFeature newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LaptopModelFeature query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LaptopModelFeature whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LaptopModelFeature whereFeatureName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LaptopModelFeature whereFeatureValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LaptopModelFeature whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LaptopModelFeature whereLaptopModelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LaptopModelFeature whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class LaptopModelFeature extends Model
{
    use HasFactory;

    protected $fillable = ['laptop_model_id', 'feature_name', 'feature_value'];

    public function laptopModel(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(LaptopModel::class);
    }
}

