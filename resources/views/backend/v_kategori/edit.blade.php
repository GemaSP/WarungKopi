<!-- Modal -->
@foreach ($kategori as $item)
<div class="modal fade" id="ubahModal{{ $item->id }}" tabindex="-1" data-backdrop="static" aria-labelledby="ubahModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ubah Kategori</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('backend.kategori.update', $item->id) }}" method="post">
                <div class="modal-body">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="nama_kategori">Nama Kategori</label>
                        <input value="{{ old('nama_kategori', $item->nama_kategori) }}" type="text" class="form-control" id="nama_kategori" name="nama_kategori">
                    </div>
                    @error('nama_kategori')
                    <div class="text text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Ubah</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach