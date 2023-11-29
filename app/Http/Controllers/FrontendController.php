<?php

namespace App\Http\Controllers;

use App\Http\Repositories\HomepageRepository;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function getHomepage()
    {
        $content = HomepageRepository::getHomepageContent();
        $socials = HomepageRepository::getSocial();
        $localTime = HomepageRepository::getLocalTime();
        $projects = HomepageRepository::getAllProjects();

        return view('homepage', compact('socials', 'localTime', 'projects', 'content'));
    }

    public function getPageAbout()
    {
        $content = HomepageRepository::getHomepageContent();
        $socials = HomepageRepository::getSocial();
        $localTime = HomepageRepository::getLocalTime();

        return view('about', compact('content', 'socials', 'localTime'));
    }

    public function getPageWork()
    {
        $content = HomepageRepository::getHomepageContent();
        $socials = HomepageRepository::getSocial();
        $localTime = HomepageRepository::getLocalTime();
        $projects = HomepageRepository::getAllProjects();

        return view('work', compact('content', 'socials', 'localTime', 'projects'));
    }

    public function test()
    {
        return view('test');
    }
}
