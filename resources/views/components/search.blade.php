<div class="relative w-full">
    <div class="absolute inset-y-0 left-0 pointer-events-none">
        <div :class="{ 'text-white': focused, '${textColor}': !focused }" class="text-white pl-2 flex flex-row items-center h-full">
            <svg viewBox="0 0 20 20" fill="currentColor" class="search w-6 h-6"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
        </div>
    </div>
    <input x-ref="search" x-on:input.debounce="fetch(`/search/` + $refs.search.value).then(response => response.json()).then(data => { console.log(data); searchResultContent = data; hasSearchResults = data.length > 0 })" x-on:keyup.escape="$refs.search.blur(); showSearchResults = false;" x-on:focus="focused = true" x-on:blur="focused = false" class="w-full py-3 pl-10 bg-pink-600 text-white sm:bg-transparent text-xl rounded-lg placeholder-current ease-in sm:text-pink-600 transition-all duration-100 focus:shadow-xl focus:text-white focus:pl-0 focus:bg-pink-600 focus:outline-none" placeholder="Search">
    <div x-ref="searchResults" x-show.transition="hasSearchResults && focused" class="absolute bg-pink-600 -mt-2 shadow-xl rounded w-full">
        <template x-for="item in searchResultContent" :key="item.command">
            <a x-bind:href="'#' + item.id">
                <div class="p-2 block text-white hover:bg-white hover:text-pink-600 hover:shadow hover:rounded" x-text="item.command + '  ' + item.description"></div>
            </a>
        </template>
    </div>
</div>