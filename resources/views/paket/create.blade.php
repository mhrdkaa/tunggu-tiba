@extends('templates.layout')

@section('title', 'Buat Paket')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <div class="flex justify-center">
            <div class="w-full max-w-2xl">
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <div class="bg-blue-600 px-6 py-4">
                        <h3 class="text-2xl font-bold text-white text-center">Form Input Data Paket</h3>
                    </div>
                    
                    <div class="p-6">
                        @if(session('sukses'))
                            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                                {{ session('sukses') }}
                            </div>
                        @endif

                        <form action="{{ route('paket.store') }}" method="POST" class="space-y-6">
                            @csrf
                            
                            <div>
                                <label for="no_resi" class="block text-sm font-medium text-gray-700 mb-2">
                                    No Resi
                                </label>
                                <input 
                                    type="text" 
                                    id="no_resi" 
                                    name="no_resi" 
                                    value="{{ old('no_resi') }}"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('no_resi') border-red-500 @enderror"
                                    required
                                >
                                @error('no_resi')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="nama_paket" class="block text-sm font-medium text-gray-700 mb-2">
                                    Nama Paket
                                </label>
                                <input 
                                    type="text" 
                                    id="nama_paket" 
                                    name="nama_paket" 
                                    value="{{ old('nama_paket') }}"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('nama_paket') border-red-500 @enderror"
                                    required
                                >
                                @error('nama_paket')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="harga" class="block text-sm font-medium text-gray-700 mb-2">
                                    Harga
                                </label>
                                <input 
                                    type="number" 
                                    id="harga" 
                                    name="harga" 
                                    value="{{ old('harga') }}"
                                    step="0.01"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('harga') border-red-500 @enderror"
                                    required
                                >
                                @error('harga')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="status_paket" class="block text-sm font-medium text-gray-700 mb-2">
                                    Status Paket
                                </label>
                                <select 
                                    id="status_paket" 
                                    name="status_paket"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('status_paket') border-red-500 @enderror"
                                    required
                                >
                                    <option value="">Pilih Status</option>
                                    <option value="cod" {{ old('status_paket') == 'cod' ? 'selected' : '' }}>COD</option>
                                    <option value="non cod" {{ old('status_paket') == 'non cod' ? 'selected' : '' }}>Non COD</option>
                                </select>
                                @error('status_paket')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="flex flex-col sm:flex-row gap-3 pt-4">
                                <button 
                                    type="submit" 
                                    class="flex-1 bg-blue-600 hover:bg-blue-700 text-white font-medium py-3 px-4 rounded-md transition duration-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
                                >
                                    Simpan Data
                                </button>
                                <a 
                                    href="{{ route('paket.index') }}" 
                                    class="flex-1 bg-gray-500 hover:bg-gray-600 text-white font-medium py-3 px-4 rounded-md text-center transition duration-200 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2"
                                >
                                    Lihat Data
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection