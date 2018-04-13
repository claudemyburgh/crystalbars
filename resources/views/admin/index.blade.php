@extends('layouts.app')
@section('title', 'Categories List')
@section('content')
        @role('admin')
    <div class="row">
        <div class="md-col-12">
            <div class="panel panel--default">
                <div class="panel__header">Welcome {{ auth()->user()->name }}</div>


                <div class="panel__body">
                    <a href="{{ route('admin.categories.create') }}" class="btn btn--info">Add Category</a>
                </div>
            </div>

            <div class="table__responsive">
               <table class="table table--striped table--bordered">
                <thead class="table__head">
                  <tr>
                    <th>ID</th>
                    <th>CATEGORY</th>
                    <th>IMAGES COUNT</th>
                    <th>ACTION</th>
                  </tr>
                </thead>

                <tbody class="table__body clearfix">
                    @foreach ($cats as $cat) 
                    <tr>
                        <td data-title="ID">{{ $cat->id }}</td>
                        <td data-title="CATEGORY">{{ ucwords($cat->name) }}</td>
                        <td data-title="IMAGES COUNT"></td>
                        <td data-title="ACTION">
                            <a href="{{ route('admin.categories.edit', [$cat]) }}" class="btn btn--info">+</a> 
                            <a  onclick="event.preventDefault(); (confirm('Are you sure you want to delete this category style?')) ? document.getElementById('image_list-{{ $cat->id }}').submit() : false"  href="#" class="btn btn--danger">-</a>
                        </td>
                            <form class="hide" method="post" id="image_list-{{ $cat->id }}" action="{{ route('admin.categories.destroy', $cat) }}">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}                    
                            </form>
                    </tr>
                    @endforeach
                  </tbody>

               </table>
           </div>       
</div>
</div>
@else 

<<h1></h1> class="text-align-center">
    Sorry, this is for admin only
</<h1></h1>>

@endrole

@endsection
