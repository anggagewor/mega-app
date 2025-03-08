<?php

namespace App\Models;

use Database\Factories\LaptopModelFeatureFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 *
 *
 * @property int $id
 * @property int $laptop_model_id
 * @property string $feature_name
 * @property string $feature_value
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read LaptopModel $laptopModel
 * @method static LaptopModelFeatureFactory factory($count = null, $state = [])
 * @method static Builder<static>|LaptopModelFeature newModelQuery()
 * @method static Builder<static>|LaptopModelFeature newQuery()
 * @method static Builder<static>|LaptopModelFeature query()
 * @method static Builder<static>|LaptopModelFeature whereCreatedAt($value)
 * @method static Builder<static>|LaptopModelFeature whereFeatureName($value)
 * @method static Builder<static>|LaptopModelFeature whereFeatureValue($value)
 * @method static Builder<static>|LaptopModelFeature whereId($value)
 * @method static Builder<static>|LaptopModelFeature whereLaptopModelId($value)
 * @method static Builder<static>|LaptopModelFeature whereUpdatedAt($value)
 * @mixin Eloquent
 */
class LaptopModelFeature extends Model
{
    use HasFactory;

    protected $fillable = ['laptop_model_id', 'feature_name', 'feature_value'];

    public function laptopModel(): BelongsTo
    {
        return $this->belongsTo(LaptopModel::class);
    }
}

