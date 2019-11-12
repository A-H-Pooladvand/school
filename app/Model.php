<?php

namespace App;

use App\Http\Helpers\Category\JEasyUi;
use App\Models\Model\Traits\Accessors;
use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Model extends Eloquent
{
    use Accessors;

    protected $guarded = ['id'];

    protected $appends = [
        'created_at_fa',
        'updated_at_fa',
    ];

    /**
     * Parent categories of static class.
     *
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public static function parentCategories()
   {
        return Category::with('children')
            ->orderBy('priority')
            ->where([
                'category_type' => static::class,
                'parent_id'     => null,
            ])->get();
    }

    /**
     * Tree categories of parent class.
     *
     * @return array
     */
    public static function treeCategories(): array
    {
        return JEasyUi::jsonFormat(self::parentCategories());
    }

    public function categories(): MorphToMany
    {
        return $this->morphToMany(Category::class, 'categorizable', 'categorizables');
    }

    /**
     * A model may morphed to many tags.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function tags(): MorphToMany
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }

    /**
     * @return mixed
     * @author Alipuor
     */
    public static function getCategories()
    {
        return Category::where([
            'category_type' => static::class,
        ])
            ->get(['id', 'title'])->toArray();
    }

    /**
     * Get all of the related galleries.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function galleries(): MorphMany
    {
        return $this->morphMany(Gallery::class, 'gallery');
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
