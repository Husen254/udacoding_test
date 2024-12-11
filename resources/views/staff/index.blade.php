
<div class="container">
    <h1>Daftar Staff</h1>
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('staff.create') }}" class="btn btn-primary mb-3">Tambah Staff</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>ID Library</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Level</th>
                <th>alamat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($staff as $staff)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $staff->name }}</td>
                    <td>{{ $staff->id_library }}</td>
                    <td>{{ $staff->email }}</td>
                    <td>{{ $staff->phone }}</td>
                    <td>{{ $staff->level }}</td>
                    <td>{{ $staff->alamat }}</td>
                    <td>
                        <a href="{{ route('staff.edit', $staff->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('staff.destroy', $staff->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus staff ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">Tidak ada data staff</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit">Logout</button>
    </form>
</div>
