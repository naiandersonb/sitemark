@props(["label", "name", "value" => null])

<fieldset class="fieldset w-full">
   <label class="label" for="{{ $name }}">{{ $label }}</label>
   <input {{ $attributes->class(["input w-full"]) }} id="{{ $name }}" name="{{ $name }}" value="{{ $value }}" />

   @error($name)
      <span class="text-error text-sm">{{ $message }}</span>
   @enderror
</fieldset>