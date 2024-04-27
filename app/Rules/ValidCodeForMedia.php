<?php

namespace App\Rules;

use App\Models\MediaPlatform;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ValidCodeForMedia implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if(!MediaPlatform::where('media_platform_code', $value)->exists()){
            $fail("Votre Code de Media n'est pas valide!");
        }
    }
}
