<x-layouts.admin>
    <div class="flex items-center justify-between mb-6">
        <flux:breadcrumbs>
            <flux:breadcrumbs.item href="{{route('admin.dashboard')}}">
                Dashboard
            </flux:breadcrumbs.item>
            <flux:breadcrumbs.item href="{{route('admin.posts.index')}}">
                Posts
            </flux:breadcrumbs.item>
            <flux:breadcrumbs.item href="#">
                Creacion de Posts
            </flux:breadcrumbs.item>
        </flux:breadcrumbs>
    </div>

    <form action="{{route('admin.posts.store')}}" method="POST" class="px-6 py-8 rounded shadow-lg space-y-4">
        @csrf

        <flux:field>
            <flux:label>Titulo del Posts</flux:label>
            <flux:input name="title" id="title" oninput="string_to_slug(this.value, '#slug')" value="{{old('title')}}"/>
            <flux:error name="title" />
        </flux:field>

        <flux:field>
            <flux:label>Slug del Post</flux:label>
            <flux:input name="slug" id="slug" value="{{old('slug')}}"/>
            <flux:error name="slug" />
        </flux:field>

        <flux:field>
            <flux:label>
                Seleciona una categoría
            </flux:label>
        </flux:field>

        <flux:field>
            <flux:select name="category_id" size="sm">
                @foreach ($categories as $category)
                    <flux:select.option value="{{$category->id}}" :selected="$category->id == old('category_id')">
                        {{$category->name}}
                    </flux:select.option>
                @endforeach
            </flux:select>
            <flux:error name="category_id" />
        </flux:field>

        <div class="flex justify-center">
            <flux:button variant="primary" type="submit">
                Crear Post
            </flux:button>
        </div>
    </form>

</x-layouts.admin>
