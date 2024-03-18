@extends('layouts.app-front')

@section('content')
<style> .single-line-images .col-md-2 {flex:00 auto; max-width: none;}.single-line-images .width-100 { width: 100%;height: auto;}</style>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            @if (session('status'))
                
            <div class="alert alert-success">

                {{ session('status') }}

            </div>
            @endif

            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4>Upload Single Or Multiple Images</h4>

                    <a href="{{ url('gallery/upload') }}" class="btn btn-primary">Upload Images</a>
                </div>
                <div class="card-body single-line-images" >
                    <div class="row">
                        @foreach ($gallery as $galImg)
                            <div class="col-md-2">
                                <div class="card boarder shadow p-2">
                                    <img src="{{ asset($galImg->image) }}"  alt="img">
                                    <br>
                                    <a href="{{ url('gallery/'.$galImg->id.'/delete') }}">Delete</a>

                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div><a href="{{ url('dashboard') }}" class="btn btn-success">back</a>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>


