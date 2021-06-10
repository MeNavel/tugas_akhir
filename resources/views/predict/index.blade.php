@extends('predict/template')
 
@section('content')
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Daftar Pelanggar Penggunaan Masker</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-success" href="{{ route('predict.create') }}"> Create predict</a>
            </div>
            <div class="float-right">
                <a class="btn btn-secondary" href="{{ route('dashboard') }}"> Back</a>
            </div>
        </div>
    </div>
 
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif
 
    <table class="table table-bordered">
        <tr>
            <th width="20px" class="text-center">No</th>
            <th>Nama</th>
            <th width="400px"class="text-center">Status</th>
            <th width="280px"class="text-center">Action</th>
        </tr>
        @foreach ($predicts as $predict)
        <tr>
            <td class="text-center">{{ ++$i }}</td>
            <td>{{ $predict->nama }}</td>
            <td>{{ $predict->status }}</td>
            <td class="text-center">
                <form action="{{ route('predict.destroy',$predict->id) }}" method="POST">
 
                    <a class="btn btn-info btn-sm" href="{{ route('predict.show',$predict->id) }}">Show</a>
 
                    <a class="btn btn-primary btn-sm" href="{{ route('predict.edit',$predict->id) }}">Edit</a>
 
                    @csrf
                    @method('DELETE')
 
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
 
    {!! $predicts->links() !!}
 
@endsection