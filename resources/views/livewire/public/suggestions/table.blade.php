    <div>
        <div class="divide-y divide-gray-500">
            @foreach ($suggestions as $suggestion)
                <div wire:key="{{ $suggestion->id }}" class="flex items-center gap-x-6 p-4">
                    <div>
                        <button wire:click='vote({{ $suggestion->id }})' type="button"
                            class="bg-gray-800 px-4 py-2 font-bold text-white rounded-md cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M4.5 10.5 12 3m0 0 7.5 7.5M12 3v18" />
                            </svg>
                            <span>{{ $suggestion->voteCount() }}</span>
                        </button>
                    </div>
                    <div class="flex flex-col gap-y-2">
                        <h3 class="text-xl font-bold text-white">{{ $suggestion->title }}</h3>
                        <div class="flex items-center gap-x-4">
                            <span
                                class="inline-flex justify-center w-[100px] text-center text-sm font-semibold {{ $suggestion->status->color() }} text-white py-1 px-2 rounded-sm">
                                {{ $suggestion->status->label() }}
                            </span>
                            <h4 class="text-sm text-gray-300">{{ $suggestion->createdAtHuman() }}</h4>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
