<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Книги <a class="btn btn-success" href="{{ route('books.create') }}"> <<добавить</a>
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
					@if ($message = Session::get('warning'))
						<div class="alert alert-warning">
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
						<th>Год</th>
						<th>Comment</th>
						<th>Автор</th>
						<th>Разделы</th>
						<th width="320px">Action</th>
					</tr>
					@foreach ($books as $book)
					<tr>
						<td>{{ ++$i }}</td>
						<td>{{ $book->name }}</td>
						<td>{{ $book->year }}</td>
						<td>{{ $book->comment }}</td>
						<td>{{ $book->author->name }}</td>
						<td>{{ $book->sections() }}</td>
						<td>
							<form action="{{ route('books.destroy',$book->id) }}" method="POST">
			   
								<a class="btn btn-info" href="{{ route('books.show',$book->id) }}">Show</a>
								
								@if ( auth()->id() == 1 || auth()->id() == $book->user_id )
								<a class="btn btn-primary" href="{{ route('books.edit',$book->id) }}">Edit</a>
								@endif
			   
								@csrf
								@method('DELETE')
								
								@if ( auth()->id() == 1 )
								<button type="submit" class="btn btn-danger" style="color:#000">Delete</button>
								@endif
							
							</form>
						</td>
					</tr>
					@endforeach
				</table>
			  
				{!! $books->links() !!}
					
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
