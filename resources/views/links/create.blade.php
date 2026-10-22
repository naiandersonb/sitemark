<x-layout.app>
   <x-form :route="route('links.create')" post class="max-w-100.5 mx-auto w-full items-center"
      enctype="multipart/form-data">
      <x-title content="Adicionar link" />
      <div class="flex flex-row gap-4 items-center w-full">
         <x-input name="title" label="Título do link" placeholder="Digite o nome do conteúdo" />

         <fieldset class="fieldset w-full">
            <label class="label">Plataforma de streaming</label>
            <select class="select w-full" name="stream">
               @foreach ($streams as $stream)
                  <option value="{{ $stream->value }}">{{ $stream->label() }}</option>
               @endforeach
            </select>
         </fieldset>
      </div>
      <x-input name="url" type="url" label="URL" placeholder="Cole a URL do conteúdo" />


      <fieldset class="fieldset w-full">
         <legend class="fieldset-legend">Imagem</legend>
         <input name="image" type="file" class="file-input w-full" />
      </fieldset>


      <div class="w-full flex flex-row items-center justify-end gap-2">
         <a href="{{ route("homepage") }}">
            <button class="btn rounded-full" type="button">
               Voltar
            </button>
         </a>
         <button class="btn btn-active btn-primary rounded-full">
            Salvar
         </button>
      </div>
   </x-form>
</x-layout.app>