@extends('layouts.app')

@section('title', 'Add Photos')

@section('content')
<div class="md-col-12">
    <div class="panel panel--default">
        <div class="panel__header">Add Photos to {{ ucwords($category->name) }}</div>

        <div class="panel__body">
            <div class="form__group">
                <div class="dropzone" id="file"></div>  
            </div>                        
     </div>
 </div>
</div>

@endsection


@section('scripts')

    <script>
        
    let drop = new Dropzone('#file', {
        createImageThumbnails: true,
        addRemoveLinks: true,
        acceptedFiles: 'image/jpeg,image/jpg,image/png,image/webp',
        // maxFiles: 6,
        maxFilesize: 3,
        url: '{{ route('admin.photos.store', [$category]) }}',
        headers: {
            'X-CSRF-TOKEN' : document.head.querySelector('meta[name="csrf-token"]').content
        }
    });

    drop.on('success', function (photo, response) {
        console.log(photo);
        photo.id = response.id
        photo.name = response.name
        photo.size = response.size
        photo.thumbnail = response.path
    });

    drop.on('error', function(file) {
        drop.removefile(file);
    });

    @if ($category->photos->count())
    
        @foreach ($category->photos as $photo)
            var mock = {id: '{{ $photo->id }}', name: '{{  $photo->name }}', size: '{{ $photo->size }}'};
            drop.emit('addedfile', mock);
            drop.emit('thumbnail',mock,'{{ Storage::disk('public')->url($photo->path) }}');
        @endforeach

        @php
            // $photo = $photo->identifier;
        @endphp

        drop.on('removedfile', function (photo) {
            axios.delete('{{ route('admin.photos.destroy', [$photo]) }}').catch(function (error) {
                var mockfile = {id: photo.id, name: photo.name, size: photo.size};
                drop.emit('addedfile', mockfile);
            })
        });

     @endif

    </script>

@endsection