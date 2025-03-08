<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property int $laptop_model_id
 * @property string $image_url
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\LaptopModel $laptopModel
 * @method static \Database\Factories\LaptopModelGalleryFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LaptopModelGallery newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LaptopModelGallery newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LaptopModelGallery query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LaptopModelGallery whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LaptopModelGallery whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LaptopModelGallery whereImageUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LaptopModelGallery whereLaptopModelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LaptopModelGallery whereUpdatedAt($value)
 * @mixin \Eloquent
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

