<?php

namespace App\Observers;

use App\Models\BlogPost;
use Carbon\Carbon;
use Illuminate\Support\Str;

class BlogPostObserver
{
    const PUBLISHED = 1;
    const NOT_PUBLISHED = 0;

    /**
     * Handle the models blog post "creating" event.
     *
     * @param  \App\BlogPost  $blogPost
     * @return void
     */
    public function creating(BlogPost $blogPost)
    {
        $this->setPublishedAt($blogPost);
        $this->setHtml($blogPost);
       // $this->setUser($blogPost);
    }

    /**
     * Handle the models blog post "created" event.
     *
     * @param  \App\BlogPost  $blogPost
     * @return void
     */
    public function created(BlogPost $blogPost)
    {
        //
    }

    /**
     * Handle the models blog post "updating" event.
     *
     * @param  \App\BlogPost  $blogPost
     * @return void
     */
    public function updating(BlogPost $blogPost)
    {
        $this->setPublishedAt($blogPost);
        //$this->setSlug($blogPost);
    }

    /**
     * Handle the models blog post "updated" event.
     *
     * @param  \App\BlogPost  $blogPost
     * @return void
     */
    public function updated(BlogPost $blogPost)
    {
        //
    }

    /**
     * Handle the models blog post "deleted" event.
     *
     * @param  \App\BlogPost  $blogPost
     * @return void
     */
    public function deleted(BlogPost $blogPost)
    {
        //
    }

    /**
     * Handle the models blog post "restored" event.
     *
     * @param  \App\BlogPost  $blogPost
     * @return void
     */
    public function restored(BlogPost $blogPost)
    {
        //
    }

    /**
     * Handle the models blog post "force deleted" event.
     *
     * @param  \App\BlogPost  $blogPost
     * @return void
     */
    public function forceDeleted(BlogPost $blogPost)
    {
        //
    }

    /**
     * @param  \App\BlogPost  $blogPost
     */
    protected function setPublishedAt(BlogPost $blogPost){
        if($blogPost->isDirty('is_published') 
            && $blogPost->getOriginal('is_published') == self::NOT_PUBLISHED 
            && $blogPost->is_published == self::PUBLISHED){
            $blogPost->published_at = Carbon::now();
        }
    }
    
    /**
     * @param  \App\BlogPost  $blogPost
     */
    protected function setHtml(BlogPost $blogPost){
        if($blogPost->isDirty('content_raw')){
            // TODO: Генерация mardown->html
            $blogPost->content_html = $blogPost->content_raw;
        }
    }

    /**
     * @param  \App\BlogPost  $blogPost
     */
    protected function setUser(BlogPost $blogPost){
        $blogPost->user_id = auth()->id() ?? BlogPost::UNKNOWN_USER;
    }

    /**
     * @param  \App\BlogPost  $blogPost
     */
    /*protected function setSlug($blogPost){
        if(empty($blogPost->slug)){
            $blogPost->slug = Str::slug($blogPost->title);
        }
    }*/
}
