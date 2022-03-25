@extends('layout.admin')

@section('title', 'Admin Dashboard')

@section('page', 'Pengrajin > pengrajin')

@section('content')
<div class="col-lg-12">
<h3 calss="mb-2">Daftar Pengrajin</h3>
<div class="statbox widget box box-shadow">
    <div class="widget-header">
        <div class="row">
            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
            </div>
        </div>
    </div>
    <div class="widget-content widget-content-area">
        <a class="btn btn-primary mb-2 ml-3" href="{{ route('user.create') }}"><i>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-plus-circle">
                    <circle cx="12" cy="12" r="10"></circle>
                    <line x1="12" y1="8" x2="12" y2="16"></line>
                    <line x1="8" y1="12" x2="16" y2="12"></line>
                </svg>
            </i> Tambah Pengrajin</a>
        <div class="table-responsive mb-4">
            <table id="zero-config" class="table style-3 table-hover">
                <thead>
                    <tr>
                        <th></th>
                        <th>nama toko</th>
                        <th>pemilik</th>
                        <th>telepon</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $b)
                        <tr>
                            <td class="text-center">
                                <img src="{{ asset('storage/' . $b->logo) }}" alt="Rumah Batik Probolinggo" srcset="" width="100px">
                            </td>
                            <td>{{ $b->name }}</td>
                            <td>{{ $b->owner }}</td>
                            <td>{{ $b->phone }}</td>
                            <td class="text-center">
                                <ul class="table-controls">
                                    <li><a href="{{ route('user.show', $b->id) }}" class="bs-tooltip"
                                            data-toggle="tooltip" data-placement="top" title=""
                                            data-original-title="Edit"><svg xmlns="http://www.w3.org/2000/svg"
                                                width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round"
                                                class="feather feather-edit-2 p-1 br-6 mb-1">
                                                <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z">
                                                </path>
                                            </svg></a></li>
                                    <li>
                                        <a href="#" onclick="deleteData({{ $b->id }})" class="bs-tooltip"
                                            data-toggle="tooltip" data-placement="top" title=""
                                            data-original-title="Delete"><svg xmlns="http://www.w3.org/2000/svg"
                                                width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" class="feather feather-trash p-1 br-6 mb-1">
                                                <polyline points="3 6 5 6 21 6"></polyline>
                                                <path
                                                    d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                                </path>
                                            </svg>
                                        </a>
                                        <form action="{{ route('user.destroy', ['user' => $b->id]) }}"
                                            method="POST" id="form-delete{{ $b->id }}">
                                            <input type="hidden" name="_method" value="DELETE">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </td>
                        </tr>
                    @empty
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
@endsection
