@extends('layouts.app')
@section('content')
    <div class="container mx-auto flex justify-center py-5">

        <div class="bg-slate-100 w-[800px] p-5 rounded-sm shadow-md">
            <h1 class="capitalize text-center font-semibold mb-4 text-3xl">form pendaftaran <span
                    class="uppercase">siswa</span>
            </h1>
            <form action="{{ route('pendaftaran.store') }}" method="POST" class="w-full mt-10">
                @csrf

                <div class="my-2 flex">
                    <label for="" class="capitalize w-72">nama lengkap</label>
                    <div class="flex flex-col w-full">
                        <input
                            class="border-2 w-full @error('nama_lengkap')
                border-red-500/80
            @enderror "
                            type="text" name="nama_lengkap" id="nama_lengkap" placeholder="Nama lengkap"
                            value="{{ old('nama_lengkap') }}">
                        @error('nama_lengkap')
                            <small class="text-red-500">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="my-2 flex">
                    <label for="" class="capitalize w-72">sekolah asal</label>
                    <div class="flex flex-col w-full">
                        <input
                            class="border-2 w-full @error('sekolah_asal')
                border-red-500
            @enderror "
                            type="text" name="sekolah_asal" id="sekolah_asal" placeholder="Sekolah asal"
                            value="{{ old('sekolah_asal') }}">
                        @error('sekolah_asal')
                            <small class="text-red-500">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="my-2 flex">
                    <label for="" class="capitalize w-72">alamat</label>
                    <div class="flex flex-col w-full">
                        <textarea name="alamat" class="border-2 w-full @error('alamat')
                border-red-500
            @enderror "
                            id="alamat" cols="30" rows="10" placeholder="Alamat lengkap">{{ old('alamat') }}</textarea>
                        @error('alamat')
                            <small class="text-red-500">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="my-2 flex">
                    <label for="" class="capitalize w-72">Jurusan</label>
                    <div class="flex flex-col w-full">
                        <select name="jurusan" id=""
                            class="border-2 @error('jurusan')
                border-red-500
            @enderror w-full">
                            <option value="">Pilih Jurusan</option>
                            @foreach ($jurusans as $jurusan)
                                <option value="{{ $jurusan->nama_jurusan }}">{{ $jurusan->nama_jurusan }}</option>
                            @endforeach
                        </select>
                        @error('jurusan')
                            <small class="text-red-500">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <button type="submit" class="bg-blue-500 text-white px-3 py-1 rounded-sm w-full mt-2">save</button>

            </form>
        </div>

    </div>
@endsection
