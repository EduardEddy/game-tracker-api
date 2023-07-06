@foreach ($attractions as $key => $attraction)
    @php
        $pricef = $price15 = $price30 = $price60 = 'N/A';
        if ($attraction->is_free_time) {
            foreach ($attraction->prices as $j => $price) {
                if ($price->time == 0) {
                    $pricef = $price->price;
                }
            }
        } else {
            foreach ($attraction->prices as $k => $price) {
                if ($price->time == 15) {
                    $price15 = $price->price;
                }
                if ($price->time == 30) {
                    $price30 = $price->price;
                }
                if ($price->time == 60) {
                    $price60 = $price->price;
                }
            }
        }
    @endphp
    <tr>
        <th scope="row">{{ $key + 1 }}</th>
        <td>{{ $attraction->name }}</td>
        <td>
            @if ($attraction->is_free_time)
                No maneja tiempo
            @endif
        </td>
        <td>
            {{ $pricef }}
        </td>
        <td>
            {{ $price15 }}
        </td>
        <td>
            {{ $price30 }}
        </td>
        <td>
            {{ $price60 }}
        </td>
        <td>
            <a href='{{ url("/attractions/{$attraction->id} ") }}' class="btn btn-info">
                <i class="fas fa-edit"></i>
            </a>
        </td>
        <td>
            <a href='{{ route('attractions.destroy', $attraction->id) }}' class="btn btn-danger">
                <i class="fas fa-trash"></i>
            </a>
        </td>
    </tr>
@endforeach
