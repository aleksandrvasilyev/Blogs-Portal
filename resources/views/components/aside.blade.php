<aside class="hidden xl:col-span-3 xl:block">
    <div class="sticky top-4 space-y-4">
        <section aria-labelledby="who-to-follow-heading">
            <div class="rounded-lg bg-white shadow">
                <div class="p-6">
                    <h2 id="who-to-follow-heading" class="text-base font-medium text-gray-900">
                        Who to follow</h2>
                    <div class="mt-6 flow-root">
                        <ul role="list" class="-my-4 divide-y divide-gray-200">
                            @foreach(App\Models\User::inRandomOrder()->take(3)->get() as $user)

                                <li class="flex items-center space-x-3 py-4">
                                    <div class="flex-shrink-0">
                                        <img class="h-8 w-8 rounded-full"
                                             src="{{ $user->photo }}"
                                             alt="">
                                    </div>
                                    <div class="min-w-0 flex-1">
                                        <p class="text-sm font-medium text-gray-900">
                                            <a href="javascript:void(0)">{{ $user->name }}</a>
                                        </p>
                                        <p class="text-sm text-gray-500">
                                            <a href="javascript:void(0)">{{ $user->username }}</a>
                                        </p>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <button type="button"
                                                class="inline-flex items-center rounded-full bg-green-50 px-3 py-0.5 text-sm font-medium text-green-700 hover:bg-green-100">
                                            <svg class="-ml-1 mr-0.5 h-5 w-5 text-green-400"
                                                 xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                 fill="currentColor" aria-hidden="true">
                                                <path
                                                    d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z"></path>
                                            </svg>

                                            <span>Follow</span>
                                        </button>
                                    </div>
                                </li>
                            @endforeach

                        </ul>
                    </div>
                    <div class="mt-6">
                        <a href="javascript:void(0)"
                           class="block w-full rounded-md border border-gray-300 bg-white px-4 py-2 text-center text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50">View
                            all</a>
                    </div>
                </div>
            </div>
        </section>
        <section aria-labelledby="trending-heading">
            <div class="rounded-lg bg-white shadow">
                <div class="p-6">
                    <h2 id="trending-heading" class="text-base font-medium text-gray-900">Trending</h2>
                    <div class="mt-6 flow-root">
                        <ul role="list" class="-my-4 divide-y divide-gray-200">

                            <li class="flex space-x-3 py-4">
                                <div class="flex-shrink-0">
                                    <img class="h-8 w-8 rounded-full"
                                         src="https://images.unsplash.com/photo-1463453091185-61582044d556?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=2&amp;w=256&amp;h=256&amp;q=80"
                                         alt="Floyd Miles">
                                </div>
                                <div class="min-w-0 flex-1">
                                    <p class="text-sm text-gray-800">What books do you have on your
                                        bookshelf just to look smarter than you actually are?</p>
                                    <div class="mt-2 flex">
                              <span class="inline-flex items-center text-sm">
                                <button type="button" class="inline-flex space-x-2 text-gray-400 hover:text-gray-500">
                                  <svg class="h-5 w-5" x-description="Heroicon name: mini/chat-bubble-left-ellipsis"
                                       xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                       aria-hidden="true">
  <path fill-rule="evenodd"
        d="M10 2c-2.236 0-4.43.18-6.57.524C1.993 2.755 1 4.014 1 5.426v5.148c0 1.413.993 2.67 2.43 2.902.848.137 1.705.248 2.57.331v3.443a.75.75 0 001.28.53l3.58-3.579a.78.78 0 01.527-.224 41.202 41.202 0 005.183-.5c1.437-.232 2.43-1.49 2.43-2.903V5.426c0-1.413-.993-2.67-2.43-2.902A41.289 41.289 0 0010 2zm0 7a1 1 0 100-2 1 1 0 000 2zM8 8a1 1 0 11-2 0 1 1 0 012 0zm5 1a1 1 0 100-2 1 1 0 000 2z"
        clip-rule="evenodd"></path>
