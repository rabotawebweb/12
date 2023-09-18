<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Авторы <a class="btn btn-success" href="{{ route('authors.create') }}"> <<добавить</a>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
					@if ($message = Session::get('success'))
						<div class="alert alert-success">
							<p>{{ $message }}</p>
						</div>
					@endif
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    
					<table class="table table-bordered">
					<tr>
						<th>No</th>
						<th>Name</th>
						<th>Страна</th>
						<th>Comment</th>
						<th width="320px">Action</th>
					</tr>
					@foreach ($authors as $author)
					<tr>
						<td>{{ ++$i }}</td>
						<td>{{ $author->name }}</td>
						<td>{{ $author->country->name }}</td>
						<td>{{ $author->comment }}</td>
						<td>
							<form action="{{ route('authors.destroy',$author->id) }}" method="POST">
			   
								<a class="btn btn-info" href="{{ route('authors.show',$author->id) }}">Show</a>
				
								<a class="btn btn-primary" href="{{ route('authors.edit',$author->id) }}">Edit</a>
			   
								@csrf
								@method('DELETE')
				  
								<button type="submit" class="btn btn-danger" style="color:#000">Delete</button>
							</form>
						</td>
					</tr>
					@endforeach
				</table>
			  
				{!! $authors->links() !!}
					
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
