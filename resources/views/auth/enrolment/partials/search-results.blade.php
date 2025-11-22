@forelse($enrolments as $index => $enrolment)
    <tr class="bg-white border-b hover:bg-gray-50 cursor-pointer"
        onclick="selectEnrolment('{{ $enrolment->id }}', '{{ $enrolment->code }}')">
        <td class="px-6 py-4">{{ $index + 1 }}</td>
        <td class="px-6 py-4 font-medium">{{ $enrolment->code }}</td>
        <td class="px-6 py-4">{{ $enrolment->classroom->category->name ?? '-' }}</td>
        <td class="px-6 py-4">{{ $enrolment->student->user->name ?? '-' }}</td>
        <td class="px-6 py-4">{{ $enrolment->classroom->period ?? '-' }}</td>
        <td class="px-6 py-4">{{ $enrolment->classroom->starter ?? '-' }}</td>
        <td class="px-6 py-4">{{ $enrolment->classroom->finished ?? '-' }}</td>
        <td class="px-6 py-4">
            <button type="button"
                onclick="selectEnrolment('{{ $enrolment->id }}', '{{ $enrolment->code }}')"
                data-modal-hide="default-modal"
                class="text-blue-600 hover:underline text-sm">
                Selecionar
            </button>
        </td>
    </tr>
@empty
    <tr>
        <td colspan="8" class="px-6 py-4 text-center text-gray-500">
            Nenhuma matrícula encontrada
        </td>
    </tr>
@endforelse
