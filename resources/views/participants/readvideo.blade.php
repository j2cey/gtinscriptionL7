@extends('app')

@section('app_content')

    <section class="section">

        <div class="container">

            <video width="320" height="240" controls>
                <source src="{{url($path)}}" type="video/mp4">
                Your browser does not support the video tag.
            </video>

        </div>

    </section>

@endsection
