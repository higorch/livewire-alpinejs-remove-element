<div>
    
    <!-- MODAL -->
    <div class="fixed inset-0 overflow-y-auto bg-black/60 invisible" wire:ignore.self x-data="modal('modal-save')" :class="{'visible': open, 'invisible': !open}" x-bind="events">
        <div class="flex items-center justify-center min-h-screen p-3" @click.self="open = false">
            <div class="relative w-full max-w-4xl rounded-lg shadow-sm shadow-gray-700 dark:shadow-neutral-950 bg-gradient-to-tr from-theme-primary to-neutral-50 dark:from-slate-900 dark:to-slate-800" x-show="open" x-transition>
                <span class="absolute top-6 right-6 text-xl cursor-pointer text-slate-500" @click.prevent="open = false">
                    <i class="fa-solid fa-xmark"></i>
                </span>
                <div class="flex items-center w-full px-6 py-5 border-b border-zinc-200/70 dark:border-slate-600/30">
                    <p class="font-medium text-xl text-slate-600 dark:text-slate-400">
                        {{ $this->form->uuid ? 'Editar currículo' : 'Adicionar currículo' }}
                    </p>
                </div>
                <div class="flex flex-col flex-grow p-6">
                    
                    <!-- FORM -->
                    <div class="grid grid-cols-6 gap-x-6 gap-y-3">

                        <div class="relative col-span-full md:col-span-6">
                            <label class="label-basic block">Descrição</label>
                            <input type="text" class="input-basic" wire:model="form.description">
                            @error('form.description') <span @mouseover="$el.remove()" class="input-error">{{ $message }}</span> @enderror
                        </div>
                        
                    </div>
                    <!-- FORM -->

                </div>
                <div class="flex justify-between items-center gap-6 w-full p-6 border-t border-slate-200/70 dark:border-slate-600/30">
                    <a href="#" class="flex items-center justify-center gap-2 w-full px-4 py-2 text-white bg-slate-600 hover:bg-slate-700 rounded-md shadow-md" wire:click.prevent="submit">
                        <i class="far fa-save"></i>
                        <span class="font-semibold">{{ Str::ucfirst(__('app.save')) }}</span>
                    </a>
                    <a href="#" class="flex items-center justify-center gap-2 w-full px-4 py-2 text-white bg-slate-400 hover:bg-slate-500 rounded-md shadow-md" @click.prevent="open = false">
                        <i class="fas fa-times text-white"></i>
                        <span class="font-semibold">{{ Str::ucfirst(__('app.close')) }}</span>
                    </a>                           
                </div>
            </div>
        </div>
    </div>
    <!-- MODAL -->
    
</div>
