<div class="px-4 sm:px-0">
    <div class="sm:hidden">
        <label for="question-tabs" class="sr-only">Select a tab</label>
        <select id="question-tabs"
                class="block w-full rounded-md border-gray-300 text-base font-medium text-gray-900 shadow-sm focus:border-rose-500 focus:ring-rose-500">

            <option selected="">Recent</option>

            <option>Most Liked</option>

            <option>Most Answers</option>

        </select>
    </div>


    <div class="hidden sm:block">
        <nav class="isolate flex divide-x divide-gray-200 rounded-lg shadow" aria-label="Tabs">

            <a href="javascript:void(0)" aria-current="page"
               class="text-gray-900 rounded-l-lg  group relative min-w-0 flex-1 overflow-hidden bg-white py-4 px-6 text-sm font-medium text-center hover:bg-gray-50 focus:z-10"
               x-state:on="Current" x-state:off="Default"
               x-state-description="Current: &quot;text-gray-900&quot;, Default: &quot;text-gray-500 hover:text-gray-700&quot;">
                <span>Recent</span>
                <span aria-hidden="true" class="bg-rose-500 absolute inset-x-0 bottom-0 h-0.5"></span>
            </a>

            <a href="javascript:void(0)"
               class="text-gray-500 hover:text-gray-700   group relative min-w-0 flex-1 overflow-hidden bg-white py-4 px-6 text-sm font-medium text-center hover:bg-gray-50 focus:z-10"
               x-state-description="undefined: &quot;text-gray-900&quot;, undefined: &quot;text-gray-500 hover:text-gray-700&quot;">
                <span>Most Liked</span>
                <span aria-hidden="true"
                      class="bg-transparent absolute inset-x-0 bottom-0 h-0.5"></span>
            </a>

            <a href="javascript:void(0)"
               class="text-gray-500 hover:text-gray-700  rounded-r-lg group relative min-w-0 flex-1 overflow-hidden bg-white py-4 px-6 text-sm font-medium text-center hover:bg-gray-50 focus:z-10"
               x-state-description="undefined: &quot;text-gray-900&quot;, undefined: &quot;text-gray-500 hover:text-gray-700&quot;">
                <span>Most Answers</span>
                <span aria-hidden="true"
                      class="bg-transparent absolute inset-x-0 bottom-0 h-0.5"></span>
            </a>

        </nav>
    </div>
</div>
