@extends('layouts.user.teacher.main')

@section('title')
    <h3>Detail Study Groups</h3>
@endsection

@section('content')
    <div class="row study-groups-title mb-4">
        <div class="col-2">
            <h6><strong>Title</strong></h6>
        </div>
        <div class="col-10">
            <p style="margin: 0">{{ $detail_group->title }}</p>
        </div>
    </div>
    <div class="row study-groups-description mb-4">
        <div class="col-2">
            <h6><strong>Description</strong></h6>
        </div>
        <div class="col-10">
            <p style="margin: 0">{{ $detail_group->description }}</p>
        </div>
    </div>
    <form action="{{ url('/teacher/study_groups/'.$detail_group->uid.'/invite') }}" method="POST">
        @csrf
        <div class="d-flex study-groups-invite"  style="align-items: center">
            <div class="tag-title">
                <h6><strong>TAG</strong></h6>
            </div>
            <div class="tag-input mx-3">
                <input type="text" id="invite_student_tags" name="invite_student_tags" required>
            </div>
            <div class="tag-button">
                <button class="btn btn-success" type="submit">ADD</button>
            </div>
        </div>
    </form>
    <div class="table-detail-study-groups" style="overflow-y: auto; max-height: 400px">
        <table class="table">
            <thead>
            <tr>
                <th scope="col"></th>
                <th scope="col">Student</th>
                <th scope="col">Tag</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
                {{-- Foreach Here --}}
                @forelse ($list_participant as $participant)
                    <tr>
                        <th scope="row"></th>
                        <td>{{ $participant->participant->username }}</td>
                        <td><strong>{{ $participant->participant->tag }}</strong></td>
                        <td>
                            <form action="{{ url('/teacher/kick/'.$participant->participant_id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="group_id" value="{{ $participant->group_id }}">
                                <div class="kick-button">
                                    <button class="btn btn-danger" type="submit">KICK</button>
                                </div>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <div class="alert alert-danger">
                            Data participant belum ditemukan.
                        </div>
                    </tr>
                @endforelse
            </tbody>
        </table>
        @if (session()->has('success'))
            <div class="alert alert-success  fade show" role="alert" style="display: flex; justify-content: space-between">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if (session()->has('error'))
            <div class="alert alert-danger fade show" role="alert" style="display: flex; justify-content: space-between">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    </div>
@endsection