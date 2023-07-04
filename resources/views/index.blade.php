@extends('layouts.app')
{{-- @dd($pegawai); --}}


@section('body')
    {{-- Session --}}
    @if (session()->has('success'))
        <div id="alert-1"
            class="container absolute top-0 left-0 right-0 mx-auto mt-2 flex p-4 text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400"
            role="alert">
            <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                    clip-rule="evenodd"></path>
            </svg>
            <span class="sr-only">Info</span>
            <div class="ml-3 text-sm font-medium">
                {{ session('success') }}
            </div>
            <button type="button"
                class="ml-auto -mx-1.5 -my-1.5 bg-blue-50 text-blue-500 rounded-lg focus:ring-2 focus:ring-blue-400 p-1.5 hover:bg-blue-200 inline-flex h-8 w-8 dark:bg-gray-800 dark:text-blue-400 dark:hover:bg-gray-700"
                data-dismiss-target="#alert-1" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>
    @endif




    {{-- Title --}}
    <h1 class="text-2xl font-bold text-center mt-16 mb-10 text-sky-400"> {{ $title }}</h1>

    {{-- Section --}}
    <section class="" id="table">
        <div class="container mx-auto overflow-x-auto">

            {{-- Search Bar --}}
            <form action="/laravel-aaa/public/pegawai" method="get" class="container flex justify-center items-center">
                <input type="text" name="cari" autocomplete="off" placeholder="Masukkan Nama"
                    value="{{ request('cari') }}" class="input input-bordered input-sm w-full ms-1 max-w-xs my-6" />
                <button type="submit" id="cari"
                    class="text-white ms-4 bg-slate-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-1.5 dark:bg-slate-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Cari</button>
            </form>

            {{-- Table --}}
            <table class="table table-zebra">
                <!-- Table head -->
                <thead>
                    <tr class="bg-black/25">
                        {{-- <th>#</th> --}}
                        <th>NIP</th>
                        <th>Nama</th>
                        <th>Jabatan</th>
                        <th>Unit Kerja</th>
                        <th>Tempat Tugas</th>
                        <th>Golongan</th>
                        {{-- <th>Foto</th> --}}
                        <th class="block ms-2">Aksi</th>

                    </tr>
                </thead>

                <!-- Table body -->
                <tbody>
                    @foreach ($pegawai as $item)
                        <tr>
                            {{-- <td>{{ $loop->iteration }}</td> --}}
                            <td>{{ $item->NIP }}</td>
                            <td>{{ $item->data->nama }}</td>
                            <td>{{ $item->jabatan }}</td>
                            <td>{{ $item->unit_kerja }}</td>
                            <td>{{ $item->tempat_tugas }}</td>
                            <td>{{ $item->golongan->golongan }}</td>
                            {{-- <td>{{ $item->data->image }}</td> --}}
                            {{-- @if ($pegawai->image)
                                <img src="{{ asset('storage/' . $pegawai->image) }}" alt="" class="img-fluid">
                            @else
                            @endif --}}
                            <td>
                                <div class="flex flex-row gap-4 items-center">
                                    {{-- Lihat --}}
                                    <button onclick="my_modal_2_{{ $loop->iteration }}.showModal()"
                                        class="
                                            text-white block bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none
                                            focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center
                                            dark:bg-green-600 dark:hover:bg-green-700
                                            dark:focus:ring-green-800">Lihat</button>
                                    <dialog id="my_modal_2_{{ $loop->iteration }}" class="modal">
                                        <form method="dialog" class="modal-box">
                                            <div class="block font-bold text-lg mb-4 text-center">Data Pegawai
                                            </div>
                                            <h3 class="my-1 text-md">Nama : {{ $item->data->nama }}</h3>
                                            <h3 class="my-1 text-md">Jenis Kelamin : {{ $item->data->jk }}</h3>
                                            <h3 class="my-1 text-md">Tempat Lahir : {{ $item->data->tempat_lahir }}</h3>
                                            <h3 class="my-1 text-md">Tanggal Lahir :
                                                {{ $item->data->tanggal_lahir }}</h3>
                                            <h3 class="my-1 text-md">No HP : {{ $item->data->no_hp }}</h3>
                                        </form>
                                        <form method="dialog" class="modal-backdrop">
                                            <button>close</button>
                                        </form>
                                    </dialog>
                                    {{-- Hapus --}}
                                    <div class="container">
                                        <button onclick="my_modal_{{ $loop->iteration }}.showModal()"
                                            class="text-white block  bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Hapus</button>
                                        <dialog id="my_modal_{{ $loop->iteration }}" class="modal ">
                                            <div
                                                class="modal-box flex flex-col items-center justify-center absolute top-2 ">
                                                <h3 class="font-bold text-lg">Hapus</h3>
                                                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Yakin
                                                    menghapus data ini?</h3>
                                                <div class="flex">
                                                    <form method="post"
                                                        action="/laravel-aaa/public/pegawai/{{ $item->NIP }}">
                                                        @method('delete')
                                                        @csrf
                                                        <button
                                                            class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                                            Yes, I'm sure
                                                        </button>
                                                    </form>
                                                    <button type=""
                                                        onclick="my_modal_{{ $loop->iteration }}.close()""
                                                        class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                                        Esc
                                                    </button>
                                                </div>
                                            </div>
                                        </dialog>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{-- Button --}}
            <div class="grid grid-cols-3 gap-2 items-center">
                <div class="flex gap-2">
                    <a href="pegawai/create">
                        <button class="btn my-8 text-white bg-sky-800 hover:bg-sky-900">Tambah Data</button>
                    </a>
                    <a target="__blank" href="pegawai/cetak">
                        <button class="btn my-8 text-white bg-yellow-700 hover:bg-yellow-800">Cetak PDF</button>
                    </a>
                </div>
                <div class="justify-self-center">
                    {{ $pegawai->links('pagination::tailwind') }}
                </div>
                <div></div>
            </div>
        </div>
    </section>
@endsection

@section('footer')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.6/flowbite.min.js"></script>
@endsection
