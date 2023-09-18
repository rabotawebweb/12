<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Редактировать автора <a class="btn btn-primary" href="{{ route('authors.index') }}"> <<назад</a>
        </h2>
    </x-slot>
	

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
		
			@include('blocks.errors', ['label' => 'Ошибки!'])
			
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <form action="{{ route('authors.update',$author->id) }}" method="POST">
						@csrf
						@method('PUT')
				   
						 <div class="row">
							
							@include('blocks.input', ['object' => $author ?? null, 'name' => 'name', 'label' => 'ФИО'])
							
							@include('blocks.select', ['object' => $author ?? null, 'name' => 'country_id', 'variable' => $countries, 'label' => 'Страна'])
							
							@include('blocks.textarea', ['object' => $author ?? null, 'name' => 'comment', 'label' => 'Комментарий'])
							
							@include('blocks.submit', ['label' => 'Сохранить'])
							
						</div>
				   
					</form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
