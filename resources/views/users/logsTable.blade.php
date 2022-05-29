<table class="table bg-white">
    <thead class="bg-dark text-light">
        <th>Role</th>
        <th>Name</th>
        <th>Action</th>
        <th>Date</th>
    </thead>

    <tbody>
    @forelse ($logs as $row) 
        <tr>
            <td data-title="Role">
            @if ($row->role_as == 1)
                    Admin
            @else 
                Staff
            @endif
            </td>
            <td data-title="Name">{{ $row->name }}</td>
            <td data-title="Action">{{ $row->description }}</td>
            <td data-title="Date">{{ $row->created_at }}</td>
        </tr>
    @empty
        <tr class="text-center">
            <td colspan="4">
                <h5>No Logs</h5>
            </td>
        </tr>
    @endforelse
    </tbody>
</table>