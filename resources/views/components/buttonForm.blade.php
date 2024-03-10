<br>
<div class="text-center">
    @if ($form == 'Detail')
        <a href="{{$back}}" class="btn btn-secondary">Kembali</a>
    @else
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{$back}}" class="btn btn-secondary">Kembali</a>
    @endif
</div>