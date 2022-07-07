<?php

namespace App\Http\Controllers;

use App\Classes\Factories\LanguageFactory;
use App\Classes\Helper\TextHelper;
use App\Classes\Requests\TranslationRequest;
use App\Classes\Services\LanguageService;
use App\Classes\Services\TranslationService;

class ApiController extends Controller
{
    private LanguageService $languageService;
    private TranslationService $translationService;

    public function __construct()
    {
        $this->languageService = new LanguageService(config('language'));
        $this->translationService = new TranslationService(new LanguageFactory());
    }

    public function translate(TranslationRequest $request)
    {
        $text = new TextHelper($request->text);
        $source = $request->has('source') ?
            $this->translationService->validateSource($request->source, $text) ? $request->source : false :
            $this->translationService->detectSource($text);

        //TODO: split detection and translation

        if(!empty($source))
        {
            $output = $this->translationService->translate(
                $request->target,
                $text,
                $request->has('is_drunk') && $request->is_drunk == true
            );
            $status = 200;
        }
        else
        {
            $output = $request->has('source') ? trans('messages.language_mismatch') : trans('messages.language_not_recognized');
            $status = 400;
        }

        return response(compact('source', 'output'), $status);
    }

    public function languages()
    {
        return $this->languageService->getLanguagesWithMatches();
    }
}