</svg>
                                  <span class="font-medium text-gray-900">291</span>
                                </button>
                              </span>
                                    </div>
                                </div>
                            </li>

                            <li class="flex space-x-3 py-4">
                                <div class="flex-shrink-0">
                                    <img class="h-8 w-8 rounded-full"
                                         src="https://images.unsplash.com/photo-1502685104226-ee32379fefbe?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=2&amp;w=256&amp;h=256&amp;q=80"
                                         alt="Emily Selman">
                                </div>
                                <div class="min-w-0 flex-1">
                                    <p class="text-sm text-gray-800">Have you ever lied about your age to
                                        buy a kid's meal at a restaurant?</p>
                                    <div class="mt-2 flex">
                              <span class="inline-flex items-center text-sm">
                                <button type="button" class="inline-flex space-x-2 text-gray-400 hover:text-gray-500">
                                  <svg class="h-5 w-5" x-description="Heroicon name: mini/chat-bubble-left-ellipsis"
                                       xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                       aria-hidden="true">
  <path fill-rule="evenodd"
        d="M10 2c-2.236 0-4.43.18-6.57.524C1.993 2.755 1 4.014 1 5.426v5.148c0 1.413.993 2.67 2.43 2.902.848.137 1.705.248 2.57.331v3.443a.75.75 0 001.28.53l3.58-3.579a.78.78 0 01.527-.224 41.202 41.202 0 005.183-.5c1.437-.232 2.43-1.49 2.43-2.903V5.426c0-1.413-.993-2.67-2.43-2.902A41.289 41.289 0 0010 2zm0 7a1 1 0 100-2 1 1 0 000 2zM8 8a1 1 0 11-2 0 1 1 0 012 0zm5 1a1 1 0 100-2 1 1 0 000 2z"
        clip-rule="evenodd"></path>
</svg>
                                  <span class="font-medium text-gray-900">164</span>
                                </button>
                              </span>
                                    </div>
                                </div>
                            </li>

                            <li class="flex space-x-3 py-4">
                                <div class="flex-shrink-0">
                                    <img class="h-8 w-8 rounded-full"
                                         src="https://images.unsplash.com/photo-1500917293891-ef795e70e1f6?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=2&amp;w=256&amp;h=256&amp;q=80"
                                         alt="Kristin Watson">
                                </div>
                                <div class="min-w-0 flex-1">
                                    <p class="text-sm text-gray-800">Does Santa Claus pay property taxes for
                                        his workshop at the North Pole?</p>
                                    <div class="mt-2 flex">
                              <span class="inline-flex items-center text-sm">
                                <button type="button" class="inline-flex space-x-2 text-gray-400 hover:text-gray-500">
                                  <svg class="h-5 w-5" x-description="Heroicon name: mini/chat-bubble-left-ellipsis"
                                       xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                       aria-hidden="true">
  <path fill-rule="evenodd"
        d="M10 2c-2.236 0-4.43.18-6.57.524C1.993 2.755 1 4.014 1 5.426v5.148c0 1.413.993 2.67 2.43 2.902.848.137 1.705.248 2.57.331v3.443a.75.75 0 001.28.53l3.58-3.579a.78.78 0 01.527-.224 41.202 41.202 0 005.183-.5c1.437-.232 2.43-1.49 2.43-2.903V5.426c0-1.413-.993-2.67-2.43-2.902A41.289 41.289 0 0010 2zm0 7a1 1 0 100-2 1 1 0 000 2zM8 8a1 1 0 11-2 0 1 1 0 012 0zm5 1a1 1 0 100-2 1 1 0 000 2z"
        clip-rule="evenodd"></path>
</svg>
                                  <span class="font-medium text-gray-900">133</span>
                                </button>
                              </span>
                                    </div>
                                </div>
                            </li>

                        </ul>
                    </div>
                    <div class="mt-6">
                        <a href="javascript:void(0)"
                           class="block w-full rounded-md border border-gray-300 bg-white px-4 py-2 text-center text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50">View
                            all</a>
                    </div>
                </div>
            </div>
        </section>
    </div>
</aside>
