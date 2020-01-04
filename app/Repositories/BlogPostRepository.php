<?php

namespace App\Repositories;

use App\Models\BlogPost as Model;
use Illuminate\Database\Eloquent\Collection;


class BlogPostRepository extends CoreRepository
{
	/**
	 * @return string
	 */
	protected function getModelClass(){
		return Model::class;
	}

	/**
	 * @return Collection
	 */
	public function getAllWithPaginate($perPage = null)
	{
		$fields = [
			'id',
			'title',
			'slug',
			'is_published',
			'published_at',
			'user_id',
			'category_id'
		];
		
		$result = $this->startConditions()
		->orderBy('id', 'DESC')
		->with(['category:id,title', 'user:id,name'])
		->paginate($perPage, $fields);

		return $result;
	}
}