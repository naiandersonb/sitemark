@props(["content"])

<div class="w-full">
   <p {{ $attributes->class(["card-title text-neutral-100"]) }}>{{ $content }}</p>
   <div class="h-1 w-6 bg-primary"></div>
</div>