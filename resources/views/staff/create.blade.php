
<div class="container">
    <h1>Tambah Staff</h1>
    <link rel="stylesheet" href="{{ asset('css/create.css') }}">

    <form action="{{ route('staff.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
            @error('name')<span class="text-danger">{{ $message }}</span>@enderror
        </div>

        <div class="mb-3">
            <label for="id_library" class="form-label">ID Library</label>
            <input type="text" name="id_library" id="id_library" class="form-control" value="{{ old('id_library') }}">
            @error('id_library')<span class="text-danger">{{ $message }}</span>@enderror
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" id="password" class="form-control">
            @error('password')<span class="text-danger">{{ $message }}</span>@enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}">
            @error('email')<span class="text-danger">{{ $message }}</span>@enderror
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">No HP</label>
            <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone') }}">
            @error('phone')<span class="text-danger">{{ $message }}</span>@enderror
        </div>

        <div class="mb-3">
            <label for="level" class="form-label">Level</label>
            <select name="level" id="level" class="form-control">
                <option value="Admin" {{ old('level') == 'Admin' ? 'selected' : '' }}>Admin</option>
                <option value="Pengunjung" {{ old('level') == 'Pengunjung' ? 'selected' : '' }}>Pengunjung</option>
            </select>
            @error('level')<span class="text-danger">{{ $message }}</span>@enderror
        </div>

        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea name="alamat" id="alamat" class="form-control">{{ old('address') }}</textarea>
            @error('alamat')<span class="text-danger">{{ $message }}</span>@enderror
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('staff.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>

