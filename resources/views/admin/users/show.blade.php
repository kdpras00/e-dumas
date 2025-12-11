@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <!-- Breadcrumb -->
    <nav class="flex mb-8" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-3">
            <li class="inline-flex items-center">
                <a href="{{ route('dashboard') }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600">
                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
                    Dashboard
                </a>
            </li>
            <li>
                <div class="flex items-center">
                    <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                    <a href="{{ route('admin.users.index') }}" class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2">Master User</a>
                </div>
            </li>
            <li>
                <div class="flex items-center">
                    <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                    <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2">Detail User</span>
                </div>
            </li>
        </ol>
    </nav>

    <!-- Header Card -->
    <div class="bg-blue-700 rounded-2xl shadow-lg p-8 mb-8 text-white relative overflow-hidden">
        <div class="relative z-10 flex flex-col md:flex-row justify-between items-center gap-4">
            <div>
                <h1 class="text-3xl font-bold tracking-wide">Detail User</h1>
                <p class="text-blue-100 mt-1 text-sm">Informasi lengkap pengguna aplikasi</p>
            </div>
        </div>
        <!-- Decorative Circle -->
        <div class="absolute top-0 right-0 -mt-10 -mr-10 w-40 h-40 bg-white opacity-10 rounded-full blur-2xl"></div>
        <div class="absolute bottom-0 left-0 -mb-10 -ml-10 w-40 h-40 bg-white opacity-10 rounded-full blur-2xl"></div>
    </div>

    <!-- Detail Card -->
    <div class="bg-white rounded-2xl shadow-md border border-gray-100 overflow-hidden">
        <div class="p-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Left Column -->
                <div class="space-y-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-500 mb-1">Username</label>
                        <div class="text-lg font-semibold text-gray-900">{{ $user->username }}</div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-500 mb-1">Nama Lengkap</label>
                        <div class="text-lg font-semibold text-gray-900">{{ $user->nama_lengkap }}</div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-500 mb-1">NIK</label>
                        <div class="text-lg font-semibold text-gray-900">{{ $user->nik }}</div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-500 mb-1">Email</label>
                        <div class="text-lg font-semibold text-gray-900">{{ $user->email }}</div>
                    </div>
                </div>

                <!-- Right Column -->
                <div class="space-y-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-500 mb-1">No. HP</label>
                        <div class="text-lg font-semibold text-gray-900">{{ $user->no_hp }}</div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-500 mb-1">Level</label>
                        <div>
                            <span class="px-3 py-1 inline-flex text-sm leading-5 font-semibold rounded-full {{ $user->user_level_id == 3 ? 'bg-purple-100 text-purple-800' : ($user->user_level_id == 2 ? 'bg-blue-100 text-blue-800' : ($user->user_level_id == 4 ? 'bg-yellow-100 text-yellow-800' : 'bg-green-100 text-green-800')) }}">
                                {{ $user->level->user_level ?? '-' }}
                            </span>
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-500 mb-1">RT / RW</label>
                        <div class="text-lg font-semibold text-gray-900">
                            @if($user->rt)
                                RT {{ $user->rt->rt }} / RW {{ $user->rt->rw->rw }}
                            @else
                                -
                            @endif
                        </div>
                    </div>
                    @if($user->kategori)
                    <div>
                        <label class="block text-sm font-medium text-gray-500 mb-1">Kategori Petugas</label>
                        <div class="text-lg font-semibold text-gray-900">{{ $user->kategori->kategori }}</div>
                    </div>
                    @endif
                </div>
            </div>

            <!-- Full Width Address -->
            <div class="mt-8 pt-8 border-t border-gray-100">
                <label class="block text-sm font-medium text-gray-500 mb-1">Alamat Lengkap</label>
                <div class="text-lg font-semibold text-gray-900">{{ $user->alamat }}</div>
            </div>
        </div>
    </div>
</div>
@endsection
