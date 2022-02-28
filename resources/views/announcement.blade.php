@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card card-default my-3">
    <div class="card-header">{{ __('Create Announcement') }}</div>
        <div class="card-body">
            <form id="addAnnouncement" class="form" method="POST" action="">
                @csrf
                <div class="form-group">
                    <label for="title" class="sr-only">Title</label>
                    <input id="title" type="text" class="form-control" name="title" placeholder="Title"
                           required autofocus>
                </div>
                <div class="form-group">
                    <label for="content" class="sr-only">Content</label>
                    <textarea id="content" class="form-control" name="content" placeholder="Content" required autofocus></textarea>
                </div>
                    <input id="uid" name="uid" type="hidden" value="{{ \Session::get('uid') }}" class="form-control ">
                <button type="submit"  class="btn btn-primary mb-2">Submit</button>
            </form>
        </div>
    </div>
    <div class="card">
        <div class="card-header">{{ __('Announcements') }}</div>

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
                        <th>Title</th>
                        <th>Content</th>
                        <th>Date</th>
                        <th>Posted By</th>
                    </tr>
                </thead>
                <tbody>
                    @php $i=1; @endphp
                    @forelse($feeds as $key => $item)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $item['title'] }}</td>
                            <td>{{ $item['content'] }}</td>
                            <td>{{ $item['createDate'] }}</td>
                            <td>{{ $item['postedBy'] }}</td>
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