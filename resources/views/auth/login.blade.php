<x-layout.guest>


   <section class="flex flex-row gap-4 items-center h-screen">
      <div class="flex-1 relative h-full p-8 hidden md:inline">
         <img class="h-full" src="{{ asset('images/background.svg') }}" alt="background">

      </div>

      <div class="flex-1 flex flex-col items-center justify-center gap-12 p-8 h-full">
         <img src="{{ asset('images/logo.svg') }}" alt="background">

         <x-form :route="route('login')" post class="max-w-100.5 w-full items-center">
            <x-title content="Acessar conta" />

            <x-input name="email" placeholder="Digite seu e-mail" label="E-mail" />
            <x-input name="password" placeholder="Insira sua senha" label="Senha" type="password" />

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

            <button class="btn btn-active btn-primary rounded-full">
               Acessar conta
            </button>
         </x-form>



         <p class="text-neutral-500">Não tem cadastro? <a href="{{ route("register") }}"
               class="text-neutral-100 hover:underline">
               Criar conta</a>
         </p>
      </div>
   </section>
</x-layout.guest>