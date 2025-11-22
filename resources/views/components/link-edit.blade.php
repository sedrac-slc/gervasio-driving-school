<a href="{{ $redirect ? '#' : $href }}" id="btn-edit" class="font-medium hover:underline btn-edit"
data-json="{{$json}}"
    @if ($redirect) data-accordion-target="#accordion-collapse-body-1"
        aria-controls="accordion-collapse-body-1"
        data-url="{{ $href }}"
        aria-expanded="false"
       @endif>
    <i class="fa fa-pencil-square-o text-blue-600 dark:text-blue-500" aria-hidden="true"></i>
</a>
