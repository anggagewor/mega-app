<?php

namespace App\Models;

use Database\Factories\LaptopModelGalleryFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * 
 *
 * @property int $id
 * @property int $laptop_model_id
 * @property string $image_url
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read LaptopModel $laptopModel
 * @method static LaptopModelGalleryFactory factory($count = null, $state = [])
 * @method static Builder<static>|LaptopModelGallery newModelQuery()
 * @method static Builder<static>|LaptopModelGallery newQuery()
 * @method static Builder<static>|LaptopModelGallery query()
 * @method static Builder<static>|LaptopModelGallery whereCreatedAt($value)
 * @method static Builder<static>|LaptopModelGallery whereId($value)
 * @method static Builder<static>|LaptopModelGallery whereImageUrl($value)
 * @method static Builder<static>|LaptopModelGallery whereLaptopModelId($value)
 * @method static Builder<static>|LaptopModelGallery whereUpdatedAt($value)
 * @mixin Eloquent
 */
class LaptopModelGallery extends Model
{
    use HasFactory;

    protected $fillable = ['laptop_model_id', 'image_url'];

    public function laptopModel()
    {
        return $this->belongsTo(LaptopModel::class);
    }
}

