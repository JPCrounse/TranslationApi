<?php

namespace App\Classes\Requests;

use App\Classes\Services\LanguageService;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TranslationRequest extends FormRequest
{
    public function rules(): array
    {
        $service = new LanguageService(config('language'));
        return [
            'target' => ['required', Rule::in($service->getOutputLanguages())],
            'source' => [Rule::in($service->getInputLanguages())],
            'text' => 'required'
        ];
    }
}
