<?php

namespace App\Http\Controllers\Blog\Admin;

use App\Http\Requests\BlogCategoryCreateRequest;
use App\Http\Requests\BlogCategoryUpdateRequest;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends BaseController
{
    /**
     * Construct.
     *
     * @return void
     */
    public function __construct()
    {
        $this->categoriesList = BlogCategory::all();
    }
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
        $category = new BlogCategory();
        $categoriesList = $this->categoriesList;

        return view('blog.admin.category.edit', compact('categoriesList', 'category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlogCategoryCreateRequest $request)
    {
        $dataForStore = $request->input();
        $category = new BlogCategory();

        if(empty($dataForStore['slug'])){
            $dataForStore['slug'] = Str::slug($dataForStore['title']);
        }

        if(($category)->create($dataForStore)){
            return redirect()
                ->route('blog.admin.categories.edit', [$category->id])
                ->with(['success' => 'Успешно сохранено']);
        }else{
            return back(301)
                ->withErrors(['msg' => 'Ошибка сохранения'])
                ->withInput();   
        }
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
        $category = BlogCategory::findOrFail($id);
        $categoriesList = $this->categoriesList;

        return view('blog.admin.category.edit', compact('categoriesList', 'category'));
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

        if(empty($categoryUpdate['slug'])){
            $categoryUpdate['slug'] = Str::slug($categoryUpdate['title']);
        }

        if(empty($categoryUpdate)){
            return back(301)
                ->withErrors(['msg' => 'Запись id=[{$id}] не найдена'])
                ->withInput();
        }
        
        if($categoryUpdate->update($request->all())){
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
