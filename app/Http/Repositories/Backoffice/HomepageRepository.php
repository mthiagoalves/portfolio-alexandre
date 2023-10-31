<?php

namespace App\Http\Repositories\Backoffice;

use App\Models\Homepage;
use App\Models\Socials;
use App\Traits\HttpResponses;
use Illuminate\Support\Facades\Validator;

class HomepageRepository
{
    use HttpResponses;

    public static function changeInitialBanner($dataImages)
    {
        $validator = Validator::make($dataImages, [
            'banner-desktop' => 'image|max:4500',
            'banner-mobile' => 'image|max:4500'
        ]);

        if ($validator->fails()) {
            return HttpResponses::error('Data invalid', 422, $validator->errors());
        }

        $ambienceImages = [
            [
                'inputName' => 'banner-desktop',
                'fileName' => 'banner-initial.png',
                'folder' => 'img/homepage/',
            ],
            [
                'inputName' => 'banner-mobile',
                'fileName' => 'banner-initial-m.png',
                'folder' => 'img/homepage/',
            ],
        ];

        foreach ($ambienceImages as $image) {
            if (isset($dataImages[$image['inputName']]) && $dataImages[$image['inputName']]->isValid()) {
                $path = $dataImages[$image['inputName']];
                $path->move($image['folder'], $image['fileName']);
            }
        }
        return HttpResponses::success('Banner has been updated', 200);
    }

    public static function updateOccupation($data)
    {
        $validator = Validator::make($data, [
            'occupation' => 'string:150'
        ]);

        if ($validator->fails()) {
            return HttpResponses::error('Data invalid', 422, $validator->errors());
        }

        $occupation = Homepage::first();

        $occupation->update([
            'occupation' => $validator->validated()['occupation']
        ]);

        if ($occupation) {
            return HttpResponses::success('Occupation has been updated', 200);
        }

        return HttpResponses::error('Something wrong to updated occupation', 400);
    }

    public static function updateFirstText($data)
    {
        $validator = Validator::make($data, [
            'first-text' => 'string'
        ]);

        if ($validator->fails()) {
            return HttpResponses::error('Data invalid', 422, $validator->errors());
        }

        $firstText = Homepage::first();

        $firstText->update([
            'first_text' => $validator->validated()['first-text']
        ]);

        if ($firstText) {
            return HttpResponses::success('First text has been updated', 200);
        }

        return HttpResponses::error('Something wrong to updated text', 400);
    }

    public static function updateSecondText($data)
    {
        $validator = Validator::make($data, [
            'second-text' => 'string'
        ]);

        if ($validator->fails()) {
            return HttpResponses::error('Data invalid', 422, $validator->errors());
        }

        $secondText = Homepage::first();

        $secondText->update([
            'second_text' => $validator->validated()['second-text']
        ]);

        if ($secondText) {
            return HttpResponses::success('Second text has been updated', 200);
        }

        return HttpResponses::error('Something wrong to updated text', 400);
    }

    public static function updateTextFooter($data)
    {
        $validator = Validator::make($data, [
            'text-footer' => 'string'
        ]);

        if ($validator->fails()) {
            return HttpResponses::error('Data invalid', 422, $validator->errors());
        }

        $secondText = Homepage::first();

        $secondText->update([
            'text_footer' => $validator->validated()['text-footer']
        ]);

        if ($secondText) {
            return HttpResponses::success('Footer text has been updated', 200);
        }

        return HttpResponses::error('Something wrong to updated text', 400);
    }

    public static function updateEmail($data)
    {
        $validator = Validator::make($data, [
            'email' => 'string:150'
        ]);

        if ($validator->fails()) {
            return HttpResponses::error('Data invalid', 422, $validator->errors());
        }

        $secondText = Homepage::first();

        $secondText->update([
            'email' => $validator->validated()['email']
        ]);

        if ($secondText) {
            return HttpResponses::success('Email has been updated', 200);
        }

        return HttpResponses::error('Something wrong to updated text', 400);
    }

    public static function updatePhone($data)
    {
        $validator = Validator::make($data, [
            'phone' => 'string:50'
        ]);

        if ($validator->fails()) {
            return HttpResponses::error('Data invalid', 422, $validator->errors());
        }

        $secondText = Homepage::first();

        $secondText->update([
            'phone' => $validator->validated()['phone']
        ]);

        if ($secondText) {
            return HttpResponses::success('Phone number has been updated', 200);
        }

        return HttpResponses::error('Something wrong to updated text', 400);
    }

    public static function addNewSocial($data)
    {
        $validator = Validator::make($data, [
            'social-name' => 'string:100',
            'link-social' => 'string'
        ]);

        if ($validator->fails()) {
            return HttpResponses::error('Data invalid', 422, $validator->errors());
        }

        $socials = Socials::create([
            'social_name' => $validator->validated()['social-name'],
            'link' => $validator->validated()['link-social']
        ]);

        if ($socials) {
            return HttpResponses::success('Social media add successfully', 200);
        }

        return HttpResponses::error('Something wrong to add social', 400);
    }

    public static function updateSocial($data, $socialId)
    {
        dd($data);
        $validator = Validator::make($data, [
            'social-name' => 'string:100',
            'link-social' => 'string'
        ]);

        if ($validator->fails()) {
            return HttpResponses::error('Data invalid', 422, $validator->errors());
        }

        $social = Socials::where('id', $socialId)->update([
            'social_name' => $validator->validated()['social-name'],
            'link' => $validator->validated()['link-social']
        ]);

        if ($social) {
            return HttpResponses::success('Social media update successfully', 200);
        }

        return HttpResponses::error('Something wrong to update social', 400);
    }
}
