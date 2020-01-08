<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BlogCategory extends Model
{
	const ROOT = 1;

    use SoftDeletes;

    protected $fillable = [
    	'title',
    	'slug',
    	'parent_id',
    	'description'
    ];

    /**
     * @return BlogCategory
     */
    public function parentCategory(){
    	return $this->belongsTo(BlogCategory::class, 'parent_id', 'id');
    }

    /**
     * @return string
     */
    public function getParentTitleAttribute(){
    	$title = $this->parentCategory->title
    		?? ($this->isRoot() ? 'Корень' : '???');

    	return $title;	
    }

    /**
     * @return bool
     */
    public function isRoot(){
    	return $this->id === self::ROOT;
    }
}
