@extends('layouts.main')

@section('header')
    {{-- <script src="../path/to/flowbite/dist/datepicker.js"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/datepicker.min.js"></script>
@endsection


@section('body')
    <h1 class="text-2xl font-bold text-center py-10 text-sky-400"> {{ $title }}</h1>

    <form method="post" action="/laravel-aaa/public/pegawai" enctype="multipart/form-data">
        @csrf
        {{-- Foto --}}
        <div class="flex flex-col items-center gap-6 my-12">
            <div class="relative w-40 h-40 mx-auto overflow-hidden bg-gray-100 rounded-full dark:bg-gray-600">
                <svg class="absolute w-44 h-44 text-gray-400 -left-2" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd">
                    </path>
                </svg>
            </div>
            <input type="file" class="file-input w-full max-w-xs border-slate-200 " name="image" />
        </div>

        {{-- GRID --}}
        <div class="grid grid-cols-2 gap-8 mx-auto justify-center px-40">
            <h1 class="text-2xl text-white font-medium">DATA PRIBADI</h1>
            <div></div>
            {{-- Nama --}}
            <div class="">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                <input type="name" id="name" name="nama"
                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light @error('name') is-invalid @enderror"
                    placeholder="" required autofocus value="{{ old('name') }}">
                @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            {{-- Tempat Lahir --}}
            <div class="">
                <label for="tempat-lahir" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tempat
                    Lahir</label>
                <input type="text" id="tempat-lahir" name="tempat_lahir"
                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                    placeholder="" required>
            </div>
            {{-- Tanggal Lahir --}}
            <div class="relative ">
                <div class="absolute bottom-3 left-0 flex items-center pl-3 pointer-events-none">
                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor"
                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                            clip-rule="evenodd"></path>
                    </svg>
                </div>
                <label for="tanggal-lahir" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                    Lahir</label>
                <input datepicker datepicker-autohide datepicker-title="Pilih Tanggal Lahir" type="text"
                    datepicker-format="dd/mm/yyyy" id="tanggal-lahir" name="tanggal_lahir"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    value="01/01/1999">
            </div>
            {{-- Email --}}
            <div class="">
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                <input type="text" id="email" name="email"
                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                    value="example@gmail.com" required>
            </div>

            {{-- No Hp dan NPWP --}}
            <div class="flex gap-2 justify-stretch">
                <div class="w-1/2">
                    <label for="no_hp" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomor
                        Handphone</label>
                    <input type="text" id="no_hp" name="no_hp"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                        value="0852212222" required>
                </div>
                <div class="w-1/2">
                    <label for="npwp" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NPWP</label>
                    <input type="text" id="npwp" name="npwp"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                        value="123456" required>
                </div>
            </div>
            {{-- Jenis Kelamin --}}
            <div class=" flex flex-row items-end justify-start gap-6">
                <div class=" flex items-center mb-4">
                    <input id="laki-laki" type="radio" value="L" name="jk" checked required
                        class="radio w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                        required>
                    <label for="laki-laki"
                        class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Laki-laki</label>
                </div>
                <div class=" flex items-center mb-4">
                    <input id="perempuan" type="radio" value="P" name="jk"
                        class="radio w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="perempuan" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Perempuan
                    </label>
                </div>
            </div>



            <h1 class="text-2xl mt-20 text-white font-medium">DATA KEPEGAWAIAN</h1>
            <div></div>
            {{-- Jabatan --}}
            <div class="">
                <label for="jabatan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jabatan</label>
                <input type="jabatan" id="jabatan" name="jabatan"
                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                    value="Kepala Unit" required>
            </div>
            {{-- Tempat Tugas --}}
            <div class="">
                <label for="tempat-tugas" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tempat
                    Tugas</label>
                <input type="tempat-tugas" id="tempat-tugas" name="tempat_tugas"
                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                    value="Jakarta" required>
            </div>
            {{-- Unit Kerja --}}
            <div class="">
                <label for="unit-kerja" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Unit
                    Kerja</label>
                <input type="unit-kerja" id="unit-kerja" name="unit_kerja"
                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                    value="Teknisi" required>
            </div>
            {{-- Golongan --}}
            <div class="">
                <label for="select" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Golongan</label>
                <select id="select"
                    class="select h-8  shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                    name="golongan">
                    {{-- <option disabled selected>Jenis Kelamin</option> --}}
                    <option value="IV/c">IV/c</option>
                    <option value="III/a">III/a</option>
                </select>
            </div>

        </div>
        {{-- Checkbox --}}
        <div class="mb-24 flex flex-col px-40 ">
            <div class="flex mx-auto justify-center mt-12 mb-8 ">
                <div class="flex h-5">
                    <input id="terms" type="checkbox" value=""
                        class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800"
                        required>
                </div>
                <label for="terms" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Saya memastikan
                    data yang saya kirimkan benar
                    {{-- <a href="#" class="text-blue-600 hover:underline dark:text-blue-500">terms and
                        conditions</a></label> --}}
            </div>
            {{-- Button --}}
            <button type="submit"
                class="text-white block  bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Tambahkan
                Data
            </button>
        </div>


    </form>
@endsection

@section('footer')
    <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
@endsection
