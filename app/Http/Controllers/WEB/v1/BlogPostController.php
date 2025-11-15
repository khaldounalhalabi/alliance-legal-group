<?php

namespace App\Http\Controllers\WEB\v1;

use App\Http\Controllers\WebController;
use App\Http\Requests\v1\BlogPost\StoreUpdateBlogPostRequest;
use App\Http\Resources\v1\BlogPostResource;
use App\Models\BlogPost;
use App\Services\v1\BlogPost\BlogPostService;
use Exception;
use Illuminate\Http\Request;
use Inertia\Inertia;

class BlogPostController extends WebController
{
    private BlogPostService $blogPostService;

    public function __construct()
    {
        $this->blogPostService = BlogPostService::make();
        // place the relations you want to return them within the response
        $this->relations = [];
    }

    public function data()
    {
        $items = $this->blogPostService->indexWithPagination($this->relations);

        return rest()
            ->ok()
            ->getSuccess()
            ->data($items)
            ->send();
    }

    public function index()
    {
        $exportables = BlogPost::getModel()->exportable();

        return Inertia::render('dashboard/blog-posts/index', [
            'exportables' => $exportables,
        ]);
    }

    public function show($blogPostId)
    {
        $blogPost = $this->blogPostService->view($blogPostId, $this->relations);

        return Inertia::render('dashboard/blog-posts/show', [
            'blogPost' => BlogPostResource::make($blogPost),
        ]);
    }

    public function create()
    {
        return Inertia::render('dashboard/blog-posts/create');
    }

    public function store(StoreUpdateBlogPostRequest $request)
    {
        $blogPost = $this->blogPostService->store($request->validated(), $this->relations);
        if ($blogPost) {
            return redirect()
                ->route('v1.web.protected.blog.posts.index')
                ->with('success', trans('site.stored_successfully'));
        }

        return redirect()
            ->back()
            ->with('error', trans('site.something_went_wrong'));
    }

    public function edit($blogPostId)
    {
        $blogPost = $this->blogPostService->view($blogPostId, $this->relations);

        if (! $blogPost) {
            abort(404);
        }

        return Inertia::render('dashboard/blog-posts/edit', [
            'blogPost' => BlogPostResource::make($blogPost),
        ]);
    }

    public function update(StoreUpdateBlogPostRequest $request, $blogPostId)
    {
        $blogPost = $this->blogPostService->update($request->validated(), $blogPostId, $this->relations);
        if ($blogPost) {
            return redirect()
                ->route('v1.web.protected.blog.posts.index')
                ->with('success', trans('site.update_successfully'));
        }

        return redirect()
            ->back()
            ->with('error', trans('site.there_is_no_data'));
    }

    public function destroy($blogPostId)
    {
        $result = $this->blogPostService->delete($blogPostId);

        return rest()
            ->when(
                $result,
                fn($rest) => $rest->ok()->deleteSuccess(),
                fn($rest) => $rest->noData(),
            )->send();
    }
}
