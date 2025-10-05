<x-layouts.admin>

    @push('css')
        <link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet" />

        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    @endpush

    <div class="flex items-center justify-between mb-6">
        <flux:breadcrumbs>
            <flux:breadcrumbs.item href="{{route('admin.dashboard')}}">
                Dashboard
            </flux:breadcrumbs.item>
            <flux:breadcrumbs.item href="{{route('admin.posts.index')}}">
                Posts
            </flux:breadcrumbs.item>
            <flux:breadcrumbs.item href="#">
                Edición de Post
            </flux:breadcrumbs.item>
        </flux:breadcrumbs>
    </div>

    <form action="{{route('admin.posts.update', $post)}}" method="POST" enctype="multipart/form-data">
        @csrf

        @method('PUT')

        <div class="relative mb-4">
            <img id="imgPreview" class="w-full aspect-video object-cover object-center"
                src="{{ $post->image }}" alt="">

            <div class="absolute top-8 right-8">
                <label class="bg-white px-4 py-2 rounded-lg cursor-pointer " style="color: black;">
                    Cambiar Imagen
                    <input onchange="preview_image(event, '#imgPreview')" class="hidden" name="image" type="file" accept="image/*">
                </label>

                <div class="bg-2white mt-4">
                    <a href="{{route('prueba',$post)}}">
                        Descargar imagen
                    </a>
                </div>
            </div>
        </div>

        <div class="px-6 py-8 rounded shadow-lg space-y-4">
            <flux:field>
                <flux:label>Nombre de la Categoría</flux:label>
                <flux:input name="title" value="{{old('title', $post->title)}}"/>
                <flux:error name="title" />
            </flux:field>

            @if (!$post->is_published)
                <flux:field>
                    <flux:label>Slug del Post</flux:label>
                    <flux:input name="slug" id="slug" value="{{old('slug', $post->slug)}}"/>
                    <flux:error name="slug" />
                </flux:field>
            @endif

            <flux:field>
                <flux:label>
                    Seleciona una categoría
                </flux:label>
                <flux:select name="category_id" size="sm">
                    @foreach ($categories as $category)
                        <flux:select.option value="{{$category->id}}" :selected="$category->id == old('category_id',$post->category_id)">
                            {{$category->name}}
                        </flux:select.option>
                    @endforeach
                </flux:select>
                <flux:error name="category_id" />
            </flux:field>

            <flux:field>
                <flux:label>
                    Resumen del Curso
                </flux:label>
                <flux:textarea name="excerpt">
                    {{old('excerpt', $post->excerpt)}}
                </flux:textarea>
                <flux:error name="excerpt" />

            </flux:field>

            <flux:field>
                <flux:label>
                    Etiquetas
                </flux:label>
                <select id="tags" name="tags[]" multiple="multiple">
                    @foreach ($tags as $tag)
                        <option value="{{$tag->name}}" @selected(in_array($tag->name, old('tags', $post->tags->pluck('name')->toArray())))>
                            {{$tag->name}}
                        </option>
                    @endforeach
                </select>
                <flux:error name="tags[]" />
            </flux:field>

            <div>
                <p class="font-medium text-sm mb-1">
                    Texto
                </p>
                <div id="editor">
                    {!!old('content', $post->content)!!}
                </div>
                <textarea class="hidden" name="content" id="content">
                    {{old('content', $post->content)}}
                </textarea>
            </div>



            <flux:field>
                <flux:label>
                    Estado de publicación del post
                </flux:label>
                <flux:radio.group variant="segmented" name="is_published">
                    <flux:radio value="0" label="No Publicado" :checked="old('is_published', $post->is_published == 0)"/>
                    <flux:radio value="1" label="Publicado" :checked="old('is_published', $post->is_published == 1)"/>
                </flux:radio.group>

                <flux:error name="is_published" />
            </flux:field>

            <div class="flex justify-center">
                <flux:button variant="primary" type="submit">
                    Actualizar Post
                </flux:button>
            </div>
        </div>
    </form>

    @push('js')

        <script
            src="https://code.jquery.com/jquery-3.7.1.min.js"
            integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
            crossorigin="anonymous"></script>

        <script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

        <script>
            const quill = new Quill('#editor', {
                theme: 'snow'
            });
            quill.on('text-change', function() {
                document.querySelector('#content').value = quill.root.innerHTML;
            });
            $(document).ready(function() {
                $('#tags').select2({
                    tags: true,
                    tokenSeparators: [',']
                });
            });
        </script>

        @if ($errors->any())

            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    html:`<ul class="text-left">
                            @foreach ($errors->all() as $error)
                               <li>{{ $error }}</li>
                            @endforeach
                        </ul>`,
                });
            </script>

        @endif
    @endpush

</x-layouts.admin>
