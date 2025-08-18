<div>
    @php
    $t = $this->table;
    $records = $t->getRecords();
    $fform = $t->getFiltersForm();
    dump($fform);
    @endphp

    @foreach ($records as $record)
    <pre>
    {{ $record->title }}
    </pre>
    @endforeach
    {{ $records->links() }}
</div>