<div class="flex flex-row space-x-5 p-3 align-items-center justify-between">

    <span>Total de resultats: {{ $rows->total() }}</span>

    <span>{{ $rows->links() }}</span>

    <span class="w-20">
        <select wire:model="paginationCount" class="form-control">
            @foreach($paginationPossibleCounts as $number)
                <option value="{{ $number }}">{{ $number }}</option>
            @endforeach
        </select>
    </span>
</div>

