@extends('layouts.app')

@section('title', 'Tambah Kuliner - Admin')

@section('content')

<style>
    /* CSS Select2 (Sama seperti Destinasi & Budaya) */
    .select2-container--default .select2-selection--single {
        background-color: #f8fafc !important;
        border: 1px solid #cbd5e1 !important;
        border-radius: 0.75rem !important;
        height: 50px !important;
        display: flex !important;
        align-items: center !important;
        box-sizing: border-box !important;
        transition: all 0.2s !important;
    }

    .dark .select2-container--default .select2-selection--single {
        background-color: #1e293b !important;
        border-color: #334155 !important;
    }

    .select2-container--default .select2-selection--single .select2-selection__rendered {
        color: #0f172a !important;
        padding-left: 1rem !important;
        padding-right: 2.5rem !important;
        font-size: 0.875rem !important;
        line-height: normal !important;
        margin-top: 2px;
    }

    .dark .select2-container--default .select2-selection--single .select2-selection__rendered {
        color: #ffffff !important;
    }

    .select2-container--default .select2-selection--single .select2-selection__arrow {
        height: 100% !important;
        right: 12px !important;
        display: flex !important;
        align-items: center !important;
    }

    .select2-container--default .select2-selection--single .select2-selection__arrow b {
        border-color: #64748b transparent transparent transparent !important;
    }

    .dark .select2-container--default .select2-selection--single .select2-selection__arrow b {
        border-color: #94a3b8 transparent transparent transparent !important;
    }

    .select2-dropdown {
        background-color: #ffffff !important;
        border: 1px solid #cbd5e1 !important;
        border-radius: 0.75rem !important;
        box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1) !important;
        z-index: 9999 !important;
        padding: 4px !important;
        margin-top: 4px !important;
    }

    .dark .select2-dropdown {
        background-color: #0f172a !important;
        border-color: #334155 !important;
    }

    .select2-search--dropdown .select2-search__field {
        border-radius: 0.5rem !important;
        background-color: #f8fafc !important;
        border: 1px solid #cbd5e1 !important;
        color: #0f172a !important;
        padding: 0.5rem 0.75rem !important;
        margin: 4px !important;
        width: calc(100% - 8px) !important;
        outline: none !important;
    }

    .dark .select2-search--dropdown .select2-search__field {
        background-color: #1e293b !important;
        border-color: #334155 !important;
        color: #ffffff !important;
    }

    .select2-results__option {
        padding: 8px 12px !important;
        font-size: 0.875rem !important;
        border-radius: 0.5rem !important;
        margin: 2px 4px !important;
        color: #0f172a !important;
    }

    .dark .select2-results__option {
        color: #e2e8f0 !important;
    }

    .select2-container--default .select2-results__option--highlighted.select2-results__option--selectable {
        background-color: #10b981 !important;
        color: white !important;
    }

    .select2-container--default .select2-results__option--selected {
        background-color: #e2e8f0 !important;
        color: #0f172a !important;
    }

    .dark .select2-container--default .select2-results__option--selected {
        background-color: #334155 !important;
        color: #ffffff !important;
    }

    .select2-results__group {
        font-weight: bold;
        color: #10b981;
        padding: 8px 12px 4px 12px !important;
        font-size: 0.75rem;
        text-transform: uppercase;
        letter-spacing: 0.05em;
    }
</style>

