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
	public function getForSelectList($id = null)
	{
		$fields = implode(', ', [
			'id',
			'CONCAT (id, ". ", title) AS id_title'
		]);

		$result = $this->startConditions($id)::where('id', '!=', $id)
			->selectRaw($fields)
			->pluck('id_title', 'id');

		return $result;	
	}

	/**
	 * @return Collection
	 */
	public function getAllWithPaginate($perPage = null)
	{
		$fields = ['id', 'title', 'parent_id'];
		$result = $this->startConditions()
			->with(['parentCategory:id,title'])
			->paginate($perPage, $fields);

		return $result;
	}
}