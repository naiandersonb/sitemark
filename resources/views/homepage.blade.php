<x-layout.app>
   <div class="flex flex-row items-center justify-between gap-4 w-full">
      <x-title content="Links" />

      <a href="{{ route("links.create") }}">
         <button class="btn rounded-full w-max text-primary">
            <i class="ph ph-plus-circle"></i>
            Adicionar link
         </button>
      </a>
   </div>

   <div class="w-full mt-10 flex flex-col gap-4 mb-20">
      @foreach (range(1, random_int(5, 20)) as $item)
         @php
            $variants = ["badge-primary", "badge-secondary", "badge-accent", "badge-info", "badge-success", "badge-warning"];
            $badgeClass = $variants[array_rand($variants)];
         @endphp

         <article class="flex flex-row items-center rounded-field gap-4 w-full p-4 bg-base-200">
            <div>
               <button class="btn btn-circle btn-dash size-8">
                  <i class="ph ph-arrow-up"></i>
               </button>
               <button class="btn btn-circle btn-dash size-8">
                  <i class="ph ph-arrow-down"></i>
               </button>
            </div>

            <div class="flex-1 min-w-0 flex flex-row items-center gap-2">
               <div class="flex-1 min-w-0">
                  <p class="text-neutral-50 font-medium">Anéis do poder
                     <span class="badge {{ $badgeClass }} text-xs">Prime video</span>
                  </p>

                  <p class="text-sm truncate text-neutral-400 mt-1">
                     https://www.primevideo.com/region/na/detail/amzn1.dv.gti.ffefa84e-6092-433b-9f8a-79c6dd7551ae
                  </p>
               </div>

               <div>
                  <button class="btn btn-ghost btn-circle">
                     <i class="ph ph-pencil-simple-line"></i>
                  </button>
                  <button class="btn btn-ghost btn-circle">
                     <i class="ph ph-trash"></i>
                  </button>
               </div>
            </div>
         </article>
      @endforeach

   </div>
</x-layout.app>