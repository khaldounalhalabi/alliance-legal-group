<?php

namespace App\Services;

use App\Models\BlogPost;
use App\Models\Category;
use App\Models\Service;
use App\Models\TeamMember;
use Illuminate\Support\Facades\Route;

class PageTitleResolver
{
    /**
     * Get the page title based on the current route
     * @return string
     */
    public function getTitle(): string
    {
        $routeName = Route::currentRouteName();
        $companyName = trans('site.company_name');

        // Map route names to their corresponding titles
        $titles = [
            'index' => $companyName,
            'about' => trans('site.about_us').' - '.$companyName,
            'contact' => trans('page_titles.contact').' - '.$companyName,
            'services.index' => trans('site.our_services').' - '.$companyName,
            'services.show' => $this->getServiceTitle().' - '.$companyName,
            'categories.show' => $this->getCategoryTitle().' - '.$companyName,
            'blog.posts' => trans('page_titles.blog').' - '.$companyName,
            'blog.posts.show' => $this->getBlogPostTitle().' - '.$companyName,
            'faqs' => trans('site.frequently_asked_questions').' - '.$companyName,
            'team.members.show' => $this->getTeamMemberTitle().' - '.$companyName,
        ];

        return $titles[$routeName] ?? $companyName;
    }

    /**
     * Get the service title from the current route
     * @return string
     */
    protected function getServiceTitle(): string
    {
        try {
            $serviceId = Route::current()->parameter('serviceId');
            $service = Service::findOrFail($serviceId);
            return $service->name->translate();
        } catch (\Exception $e) {
            return trans('page_titles.service_details');
        }
    }

    /**
     * Get the category title from the current route
     * @return string
     */
    protected function getCategoryTitle(): string
    {
        try {
            $categoryId = Route::current()->parameter('categoryId');
            $category = Category::findOrFail($categoryId);
            return $category->name->translate();
        } catch (\Exception $e) {
            return trans('page_titles.category_details');
        }
    }

    /**
     * Get the blog post title from the current route
     * @return string
     */
    protected function getBlogPostTitle(): string
    {
        try {
            $blogPostId = Route::current()->parameter('blogPostId');
            $blogPost = BlogPost::findOrFail($blogPostId);
            return $blogPost->title->translate();
        } catch (\Exception $e) {
            return trans('page_titles.blog_post');
        }
    }

    /**
     * Get the team member title from the current route
     * @return string
     */
    protected function getTeamMemberTitle(): string
    {
        try {
            $teamMemberId = Route::current()->parameter('teamMemberId');
            $member = TeamMember::findOrFail($teamMemberId);
            return $member->name->translate();
        } catch (\Exception $e) {
            return trans('page_titles.team_member');
        }
    }
}