<div class="min-h-screen bg-slate-50 dark:bg-[#0b1120] py-10 transition-colors duration-300">
    <div class="container mx-auto px-4 md:px-6 max-w-4xl">

        <div class="flex items-center justify-between mb-8">
            <div>
                <h1 class="text-3xl font-black text-slate-900 dark:text-white">Tambah Kuliner</h1>
                <p class="text-slate-500 dark:text-slate-400 mt-1">Tambahkan data kuliner khas baru.</p>
            </div>
            <a href="{{ route('admin.kuliner.index') }}" class="bg-slate-200 dark:bg-slate-800 text-slate-700 dark:text-slate-300 px-5 py-2.5 rounded-xl font-bold hover:bg-slate-300 dark:hover:bg-slate-700 transition">
                <i class="fas fa-arrow-left mr-2"></i> Kembali
            </a>
        </div>

        @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-xl mb-6">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <div class="bg-white dark:bg-[#0f172a] rounded-2xl shadow-xl border border-slate-200 dark:border-slate-800 p-6 md:p-8">
            <form action="{{ route('admin.kuliner.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Nama Kuliner</label>
                        <input type="text" name="nama" value="{{ old('nama') }}" required class="w-full px-4 py-3 rounded-xl border border-slate-300 dark:border-slate-700 bg-slate-50 dark:bg-slate-800 text-slate-900 dark:text-white focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Provinsi</label>
                        <select id="filterProvinsi" class="w-full px-4 py-3 rounded-xl border border-slate-300 dark:border-slate-700 bg-slate-50 dark:bg-slate-800 text-slate-900 dark:text-white focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                            <option value="">-- Pilih Provinsi --</option>
                            @foreach($kabupatens->unique('provinsi_id') as $kab)
                            <option value="{{ $kab->provinsi_id }}">{{ $kab->provinsi->nama ?? 'Unknown' }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Kabupaten / Kota</label>
                        <select name="kabupaten_id" id="filterKabupaten" required class="w-full">
                            <option value="">-- Pilih Kabupaten --</option>
                            @foreach($kabupatens as $kab)
                            <option value="{{ $kab->id }}" data-provinsi="{{ $kab->provinsi_id }}" {{ old('kabupaten_id') == $kab->id ? 'selected' : '' }}>
                                {{ $kab->nama }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Jenis Kuliner</label>
                        <select name="jenis" id="jenis" required class="w-full">
                            <option value="">-- Pilih / Ketik Jenis --</option>
                            <option value="makanan" {{ old('jenis') == 'makanan' ? 'selected' : '' }}>Makanan</option>
                            <option value="minuman" {{ old('jenis') == 'minuman' ? 'selected' : '' }}>Minuman</option>
                            <option value="snack" {{ old('jenis') == 'snack' ? 'selected' : '' }}>Snack</option>
                            <option value="dessert" {{ old('jenis') == 'dessert' ? 'selected' : '' }}>Dessert</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Harga (Angka)</label>
                        <input type="number" name="harga" value="{{ old('harga', 0) }}" required class="w-full px-4 py-3 rounded-xl border border-slate-300 dark:border-slate-700 bg-slate-50 dark:bg-slate-800 text-slate-900 dark:text-white focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Upload Gambar</label>
                        <input type="file" name="gambar" accept="image/*" required class="w-full px-4 py-2.5 rounded-xl border border-slate-300 dark:border-slate-700 bg-slate-50 dark:bg-slate-800 text-slate-900 dark:text-white focus:outline-none file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-orange-50 file:text-orange-700 hover:file:bg-orange-100 dark:file:bg-orange-900/30 dark:file:text-orange-400">
                    </div>
                </div>

                <div class="mb-8">
                    <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Deskripsi</label>
                    <textarea name="deskripsi" rows="4" required class="w-full px-4 py-3 rounded-xl border border-slate-300 dark:border-slate-700 bg-slate-50 dark:bg-slate-800 text-slate-900 dark:text-white focus:ring-2 focus:ring-emerald-500 focus:outline-none">{{ old('deskripsi') }}</textarea>
                </div>

                <div class="flex justify-end gap-4 pt-4 border-t border-slate-200 dark:border-slate-800">
                    <button type="submit" class="bg-emerald-600 hover:bg-emerald-500 text-white font-bold px-8 py-3 rounded-xl transition-all shadow-lg shadow-emerald-600/30">
                        <i class="fas fa-save mr-2"></i> Simpan Kuliner
                    </button>
                </div>
            </form>
        </div>

    </div>
</div>

{{-- LIBRARY CDN --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var provSelect = document.getElementById('filterProvinsi');
        var kabSelect = document.getElementById('filterKabupaten');
        var allKabOptions = Array.from(kabSelect.querySelectorAll('option[data-provinsi]'));

        $(provSelect).select2({
            placeholder: "-- Pilih Provinsi --",
            width: '100%'
        });
        $(kabSelect).select2({
            placeholder: "-- Pilih Kabupaten --",
            width: '100%'
        });

        $('#jenis').select2({
            placeholder: "-- Pilih atau Ketik Jenis --",
            width: '100%',
            tags: true,
            createTag: function(params) {
                var term = $.trim(params.term);
                if (term === '') {
                    return null;
                }
                return {
                    id: term.toLowerCase().replace(/\s/g, '_'),
                    text: term,
                    newTag: true
                }
            }
        });

        function filterKabupaten() {
            var selectedProv = provSelect.value;
            kabSelect.innerHTML = '<option value="">-- Pilih Kabupaten --</option>';
            if (selectedProv !== '') {
                allKabOptions.forEach(function(opt) {
                    if (opt.getAttribute('data-provinsi') === selectedProv) {
                        kabSelect.appendChild(opt.cloneNode(true));
                    }
                });
            }
            $(kabSelect).trigger('change');
        }

        $(provSelect).on('change', function() {
            filterKabupaten();
        });

        var oldKabId = "{{ old('kabupaten_id') }}";
        if (provSelect.value) {
            filterKabupaten();
            if (oldKabId) {
                setTimeout(function() {
                    $(kabSelect).val(oldKabId).trigger('change');
                }, 100);
            }
        }
    });
</script>
@endsection