<div class="container">
    <h1>Edit Staff</h1>
    <link rel="stylesheet" href="{{ asset('css/edit.css') }}">

    <form action="{{ route('staff.update', $staff->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $staff->name) }}">
            @error('name')<span class="text-danger">{{ $message }}</span>@enderror
        </div>

        <div class="mb-3">
            <label for="id_library" class="form-label">ID Library</label>
            <input type="text" name="id_library" id="id_library" class="form-control" value="{{ old('id_library', $staff->id_library) }}">
            @error('id_library')<span class="text-danger">{{ $message }}</span>@enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $staff->email) }}">
            @error('email')<span class="text-danger">{{ $message }}</span>@enderror
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone', $staff->phone) }}">
            @error('phone')<span class="text-danger">{{ $message }}</span>@enderror
        </div>

        <div class="mb-3">
            <label for="level" class="form-label">Level</label>
            <select name="level" id="level" class="form-control">
                <option value="Admin" {{ old('level', $staff->level) == 'Admin' ? 'selected' : '' }}>Admin</option>
                <option value="Pengunjung" {{ old('level', $staff->level) == 'Pengunjung' ? 'selected' : '' }}>Pengunjung</option>
            </select>
            @error('level')<span class="text-danger">{{ $message }}</span>@enderror
        </div>

        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea name="alamat" id="alamat" class="form-control">{{ old('address', $staff->address) }}</textarea>
            @error('address')<span class="text-danger">{{ $message }}</span>@enderror
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('staff.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
