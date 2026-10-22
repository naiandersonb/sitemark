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
      @isset($links)
         @foreach ($links as $item)
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
                  <div class="avatar avatar-placeholder">
                     <div class="mask mask-squircle w-12 relative bg-primary/15 text-primary">
                        <span class="text-xl">{{ mb_strtoupper(mb_substr($item->title, 0, 1)) }}</span>
                        @if($item->image)
                           <img src="{{ Storage::url($item->image) }}" alt="imagem do link" class="absolute inset-0"
                              onerror="this.remove()" />
                        @endif
                     </div>
                  </div>
                  <div class="flex-1 min-w-0">
                     <p class="text-neutral-50 font-medium">{{$item->title}}
                        <span class="badge {{ $badgeClass }} text-xs">{{ $item->stream->label() }}</span>
                     </p>

                     <p class="text-sm truncate text-neutral-400 mt-1">
                        {{ $item->url }}
                     </p>
                  </div>

                  <div>
                     <button class="btn btn-ghost btn-circle">
                        <i class="ph ph-pencil-simple-line"></i>
                     </button>

                     {{-- <x-form delete :route="route('links.destroy', $item)">
                        <button class="btn btn-ghost btn-circle"
                           onsubmit="return confirm('Tem certeza que quer remover o link?')">
                           <i class="ph ph-trash"></i>
                        </button>
                     </x-form> --}}

                  </div>
               </div>
            </article>
         @endforeach
      @endisset


   </div>
</x-layout.app>