@props(["route", "post" => null, "put" => null, "delete" => null])

@php
   $method = $post || $put || $delete ? "post" : "get"
@endphp

<form {{ $attributes->class(["flex flex-col gap-4"]) }} action="{{ $route }}" method={{ $method }}>
   @csrf
   @if($put)
      @method("put")
   @endif

   @if($delete)
      @method("delete")
   @endif

   {{ $slot }}
</form>
