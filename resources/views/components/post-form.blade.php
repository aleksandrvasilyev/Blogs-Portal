@props(['post', 'route'])

<li class="bg-white px-4 py-6 shadow sm:rounded-lg sm:p-6">
    <article>
        <div class="flex items-center">
            <div class="mx-auto w-full">
                <form action="{{ $route }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{ $post->id ?? '' }}">
                    <input type="hidden" name="views" value="{{ $post->views ?? 1 }}">
                    <input type="hidden" name="pinned" value="{{ $post->pinned ?? false }}">

                    <x-form.input name="title" type="text" :value="old('title', $post->title ?? '')"/>
                    <x-form.input name="slug" type="text" :value="old('slug', $post->slug ?? '')"/>

                    <x-form.textarea name="excerpt">{{ old('excerpt', $post->excerpt ?? '') }}</x-form.textarea>
                    <x-form.textarea name="body">{{ old('excerpt', $post->body ?? '') }}</x-form.textarea>


                    <div class="mb-5 w-64">
                        <label for="category_id" class="block mb-2 text-gray-900">Category</label>
                        <select id="category_id"
                                class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                name="category_id"
                        >
                            <option selected>Category</option>
                            @foreach(\App\Models\Category::all() as $category)
                                <option value="{{ $category->id }}"
                                        @if(isset($post) && $category->id === $post->category->id) selected @endif>{{ $category->name ?? '' }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="w-64 mb-5">
                        <label for="tags" class="block mb-2">Tags</label>
                        <select id="tags" name="tags[]" multiple x-data="multiselect">
                            <optgroup label="tags">
                                @foreach(\App\Models\Tag::all() as $tag)
                                    <option value="{{ $tag->id ?? '' }}"
                                            @if(isset($post) && $post->tags->pluck('id')->contains($tag->id)) selected @endif >{{ $tag->name ?? ''}}</option>
                                @endforeach
                            </optgroup>
                        </select>
                    </div>


                    <div class="grid lg:grid-cols-5">
                        <div class="mb-5 lg:col-span-4">
                            <label for="thumbnail" class="mb-3 pb-3">
                                Thumbnail
                            </label>
                            <input
                                id="thumbnail"
                                type="file"
                                class="text-sm mt-3 w-full cursor-pointer rounded-lg border-[1.5px] border-stroke dark:border-dark-3 font-medium text-body-color dark:text-dark-6 outline-none transition file:mr-5 file:border-collapse file:cursor-pointer file:border-0 file:border-r file:border-solid file:border-stroke dark:file:border-dark-3 file:bg-[#F5F7FD] dark:file:bg-dark-2 file:py-3 file:px-5 file:text-body-color dark:file:text-dark-6 file:hover:bg-primary file:hover:bg-opacity-10 focus:border-primary active:border-primary disabled:cursor-default disabled:bg-[#F5F7FD]"
                            />
                        </div>
                        <div class="lg:col-span-1 pl-2">
                            <img alt="" src="{{ $post->thumbnail ?? '' }}">
                        </div>
                    </div>

                    <div class="mb-5 w-64">
                        <label for="status" class="block mb-2 text-gray-900">Status</label>
                        <select id="status"
                                class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                name="status"
                        >
                            <option selected>Status</option>
                            <option value="published"
                                    @if(isset($post) && $post->status === 'published') selected @endif>Published
                            </option>
                            <option value="draft" @if(isset($post) && $post->status === 'draft') selected @endif>Draft
                            </option>

                        </select>
                    </div>


                    <div>
                        <button
                            class="hover:shadow-form rounded-md bg-[#6A64F1] py-3 px-8 text-base font-semibold text-white outline-none"
                        >
                            Submit
                        </button>
                    </div>

                    @error('title')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror

                    @error('slug')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror

                    @error('excerpt')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror

                    @error('body')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror

                    @error('user_id')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror

                    @error('category_id')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror

                    @error('status')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror

                    @error('views')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror

                    @error('pinned')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror

                    @error('edited')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror

                    @error('thumbnail')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror

                </form>
            </div>
        </div>
    </article>
</li>

<script>
    document.addEventListener("alpine:init", () => {
        Alpine.data("multiselect", () => ({
            style: {
                wrapper: "w-full relative",
                select:
                    "border w-full border-gray-300 rounded-lg py-2 px-2 text-sm flex gap-2 items-center cursor-pointer bg-white",
                menuWrapper:
                    "w-full rounded-lg py-1.5 text-sm mt-1 shadow-lg absolute bg-white z-10",
                menu: "max-h-52 overflow-y-auto",
                textList: "overflow-x-hidden text-ellipsis grow whitespace-nowrap",
                trigger: "px-2 py-2 rounded bg-neutral-100",
                badge: "py-1.5 px-3 rounded-full bg-neutral-100",
                search:
                    "px-3 py-2 w-full border-0 border-b-2 border-neutral-100 pb-3 outline-0 mb-1",
                optionGroupTitle:
                    "px-3 py-2 text-neutral-400 uppercase font-bold text-xs sticky top-0 bg-white",
                clearSearchBtn: "absolute p-3 right-0 top-1 text-neutral-600",
                label: "hover:bg-neutral-50 cursor-pointer flex py-2 px-3"
            },

            icons: {
                times:
                    '<svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" viewBox="0 0 24 24" class="w-4 h-4"><g xmlns="http://www.w3.org/2000/svg" stroke="currentColor" stroke-linecap="round" stroke-width="2"><path d="M6 18L18 6M18 18L6 6"/></g></svg>',
                arrowDown:
                    '<svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" viewBox="0 0 24 24" class="w-4 h-4"><path xmlns="http://www.w3.org/2000/svg" stroke-linecap="round" stroke-width="2" d="M5 10l7 7 7-7"/></svg>'
            },

            init() {
                const style = this.style;

                const originalSelect = this.$el;
                originalSelect.classList.add("hidden");

                const wrapper = document.createElement("div");
                wrapper.className = style.wrapper;
                wrapper.setAttribute("x-data", "newSelect");

                const newSelect = document.createElement("div");
                newSelect.className = style.select;
                newSelect.setAttribute("x-bind", "selectTrigger");

                const textList = document.createElement("span");
                textList.className = style.textList;

                const triggerBtn = document.createElement("a");
                triggerBtn.className = style.trigger;
                triggerBtn.innerHTML = this.icons.arrowDown;

                const countBadge = document.createElement("span");
                countBadge.className = style.badge;
                countBadge.setAttribute("x-bind", "countBadge");

                newSelect.append(textList);
                newSelect.append(countBadge);
                newSelect.append(triggerBtn);

                const menuWrapper = document.createElement("div");
                menuWrapper.className = style.menuWrapper;
                menuWrapper.setAttribute("x-bind", "selectMenu");

                const menu = document.createElement("div");
                menu.className = style.menu;

                const search = document.createElement("input");
                search.className = style.search;
                search.setAttribute("x-bind", "search");
                search.setAttribute("placeholder", "filter");

                const clearSearchBtn = document.createElement("button");
                clearSearchBtn.className = style.clearSearchBtn;
                clearSearchBtn.setAttribute("x-bind", "clearSearchBtn");
                clearSearchBtn.innerHTML = this.icons.times;

                menuWrapper.append(search);
                menuWrapper.append(menu);
                menuWrapper.append(clearSearchBtn);

                originalSelect.parentNode.insertBefore(
                    wrapper,
                    originalSelect.nextSibling
                );

                const itemGroups = originalSelect.querySelectorAll("optgroup");

                if (itemGroups.length > 0) {
                    itemGroups.forEach((itemGroup) => processItems(itemGroup));
                } else {
                    processItems(originalSelect);
                }

                function processItems(parent) {
                    const items = parent.querySelectorAll("option");
                    const subMenu = document.createElement("ul");
                    const groupName = parent.getAttribute("label") || null;

                    if (groupName) {
                        const groupTitle = document.createElement("h5");
                        groupTitle.className = style.optionGroupTitle;
                        groupTitle.innerText = groupName;
                        groupTitle.setAttribute("x-bind", "groupTitle");
                        menu.appendChild(groupTitle);
                    }

                    items.forEach((item) => {
                        const li = document.createElement("li");
                        li.setAttribute("x-bind", "listItem");

                        const checkBox = document.createElement("input");
                        checkBox.classList.add("mr-3", "mt-1");
                        checkBox.type = "checkbox";
                        checkBox.value = item.value;
                        checkBox.id = originalSelect.name + "_" + item.value;

                        const label = document.createElement("label");
                        label.className = style.label;
                        label.setAttribute("for", checkBox.id);
                        label.innerText = item.innerText;

                        checkBox.setAttribute("x-bind", "checkBox");

                        if (item.hasAttribute("selected")) {
                            checkBox.checked = true;
                        }
                        label.prepend(checkBox);
                        li.append(label);
                        subMenu.appendChild(li);
                    });
                    menu.appendChild(subMenu);
                }

                wrapper.appendChild(newSelect);
                wrapper.appendChild(menuWrapper);

                Alpine.data("newSelect", () => ({
                    open: false,
                    showCountBadge: false,
                    items: [],
                    selectedItems: [],
                    filterBy: "",
                    init() {
                        this.regenerateTextItems();
                    },

                    regenerateTextItems() {
                        this.selectedItems = [];
                        this.items.forEach((item) => {
                            const checkbox = item.querySelector("input[type=checkbox]");
                            const text = item.querySelector("label").innerText;
                            if (checkbox.checked) {
                                this.selectedItems.push(text);
                            }
                        });

                        if (this.selectedItems.length > 1) {
                            this.showCountBadge = true;
                        } else {
                            this.showCountBadge = false;
                        }

                        if (this.selectedItems.length === 0) {
                            textList.innerHTML = '<span class="text-neutral-400">select</span>';
                        } else {
                            textList.innerText = this.selectedItems.join(", ");
                        }
                    },

                    selectTrigger: {
                        ["@click"]() {
                            this.open = !this.open;

                            if (this.open) {
                                this.$nextTick(() =>
                                    this.$root.querySelector("input[x-bind=search]").focus()
                                );
                            }
                        }
                    },
                    selectMenu: {
                        ["x-show"]() {
                            return this.open;
                        },
                        ["x-transition"]() {
                        },
                        ["@keydown.escape.window"]() {
                            this.open = false;
                        },
                        ["@click.away"]() {
                            this.open = false;
                        },
                        ["x-init"]() {
                            this.items = this.$el.querySelectorAll("li");
                            this.regenerateTextItems();
                        }
                    },
                    checkBox: {
                        ["@change"]() {
                            const checkBox = this.$el;

                            if (checkBox.checked) {
                                originalSelect
                                    .querySelector("option[value='" + checkBox.value + "']")
                                    .setAttribute("selected", true);
                            } else {
                                originalSelect
                                    .querySelector("option[value='" + checkBox.value + "']")
                                    .removeAttribute("selected");
                            }
                            this.regenerateTextItems();
                        }
                    },
                    countBadge: {
                        ["x-show"]() {
                            return this.showCountBadge;
                        },
                        ["x-text"]() {
                            return this.selectedItems.length;
                        }
                    },
                    search: {
                        ["@keydown.escape.stop"]() {
                            this.filterBy = "";
                            this.$el.blur();
                        },
                        ["@keyup"]() {
                            this.filterBy = this.$el.value;
                        },
                        ["x-model"]() {
                            return this.filterBy;
                        }
                    },
                    clearSearchBtn: {
                        ["@click"]() {
                            this.filterBy = "";
                        },
                        ["x-show"]() {
                            return this.filterBy.length > 0;
                        }
                    },
                    listItem: {
                        ["x-show"]() {
                            return (
                                this.filterBy === "" ||
                                this.$el.innerText
                                    .toLowerCase()
                                    .startsWith(this.filterBy.toLowerCase())
                            );
                        }
                    },
                    groupTitle: {
                        ["x-show"]() {
                            if (this.filterBy === "") return true;

                            let atLeastOneItemIsShown = false;

                            this.$el.nextElementSibling
                                .querySelectorAll("li")
                                .forEach((item) => {
                                    console.log(this.filterBy);
                                    if (
                                        item.innerText
                                            .toLowerCase()
                                            .startsWith(this.filterBy.toLowerCase())
                                    )
                                        atLeastOneItemIsShown = true;
                                });
                            return atLeastOneItemIsShown;
                        }
                    }
                }));
            }
        }));
    });
</script>
