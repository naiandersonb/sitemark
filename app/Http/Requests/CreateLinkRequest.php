<?php

namespace App\Http\Requests;

use App\Stream;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\UploadedFile;
use Illuminate\Validation\Rule;

/**
 * @property-read UploadedFile $image
 */
class CreateLinkRequest extends FormRequest
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
         "title" => ["required"],
         "stream" => ["required", Rule::enum(Stream::class)],
         "url" => ["required", "url"],
         "image" => ["nullable", "image"]
      ];
   }
}
