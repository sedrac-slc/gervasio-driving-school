@forelse($students as $index => $student)
    <tr class="bg-white border-b hover:bg-gray-50 cursor-pointer"
        onclick="selectStudent('{{ $student->id }}', '{{ $student->user->name }}')">
        <td class="px-6 py-4">{{ $index + 1 }}</td>
        <td class="px-6 py-4">{{ $student->user->name ?? '-' }}</td>
        <td class="px-6 py-4">{{ $student->user->email ?? '-' }}</td>
        <td class="px-6 py-4">
            <button type="button"
                onclick="selectStudent('{{ $student->id }}', '{{ $student->user->name }}')"
                data-modal-hide="default-modal-student"
                class="text-blue-600 hover:underline text-sm">
                Selecionar
            </button>
        </td>
    </tr>
@empty
    <tr>
        <td colspan="8" class="px-6 py-4 text-center text-gray-500">
            Nenhuma estudante encontrada
        </td>
    </tr>
@endforelse
