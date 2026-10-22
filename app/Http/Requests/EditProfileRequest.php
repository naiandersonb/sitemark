<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\UploadedFile;
use Illuminate\Validation\Rule;


/**
 * @property-read UploadedFile $photo
 */
class EditProfileRequest extends FormRequest
{
   /**
    * Determine if the user is authorized to make this request.
    */
   public function authorize(): bool
   {
      return true;
   }

   /**
    * Get the validation rules that apply to the request.
    *
    * @return array<string, ValidationRule|array<mixed>|string>
    */
   public function rules(): array
   {
      return [
         "name" => ["required", "min:3"],
         "lastename" => ["nullable"],
         "email" => ["required", "email", Rule::unique("users")->ignoreModel($this->user())],
         "bio" => ["nullable"],
         "photo" => ["nullable", "image"]
      ];
   }
}
