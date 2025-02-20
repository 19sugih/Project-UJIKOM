{{-- @extends berfungsi untuk meng-extend file yang di dalam folder layouts --}}
{{-- folder layouts terletak di dalam folder resources/views --}}
{{-- di dalam file app.blade.php terdapat kode yang akan di-include --}}
{{-- kode yang di-include tersebut adalah kode untuk membuat halaman utama --}}
{{-- halaman utama terdiri dari header, content, dan footer --}}
{{-- @section berfungsi untuk mendefinisikan section --}}
{{-- section yang di definisikan adalah content --}}
{{-- content adalah bagian yang akan di-include di dalam file app.blade.php --}}
@extends('layouts.app')

@section('content')
    <h1>Halaman Category</h1>
    
@endsection