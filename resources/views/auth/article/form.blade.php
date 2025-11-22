 <form class="bg-white p-2 rounded-2xl" id="form-action"
     action="{{ route('articles.store') }}" method="POST">
     @csrf
     @method('POST')
     <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-3">
         <div>
             <x-input-field label="Digita o nome" name="name" value="{{ $article->name ?? old('name') }}" />
         </div>
         <div>
             <x-input-field label="Digita o preço" type="number" name="price" value="{{ $article->price ?? old('price') }}" />
         </div>
     </div>
     <x-submit-confirm />
 </form>
