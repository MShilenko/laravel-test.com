<?php

namespace App\Http\Controllers\Blog\Admin;

use App\Http\Requests\BlogPostCreateRequest;
use App\Http\Requests\BlogPostUpdateRequest;
use App\Jobs\BlogPostAfterCreateJob;
use App\Jobs\BlogPostAfterDeleteJob;
use App\Models\BlogPost;
use App\Repositories\BlogCategoryRepository;
use App\Repositories\BlogPostRepository;
use Illuminate\Http\Request;

class PostController extends BaseController
{
    /**
     * @var BlogPostRepository
     */
    private $blogPostRepository;
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

        $this->middleware(['createSlug'])->only('update', 'store');

        $this->blogPostRepository = app(BlogPostRepository::class);
        $this->blogCategoryRepository = app(BlogCategoryRepository::class);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = $this->blogPostRepository->getAllWithPaginate(25);

        return view('blog.admin.posts.index', compact('posts'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $post = new BlogPost();
        //$categoriesList = $this->blogCategoryRepository->getForComboBox();
        $categoriesList = $this->blogCategoryRepository->getForSelectList();

        return view('blog.admin.posts.edit', compact('categoriesList', 'post'));   
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlogPostCreateRequest $request)
    {        
        $post = (new BlogPost())->create($request->input());

        if($post){
            BlogPostAfterCreateJob::dispatch($post);

            return redirect()
                ->route('blog.admin.posts.edit', [$post->id])
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
        $post = $this->blogPostRepository->getEdit($id);
        if(empty($post)){
            abort(404);
        }

        //$categoriesList = $this->blogCategoryRepository->getForComboBox();
        $categoriesList = $this->blogCategoryRepository->getForSelectList();

        return view('blog.admin.posts.edit', compact('categoriesList', 'post'));       
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Requests\BlogPostUpdateRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BlogPostUpdateRequest $request, $id)
    {   
        $postUpdate = $this->blogPostRepository->getEdit($id);
        
        if(empty($postUpdate)){
            return back(301)
                ->withErrors(['msg' => 'Запись id=[{$id}] не найдена'])
                ->withInput();
        }
        
        if($postUpdate->update($request->all())){
            return redirect()
                ->route('blog.admin.posts.edit', $postUpdate->id)
                ->with(['success' => 'Успешно сохранено']);
        }else{
            return back(301)
                ->withErrors(['msg' => 'Ошибка сохранения'])
                ->withInput();   
        }
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        if(BlogPost::destroy($id)){
            BlogPostAfterDeleteJob::dispatch($id);

            return redirect()
                ->route('blog.admin.posts.index')
                ->with(['success' => "Запись id[$id] удалена"]);
        }else{
            return back()->withErrors(['msg' => 'Ошибка удаления']);
        }
    }
}
