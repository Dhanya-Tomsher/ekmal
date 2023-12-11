@extends('layouts.admin.app', ['body_class' => '', 'title' => 'Faq'])
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1>FAQ</h1>
                <div class="text-zero top-right-button-container">
                    <a href="{{ route('admin.faq.create') }}"
                        class="btn btn-primary btn-lg top-right-button mr-1 text-uppercase">ADD NEW
                        FAQ</a>
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
            @if ($faq)
                <div class="col-lg-12 col-md-12 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col" class="text-center">Sl No.</th>
                                        <th scope="col">Title</th>
                                        <th scope="col" class="text-center">Sort Order</th>
                                        <th scope="col" class="text-center">Status</th>
                                        <th scope="col" class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(isset($faq[0]))
                                        @foreach ($faq as $key=>$faqs)
                                            <tr>
                                                <td class="text-center">{{ $key + 1 + ($faq->currentPage() - 1) * $faq->perPage() }}</td>
                                                <td>{{ $faqs->title }}</td>
                                                <td class="text-center">{{ $faqs->sort_order }}</td>
                                                <td class="text-center">
                                                    <b>{!! $faqs->status == 1 ? '<span class="text-success">Enabled</span>' : '<span class="text-danger">Disabled</span>' !!}</b>
                                                </td>
                                                <td class="text-center">
                                                    <a href="{{ route('admin.faq.edit', $faqs) }}"
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
                                {{ $faq->appends(request()->input())->links('pagination::bootstrap-5') }}
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
