<div class="form-group">
    <label for="logo">logo</label>
    <input type="file" name="logo" id="logo" placeholder="logo" class="form-control"
        value="{{ old('logo') ?? $companie->logo }}">
    @error('logo')
        <div class="text-danger mt-2">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="nama">Nama</label>
    <input type="text" name="name" id="nama" placeholder="nama" class="form-control"
        value="{{ old('name') ?? $companie->name }}">
    @error('name')
        <div class="text-danger mt-2">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="nama">Email</label>
    <input type="email" name="email" id="email" placeholder="email" class="form-control"    value="{{ old('email') ?? $companie->email }}">
    @error('email')
        <div class="text-danger mt-2">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="website">website</label>
    <input type="text" name="website" id="website" placeholder="website" class="form-control"    value="{{ old('website') ?? $companie->website }}">
    @error('website')
        <div class="text-danger mt-2">{{ $message }}</div>
    @enderror
</div>



<button class="btn btn-primary">
    {{$submit}}
</button>