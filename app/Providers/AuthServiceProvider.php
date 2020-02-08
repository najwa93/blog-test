<?php

namespace App\Providers;

use App\Models\Comment;
use App\Models\Section;
use App\Policies\Comment_po;
use App\Policies\Section_po;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
        Section::class => Section_po::class,
        Comment::class => Comment_po::class
    ];

    /**
     * Auth any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
