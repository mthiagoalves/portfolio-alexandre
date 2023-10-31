<?php

namespace App\Http\Controllers;

use App\Http\Repositories\Backoffice\HomepageRepository;
use Illuminate\Http\Request;

class BackofficeController extends Controller
{
    public function getDashboard()
    {
        return view('backoffice.dashboard');
    }
    public function getHomepage()
    {
        return view('backoffice.homepage');
    }
    public function getProjects()
    {
        return view('backoffice.projects');
    }
    public function getWorks()
    {
        return view('backoffice.works');
    }
    public function getAbout()
    {
        return view('backoffice.about');
    }

    public function changeInitialBanner(Request $request)
    {
        $dataImages = $request->all();

        return HomepageRepository::changeInitialBanner($dataImages);
    }

    public function updateOccupation(Request $request)
    {
        $data = $request->all();

        return HomepageRepository::updateOccupation($data);
    }

    public function updateFirstText(Request $request)
    {
        $data = $request->all();

        return HomepageRepository::updateFirstText($data);
    }

    public function updateSecondText(Request $request)
    {
        $data = $request->all();

        return HomepageRepository::updateSecondText($data);
    }

    public function updateTextFooter(Request $request)
    {
        $data = $request->all();

        return HomepageRepository::updateTextFooter($data);
    }

    public function updateEmail(Request $request)
    {
        $data = $request->all();

        return HomepageRepository::updateEmail($data);
    }

    public function updatePhone(Request $request)
    {
        $data = $request->all();

        return HomepageRepository::updatePhone($data);
    }

    public function addNewSocial(Request $request)
    {
        $data = $request->all();

        return HomepageRepository::addNewSocial($data);
    }

    public function updateSocial(Request $request, $socialId)
    {
        $data = $request->all();

        return HomepageRepository::updateSocial($data, $socialId);
    }
}
