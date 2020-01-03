<?php

namespace App\Repositories;

use App\Models\BlogCategory as Model;
use Illuminate\Database\Eloquent\Collection;


class BlogCategoryRepository extends CoreRepository
{
	/**
	 * @return string
	 */
	protected function getModelClass(){
		return Model::class;
	}

	/**
	 * Get model for admin edit
	 * @param  int $id
	 * @return Model
	 */
	public function getEdit($id)
	{
		return $this->startConditions()->find($id);
	}

	/**
	 * @return Collection
	 */
	public function getForComboBox()
	{
		// return $this->startConditions()->all();
		$fields = implode(', ', [
			'id',
			'CONCAT (id, ". ", title) AS id_title'
		]);

		$result = $this->startConditions()
			->selectRaw($fields)	
			->toBase()
			->get();

		return $result;	
	}

	/**
	 * @return Collection
	 */
	public function getAllWithPaginate($perPage = null)
	{
		$fields = ['id', 'title', 'parent_id'];
		$result = $this->startConditions()->paginate($perPage, $fields);

		return $result;
	}
}