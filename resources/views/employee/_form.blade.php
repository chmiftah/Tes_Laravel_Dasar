<div class="form-group">
    <label for="nama">Nama</label>
    <input type="text" name="nama" id="nama" placeholder="nama" class="form-control"
        value="{{ old('nama') ?? $employee->nama }}">
    @error('nama')
        <div class="text-danger mt-2">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="nama">Email</label>
    <input type="email" name="email" id="email" placeholder="email" class="form-control"
        value="{{ old('email') ?? $employee->email }}">
    @error('email')
        <div class="text-danger mt-2">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="nama">Companie</label>
    <select id='companies' name="companies_id" class="form-control">
        @if ($employee->companies)
            @foreach ($companies as $item)
                <option {{ $employee->companies()->find($item->id) ? 'selected' : '' }} value="{{ $item->id }}"">{{ $item->name }}</option>                
           @endforeach
                @else
                <option disabled selected>choose companie</option>
            @endif
    </select>
    @error('companies_id')
        <div class="text-danger mt-2">{{ $message }}</div>
    @enderror
</div>


<button class="btn btn-primary mt-3">
    {{ $submit }}
</button>

<script type="text/javascript" src='//ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    (function() {
        $("#companies").select2({
            placeholder: 'Channel...',
            // width: '350px',
            allowClear: true,
            ajax: {
                url: '/dataforselect2',
                dataType: 'json',
                delay: 250,
                data: function(params) {
                    return {
                        term: params.term || '',
                        page: params.page || 1
                    }
                },
                cache: true
            }
        });
    })();
</script>
