@extends('layouts.admin.app', ['body_class' => '', 'title' => 'Dynaic Contents'])
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1>Dynamiccontents</h1>
                <div class="text-zero top-right-button-container">
                    <a href="{{ route('admin.dynamiccontents.create') }}"
                        class="btn btn-primary btn-lg top-right-button mr-1 text-uppercase">ADD NEW
                        Dynamic content</a>
                </div>
                <div class="separator mb-5"></div>
            </div>
        </div>

        <div class="rpw">
            <div class="col-12">
                <x-status />
                <x-errors />
            </div>
        </div>

        <div class="row">
            @if ($dynamiccontents)
                <div class="col-lg-12 col-md-12 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col" class="text-center">Sl No.</th>
                                        <th scope="col">Page</th>
                                        <th scope="col">Name</th>
                                        <th scope="col" class="text-center">Image</th>
                                        <!-- <th scope="col" class="text-center">Sort Order</th> -->
                                        <th scope="col" class="text-center">Status</th>
                                        <th scope="col" class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(isset($dynamiccontents[0]))
                                        @foreach ($dynamiccontents as $key=>$dynamiccontent)
                                            <tr>
                                                <td class="text-center">{{ $key + 1 + ($dynamiccontents->currentPage() - 1) * $dynamiccontents->perPage() }}</td>
                                                <td>{{ $dynamiccontent->page }}</td>
                                                <td>{{ $dynamiccontent->title }}</td>
                                                <td class="text-center">
                                                    <img class="client-image" src="{{ $dynamiccontent->getImage() }}" alt="">
                                                </td>
                                                <td class="text-center">
                                                    <b>{!! $dynamiccontent->status == 1 ? '<span class="text-success">Enabled</span>' : '<span class="text-danger">Disabled</span>' !!}</b>
                                                </td>
                                                <td class="text-center">
                                                    <a href="{{ route('admin.dynamiccontents.edit', $dynamiccontent) }}"
                                                        class="btn btn-secondary mb-1">Edit</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="4" class="text-center">No data found.</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                            <div class="aiz-pagination float-right">
                                {{ $dynamiccontents->appends(request()->input())->links('pagination::bootstrap-5') }}
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection

@push('header')
@endpush
