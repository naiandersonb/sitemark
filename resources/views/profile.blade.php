<x-layout.app>
   <section class="flex flex-row gap-4 justify-between w-full items-center">

      <x-title content="Perfil" />

      <div class="flex flex-row items-center gap-4">
         <a href="{{ route("homepage") }}">
            <button class="btn rounded-full">Voltar</button>
         </a>

         <button class="btn btn-primary rounded-full" form="edit-profile-form">Salvar</button>
      </div>
   </section>

   <section class="flex flex-row gap-4 items-start mt-10">
      <div class="flex-1 flex flex-col gap-4 items-center">
         <x-form class="w-full" :route="route('edit.profile')" put id="edit-profile-form" enctype="multipart/form-data">
            <div class="flex flex-row gap-2 items-center">
               <x-input label="Nome" name="name" value="{{ old('name', $user->name) }}" />
               <x-input label="Sobrenome" name="lastname" value="{{ old('lastname', $user->lastname) }}" />
            </div>

            <x-input label="E-mail" name="email" value="{{ old('email', $user->email) }}" />


            <fieldset class="fieldset w-full">
               <label class="label">Bio</label>
               <textarea name="bio" class="textarea h-24 w-full">{{ old('bio', $user->bio) }}</textarea>
            </fieldset>

            <fieldset class="fieldset">
               <label class="label">Foto de perfil</label>
               <input name="photo" type="file" class="file-input" />

               @error("photo")
                  <span class="text-error text-sm">{{ $message }}</span>
               @enderror
            </fieldset>
         </x-form>
      </div>

      <div class="divider divider-horizontal"></div>

      <div>
         <label class="label mb-2 block">Foto de perfil</label>
         <div class="avatar avatar-placeholder">
            <div class="mask mask-squircle size-24 bg-base-100 text-primary">
               <span class="text-lg">{{ mb_strtoupper(mb_substr($user->name, 0, 1)) }}</span>
               @if($user->photo)
                  <img src="{{ Storage::url($user->photo) }}" alt="imagem do link" class="absolute inset-0"
                     onerror="this.remove()" />
               @endif
            </div>
         </div>
      </div>


   </section>
</x-layout.app>