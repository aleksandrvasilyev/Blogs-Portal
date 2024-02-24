<li class="bg-white px-4 py-6 shadow sm:rounded-lg sm:p-6">
    <article>
        <div>
            <div class="grid grid-cols-10 gap-4">
                <div class="col-span-6">
                    <a class="text-2xl" href="{{ $post->path() }}">{{ $post->title }}</a>
                </div>
                <div class="col-span-3">{{ $post->status }}</div>
                <div class="col-span-1">
                    <a
                        class="rounded-md border border-transparent bg-gray-400 px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-gray-500"
                        href="{{ route('profile.posts.edit', $post) }}"
                    >Edit</a></div>
            </div>


        </div>
        <div class="mt-2 space-y-4 text-sm text-gray-700">
            @if($post->tags)
                <div class="mt-3">
                    @foreach($post->tags as $tag)
                        #{{ $tag->name }}
                    @endforeach
                </div>
            @endif
        </div>
        <div class="mt-6 flex justify-between space-x-8">
            <div class="flex space-x-6">
                        <span class="inline-flex items-center text-sm">
                          <button type="button" class="inline-flex space-x-2 text-gray-400 hover:text-gray-500">
                            <svg class="h-5 w-5" x-description="Heroicon name: mini/hand-thumb-up"
                                 xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                 aria-hidden="true">
  <path
      d="M1 8.25a1.25 1.25 0 112.5 0v7.5a1.25 1.25 0 11-2.5 0v-7.5zM11 3V1.7c0-.268.14-.526.395-.607A2 2 0 0114 3c0 .995-.182 1.948-.514 2.826-.204.54.166 1.174.744 1.174h2.52c1.243 0 2.261 1.01 2.146 2.247a23.864 23.864 0 01-1.341 5.974C17.153 16.323 16.072 17 14.9 17h-3.192a3 3 0 01-1.341-.317l-2.734-1.366A3 3 0 006.292 15H5V8h.963c.685 0 1.258-.483 1.612-1.068a4.011 4.011 0 012.166-1.73c.432-.143.853-.386 1.011-.814.16-.432.248-.9.248-1.388z"></path>
</svg>
                            <span class="font-medium text-gray-900">{{ $post->likes->count() }}</span>
                            <span class="sr-only">likes</span>
                          </button>
                        </span>
                <span class="inline-flex items-center text-sm">
                          <button type="button" class="inline-flex space-x-2 text-gray-400 hover:text-gray-500">
                            <svg class="h-5 w-5" x-description="Heroicon name: mini/chat-bubble-left-ellipsis"
                                 xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                 aria-hidden="true">
  <path fill-rule="evenodd"
        d="M10 2c-2.236 0-4.43.18-6.57.524C1.993 2.755 1 4.014 1 5.426v5.148c0 1.413.993 2.67 2.43 2.902.848.137 1.705.248 2.57.331v3.443a.75.75 0 001.28.53l3.58-3.579a.78.78 0 01.527-.224 41.202 41.202 0 005.183-.5c1.437-.232 2.43-1.49 2.43-2.903V5.426c0-1.413-.993-2.67-2.43-2.902A41.289 41.289 0 0010 2zm0 7a1 1 0 100-2 1 1 0 000 2zM8 8a1 1 0 11-2 0 1 1 0 012 0zm5 1a1 1 0 100-2 1 1 0 000 2z"
        clip-rule="evenodd"></path>
</svg>
                            <span class="font-medium text-gray-900">{{ $post->comments->count() }}</span>
                            <span class="sr-only">replies</span>
                          </button>
                        </span>
                <span class="inline-flex items-center text-sm">
                          <button type="button" class="inline-flex space-x-2 text-gray-400 hover:text-gray-500">
                            <svg class="h-5 w-5" x-description="Heroicon name: mini/eye"
                                 xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                 aria-hidden="true">
  <path d="M10 12.5a2.5 2.5 0 100-5 2.5 2.5 0 000 5z"></path>
  <path fill-rule="evenodd"
        d="M.664 10.59a1.651 1.651 0 010-1.186A10.004 10.004 0 0110 3c4.257 0 7.893 2.66 9.336 6.41.147.381.146.804 0 1.186A10.004 10.004 0 0110 17c-4.257 0-7.893-2.66-9.336-6.41zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
        clip-rule="evenodd"></path>
</svg>
                            <span class="font-medium text-gray-900">{{ $post->views }}</span>
                            <span class="sr-only">views</span>
                          </button>
                        </span>
            </div>

        </div>
    </article>
</li>
