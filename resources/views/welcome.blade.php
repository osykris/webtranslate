@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Cari Terminologi</h1>
        </div>
        <div class="section-body">
            <form>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Kata</label>
                    <textarea class="form-control" id="kata" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Terminologi</label>
                    <textarea class="form-control-plaintext" id="terminologi" rows="3" readonly></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Cari</button>
            </form>
        </div>
    </section>
@endsection
