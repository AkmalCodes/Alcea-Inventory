@foreach ($recentUpdatedItems as $item)
    <tr>
        <td>{{ $item->inventory->name }} <strong>[ {{ $item->inventory->supplier_name }} ]</strong></td>
        <td>{{ $item->performed_by }}</td>
        <td>{{ $item->action_type }}</td>
        <td>{{ $item->updated_at->format('d/m/Y') }}</td>
    </tr>
@endforeach
