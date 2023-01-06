<?php

namespace App\Http\Controllers;

use App\Http\Requests\TranslateRequest;
use Stevebauman\Location\Facades\Location;
use Stichoza\GoogleTranslate\GoogleTranslate;

class LangController extends Controller
{
    /**
     * @param \App\Http\Requests\TranslateRequest $request
     * @return array
     * @throws \ErrorException
     */
    public function translate(TranslateRequest $request)
    {
        $tr = new GoogleTranslate(); // Translates to 'en' from auto-detected language by default
        //check location
        if ($position = Location::get('103.161.172.167')) {
            // Successfully retrieved position.
            $data['location'] = $position->countryName;
        } else {
            // Failed retrieving position.
        }
        //translate
        $data['translation'] = $tr->setSource($request->get('lang_in'))
                                  ->setTarget($request->get('lang_out'))
                                  ->translate($request->get('content'));

        return $data;
    }
}
