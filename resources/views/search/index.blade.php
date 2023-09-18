<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Поиск
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
					@if ($message = Session::get('warning'))
						<div class="alert alert-warning">
							<p>{{ $message }}</p>
						</div>
					@endif
                </div>
            </div>
			
			<div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
					<form action="{{ route('search.index') }}" method="get">
                        <div class="row">
                            <div class="col-md-3">
                                <input type="text" class="form-control mb-3" placeholder="search" name="name">
                            </div>
							<div class="col-md-3">
                                <select name="author" class="form-control">
										<option value="">Все авторы</option>
									@foreach($authors as $var)
										<option value="{{$var->id}}">{{$var->name}}</option>
									@endforeach
								</select>
                            </div>
							<div class="col-md-3">
                                <select name="catalog" class="form-control">
										<option value="">Все разделы</option>
									@foreach($catalogs as $var)
										<option value="{{$var->id}}">{{$var->name}}</option>
									@endforeach
								</select>
                            </div>
                            <div class="col-md-2">
                                <input type="submit" class="form-control mb-3" value="Search">
                            </div>
                        </div>
                    </form>
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
					</tr>
					@foreach ($books as $book)
					<tr>
						<td>{{ $loop->index + 1 }}</td>
						<td>{{ $book->name }}</td>
						<td>{{ $book->year }}</td>
						<td>{{ $book->comment }}</td>
						<td>{{ $book->author->name }}</td>
						<td>{{ $book->sections() }}</td>
					</tr>
					@endforeach
				</table>
			  
				{!! $books->withQueryString()->links() !!}
					
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
