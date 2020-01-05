<?php

namespace App\Http\Controllers\Blog\Admin;

use App\Http\Requests\BlogCategoryCreateRequest;
use App\Http\Requests\BlogCategoryUpdateRequest;
use App\Models\BlogCategory;
use App\Repositories\BlogCategoryRepository;
use Illuminate\Http\Request;

class CategoryController extends BaseController
{
    /**
     * @var BlogCategoryRepository
     */
    private $blogCategoryRepository;
    
    /**
     * Construct.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

        $this->middleware('createSlug')->only('update', 'store');

        $this->blogCategoryRepository = app(BlogCategoryRepository::class);
        //$this->categoriesList = BlogCategory::all();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$categories = BlogCategory::paginate(5);
        $categories = $this->blogCategoryRepository->getAllWithPaginate(5);

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
        $categoriesList = $this->blogCategoryRepository->getForComboBox();

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
        $category = (new BlogCategory())->create($request->input());

        if($category){
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
    public function edit($id, BlogCategoryRepository $categoryRepository)
    {
        $category = $categoryRepository->getEdit($id);
        if(empty($category)){
            abort(404);
        }

        $categoriesList = $categoryRepository->getForComboBox();

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
        $categoryUpdate = $this->blogCategoryRepository->getEdit($id);
        
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
}