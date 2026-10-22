<x-layout.app>
   <x-form :route="route('links.edit', $link)" put class="max-w-100.5 mx-auto w-full items-center"
      enctype="multipart/form-data" id="create-link-form">
      <x-title content="Editar link: {{$link->title}}" />
      <div class="flex flex-row gap-4 items-start w-full">
         <x-input name="title" label="Título do link" placeholder="Digite o nome do conteúdo"
            value="{{ old('title', $link->title) }}" />

         <fieldset class="fieldset w-full">
            <label class="label">Plataforma de streaming</label>
            <select class="select w-full" name="stream" value="{{ old("stream", $link->stream) }}">
               @foreach ($streams as $stream)
                  <option value="{{ $stream->value }}">{{ $stream->label() }}</option>
               @endforeach
            </select>

            @error("stream")
               <span class="text-error text-sm">{{ $message }}</span>
            @enderror
         </fieldset>
      </div>
      <x-input name="url" type="url" label="URL" placeholder="Cole a URL do conteúdo"
         value="{{ old('url', $link->url) }}" />


      <fieldset class="fieldset w-full">
         <legend class="fieldset-legend">Imagem</legend>
         <input name="image" type="file" class="file-input w-full" />

         @error("image")
            <span class="text-error text-sm">{{ $message }}</span>
         @enderror
      </fieldset>

      @if($message = session()->get("message"))
         <div role="alert" class="alert alert-error alert-soft w-full">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 stroke-current" fill="none"
               viewBox="0 0 24 24">
               <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span>{{ $message }}</span>
         </div>
      @endif

      <div class="w-full flex flex-row items-center justify-end gap-2">
         <a href="{{ route("homepage") }}">
            <button class="btn rounded-full" type="button">
               Voltar
            </button>
         </a>

         <button class="btn btn-active btn-primary rounded-full" type="submit" form="create-link-form">
            Salvar
         </button>
      </div>
   </x-form>
</x-layout.app>