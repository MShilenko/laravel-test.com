<?php

namespace App\Http\Controllers\Blog\Admin;

use App\Http\Requests\BlogCategoryUpdateRequest;
use App\Models\BlogCategory;
use Illuminate\Http\Request;

class CategoryController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = BlogCategory::paginate(5);

        return view('blog.admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categoryForEdit = BlogCategory::findOrFail($id);
        $categoriesListForEdeit = BlogCategory::all();

        return view('blog.admin.category.edit', compact('categoriesListForEdeit', 'categoryForEdit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BlogCategoryUpdateRequest $request, $id)
    {   

        $categoryUpdate = BlogCategory::find($id);

        if(empty($categoryUpdate)){
            return back(301)
                ->withErrors(['msg' => 'Запись id=[{$id}] не найдена'])
                ->withInput();
        }
        
        if($categoryUpdate->fill($request->all())->save()){
            return redirect()
                ->route('blog.admin.categories.edit', $categoryUpdate->id)
                ->with(['success' => 'Успешно сохранено']);
        }else{
            return back(301)
                ->withErrors(['msg' => 'Ошибка сохранения'])
                ->withInput();   
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy($id)
    // {
    //     //
    // }
}
