@if(isset($links) && $links->count() > 0)
    {{ $links->links() }}
@else
    <div class="border-2 border-dashed m-5 border-gray-400 p-6 text-center rounded-lg my-4 md:py-15 text-gray-600 font-semibold">
        Nenhum resultado encontrado
    </div>
@endif
