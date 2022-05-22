<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="{{ asset('assist/assists/bootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assist/assists/css/courses.css') }}">
    <link rel="stylesheet" href="{{ asset('assist/fontawesome-free-6.0.0-web/css/all.min.css') }}">

</head>
<body>
    <!-- Header -->
    <header>
        <div class="overlay"></div>
        @include('Front.header')
    </header>
    <main>
        @isset($_COOKIE['editLecture'])
            <div class="alert alert-success" role="alert"> Quiz Updated Successfully </div>
        @endisset
        @foreach ($courses as $c)
        <div class="container">
            <div class="row">
                <div class="col">
                <div class="row mt-5"></div>
                    <figure class="text-center my-4 ">
                        <blockquote class="blockquote">
                            <p> {{ $c->courseName }} </p>
                        </blockquote>
                        @foreach ($instructors as $i)
                                @if ($i->id == $c->instructor_id)
                                <figcaption class="blockquote-footer ">
                                    Instructor : <cite title="Source Title"> {{ $i->instructorName }} </cite>
                                </figcaption>
                            @endif
                        @endforeach
                    </figure>
                    <figure class="figure d-flex justify-content-center my-4">
                        <img src="{{ asset('uploads/courses/'. $c->img )}}" class="figure-img img-fluid rounded" alt="...">
                        <figcaption class="figure-caption"> </figcaption>
                    </figure>
                    <div class="d-flex align-items-center justify-content-center my-5 p-5">
                        <?php $ii = [] ; ?>
                        @if (!auth()->user())
                        <div class="regsteration">
                            <a href="{{ route('admin.login') }}" class="nav-item"><button class="btn btn-light m-2 btn-outline-primary">Login</button></a>
                            <a href="{{ route('front.signUp') }}" class="nav-item"><button class="btn btn-primary">Sign Up</button></a>
                        </div>
                        @elseif (auth()->user())
                            @foreach ($enrolleds as $e)
                                @if ($e->user_id == auth()->user()->id)
                                    <?php array_push($ii,1) ?>
                                @else
                                    <?php array_push($ii,0) ?>
                                @endif
                            @endforeach
                            @if (in_array(1,$ii))
                                <?php $lec = [] ?>
                                @foreach ($lectures as $l)
                                    <?php array_push($lec,$l->id) ?>
                                @endforeach
                                @if (isset($l))
                                    <a href="{{ url('Courses/'. $c->id .'/'. $lec[0]) }}">
                                        <input type="submit" value="Go to the course" class="btn btn-primary">
                                    </a>
                                @endif
                            @else
                            <a href="{{ url('enroll/'. $c->id) }}">
                                <input type="submit" value="Enroll Now" class="btn btn-primary">
                            </a>
                            @endif
                        @endif
                    </div>
                    <div class="main-c d-flex my-5">
                        <div class="row flex-3 align-items-center">
                            <div class="row">
                                    <p class="desc-course">
                                        <?php echo $c->courseDesc; ?>
                                    </p>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card main-cour-space">
                                    <div class="card-header">Course Lectures</div>
                                    <ul class="list-group list-group-flush">
                                        @foreach ($lectures as $l)
                                        <li class="list-group-item">{{ $l->lecName }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @foreach ($instructors as $i)
                                @if ($i->id == $c->instructor_id)
                                <div class="d-flex flex-column text-center">
                                    <div class="d-flex flex-column">
                                        <div class="cool">
                                            <img src="{{ asset('uploads/instructors/'. $i->instructorImg ) }}" width="300" height="300" class="rounded border-primary shadow-sm p-3 mb-5" alt="...">
                                        </div>
                                        <div class="col">
                                            <div class="card">
                                                <div class="card-title fs-4 text-center p-2 mt-2"> {{ $i->instructorName }} </div>
                                                <div class="card-body text-center p-2"> {{ $i->instructorDesc }} </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="fa-solid fa-arrow-up"></i></a>
    </main>
    <div id="preloader"></div>
    <!-- Footer -->
    @include('Front.footer')
    <script src="{{ asset('assist/assists/js/pre.js') }}"></script>
    <script src="{{ asset('assist/assists/bootstrap/bootstrap.bundle.min.js') }}"></script>
</body>
</html>