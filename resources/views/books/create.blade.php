<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Добавить книгу <a class="btn btn-primary" href="{{ route('books.index') }}"> <<назад</a>
        </h2>
    </x-slot>
	

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
		
			@include('blocks.errors', ['label' => 'Ошибки!'])
			
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data">
						@csrf
					  
						 <div class="row">
						 
							@include('blocks.input', ['object' => $book ?? null, 'name' => 'name', 'label' => 'Название'])
							
							@include('blocks.input', ['object' => $book ?? null, 'name' => 'year', 'label' => 'Год'])
							
							@include('blocks.select', ['object' => $book ?? null, 'name' => 'author_id', 'variable' => $authors, 'label' => 'Автор'])
							
							@include('blocks.checkbox', ['object' => $book ?? null, 'name' => 'catalogs', 'variable' => $catalogs, 'label' => 'Разделы'])
							
							@include('blocks.textarea', ['object' => $book ?? null, 'name' => 'comment', 'label' => 'Описание'])
							
							<div class="col-xs-12 col-sm-12 col-md-12">
								<div class="form-group">
									<strong>Обложка:</strong>
									<input type="file" name="imagefile" accept="image/jpeg,image/png">
								</div>
							</div>
							
							@include('blocks.submit', ['label' => 'Сохранить'])
							
						</div>
					   
					</form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
