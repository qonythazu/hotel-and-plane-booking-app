
@extends('layout.app')
@section("content")
    <div class="container mt-4">
        <div class="card">
            <div class="card-body">
                <livewire:wizard2 :data="$data"/>
            </div>
        </div>
    </div>
@endsection
