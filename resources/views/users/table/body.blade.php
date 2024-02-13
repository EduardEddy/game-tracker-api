@foreach ($collaborators as $key => $collaborator)
    <tr>
        <th scope="row">{{ $key + 1 }}</th>
        <td>{{ $collaborator->name }}</td>
        <td>{{ $collaborator->last_name }}</td>
        <td>{{ $collaborator->email }}</td>
        <td>
            <a href='{{ url("/collaborators/{$collaborator->id} ") }}' class="btn btn-info">
                <i class="fas fa-edit"></i>
            </a>
        </td>
        <td>
            <button onClick="confirmDeleteUser({{$collaborator->id}}, '{{$collaborator->name}} {{$collaborator->last_name}}')" class="btn btn-danger">
                <i class="fas fa-trash"></i>
            </button>
        </td>
    </tr>
@endforeach
