@extends('dashboard.layout.main')

@section('content')
  
<div class="p-4 w-full overflow-x-hidden flex flex-col gap-5">
  <h1 class="font-medium text-4xl my-2">Kategori</h1>

  @if (Session::get('info'))
    <div class="p-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400" role="alert">
      {{ Session::get('info') }}
    </div>
  @endif

  <a href="/dashboard/kategori/create" class="flex flex-row gap-2 border border-blue-500 bg-white hover:bg-blue-500 hover:text-white text-blue-500 p-2 rounded-md w-fit" title="tambah kategori">
    <i class="fa-solid fa-plus my-auto"></i>
    <span>Katergori Baru</span>
  </a>

<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
  <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400" id="myTable">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
      <tr>
        <th scope="col" class="px-6 py-3">
            No
        </th>
        <th scope="col" class="px-6 py-3">
            Nama Kategori
        </th>
        <th scope="col" class="px-6 py-3">
            Deskripsi
        </th>
        <th scope="col" class="px-6 py-3">
            Operasi
        </th>
      </tr>
    </thead>

    <tbody>
      @php($no = 1)
      @foreach ($categories as $category)
        <tr class="bg-white hover:bg-gray-100 border-b dark:bg-gray-800 dark:border-gray-700">
          <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
              {{ $no++ }}
          </th>
          <td class="px-6 py-4 w-full">
              {{ $category->nama }}
          </td>
          <td class="px-6 py-4 w-full">
              {!! $category->deskripsi !!}
          </td>
          <td class="px-6 py-4 flex flex-row gap-1">
              <a href="/dashboard/kategori/{{ $category->id }}/edit" class="flex flex-row gap-1 font-medium py-2 px-3 rounded-md bg-yellow-300 hover:bg-yellow-400 text-gray-800 w-fit" title="edit kategori">
                <i class="fa-solid fa-pen-to-square my-auto"></i>
              </a>
              <form action="/dashboard/kategori/{{ $category->id }}" method="post" onsubmit="return confirm('Yakin ingin menghapus kategori ini ?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="flex flex-row gap-1 py-2 px-3 rounded-md bg-red-400 hover:bg-red-500 text-white" title="hapus kategori">
                  <i class="fa-solid fa-trash"></i>
                </button>
              </form>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>

@endsection