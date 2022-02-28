@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">{{ __('Donors') }}</div>

        <div class="card-body">
            @if (session('status'))
                @if(session('type'))
                    @if(session('type') == 'success')
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @else
                        <div class="alert alert-danger" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                @else
                    <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                    </div>
                @endif
            @endif

            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @php $i=1; @endphp
                    @forelse($users as $key => $item)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ ucwords($item['firstname']) . ' ' . ucwords($item['lastname']) }}</td>
                            <td></td>
                            <td>
                                <a href="{{ url('accept/'.$item['docId']) }}" class="btn btn-sm btn-success">Accept</a>

                                <a href="{{ url('reject/'.$item['docId']) }}" class="btn btn-sm btn-danger">Reject</a>
                            </td>
                        </td>
                    @empty
                        <tr>
                            <td colspan="4">No Record Found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

        </div>
    </div>
</div>
@endsection