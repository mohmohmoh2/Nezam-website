<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lectures | </title>
    <link rel="stylesheet" href="{{ asset('assist/assists/bootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assist/assists/css/lecture.css') }}">
</head>
<body>
    <!-- Header -->
    <header>
        <div class="overlay"></div>
        @include("Front.header")
    </header> 
    <main>
        <div class="d-flex hhhh justify-content-center align-content-center">
            <figure class="text-center headd d-flex flex-column justify-content-center m-0">
                <blockquote class="blockquote fa-2x">
                    @foreach ($slecture as $sl)
                    <p>{{ $sl->lecName }}</p>
                </blockquote>
                @foreach ($courses as $c)
                    @foreach ($instructors as $i)
                        @if ($c->instructor_id == $i->id)
                        <figcaption class="blockquote-footer">
                            Instructor <cite title="Source Title">{{ $i->instructorName	 }}</cite>
                        </figcaption>
                        @endif
                    @endforeach
                @endforeach
            </figure>
        </div>
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="row mt-3 pt-3">
                            <div class="col flex-3">
                                <?php 
                                $questions = [];                                    
                                ?>
                                    <iframe class="mb-5" id="video " src="https://www.youtube.com/embed/{{ $sl->lecUrl }}?origin=https://plyr.io&amp;iv_load_policy=3&amp;modestbranding=1&amp;playsinline=1&amp;showinfo=0&amp;rel=0&amp;enablejsapi=1" allowfullscreen allowtransparency allow="autoplay"></iframe>
                                
                                <h2 class="title-q p-4 text-center bg-primary text-white box" id="quiz">Quiz</h2>
                                <?php $cont = 1 ?>
                                @isset($_COOKIE['succ'])
                                    <div class="alert alert-success" role="alert">
                                        success to answer the quiz great work
                                    </div>
                                @endisset
                                @isset($_COOKIE['error'])
                                    <div class="alert alert-danger" role="alert">
                                        Fail to answer the quiz See The Lecture Again 
                                    </div>
                                @endisset
                                <form action="{{ url('squiz') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $sl->id }}">
                                    @endforeach
                                    @foreach ($quizs as $q)
                                    <?php
                                    array_push($questions,$q->ans1);
                                    array_push($questions, $q->ans2);
                                    array_push($questions, $q->ans3);
                                    array_push($questions, $q->ans4);
                                    shuffle($questions);?>
                                    <div class="quiz m-3">
                                        <h3 class="question"> {{ $q->question }} </h3>
                                        <div class="input-group wrap-n">
                                            <div class="input-group-text">
                                                <input class="form-check-input mt-0" id="{{ $q->id }}" name="ans{{ $cont }}" type="radio" value="{{ $questions[0] }}" aria-label="Radio button for following text input" required>
                                            </div>
                                            <h3 type="text" class="form-control" aria-label="Text input with radio button" style="margin: 0;"> {{ $questions[0] }} </h3>
                                        </div>
                                        <div class="input-group wrap-n">
                                            <div class="input-group-text">
                                                <input class="form-check-input mt-0" name="ans{{ $cont }}" type="radio" value="{{ $questions[1] }}" aria-label="Radio button for following text input" required>
                                            </div>
                                            <h3 type="text" class="form-control" aria-label="Text input with radio button" style="margin: 0;">{{ $questions[1] }}</h3>
                                        </div>
                                        <div class="input-group wrap-n">
                                            <div class="input-group-text">
                                                <input class="form-check-input mt-0" name="ans{{ $cont }}" type="radio" value="{{ $questions[2] }}" aria-label="Radio button for following text input" required>
                                            </div>
                                            <h3 type="text" class="form-control" aria-label="Text input with radio button" style="margin: 0;">{{ $questions[2] }}</h3>
                                        </div>
                                        <div class="input-group wrap-n">
                                            <div class="input-group-text">
                                                <input class="form-check-input mt-0" name="ans{{ $cont }}" type="radio" value="{{ $questions[3] }}" aria-label="Radio button for following text input" required>
                                            </div>
                                            <h3 type="text" class="form-control" aria-label="Text input with radio button" style="margin: 0;">{{ $questions[3] }}</h3>
                                        </div>
                                        <?php $questions = [];  $cont++ ?>
                                </div>
                                    @endforeach
                                    @foreach ($slecture as $sl)
                                    <input type="hidden" name="coid" value="{{ $sl->course_id }}">
                                    <input type="hidden" name="lid" value="{{ $sl->id }}">
                                    @endforeach
                                    <input type="hidden" name="cid" value="{{ $cont }}">
                                    <input type="submit" class="btn btn-primary" value="Submit Answers">
                                </form>
                                
                            </div>
                        <div class="col" id="maa">
                            <h2 class="text-center">Lectures</h2>
                            <table class="table">
                                <tbody>
                                    @foreach ($lectures as $l)
                                    <tr>
                                        <?php $id = $l->course_id ?>
                                        <td class="d-flex align-items-center">
                                            <input type="checkbox" name=" " id="a{{ $l->id }}" class="me-3 form-check-nput">
                                            <a href="{{ url('Courses/'. $id .'/'. $l->id ) }}" id="a{{ $l->id }} " class="text-decoration-none fs-5"> {{ $l->lecName }} </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="row">
                                <a href="{{ url('gen/'.$id) }}" class="btn btn-primary">Get Your Certificate</a>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </main>
    <!-- Footer -->
    @foreach ($cquizs as $cq)
        <script>var checke = document.getElementById('a{{ $cq->lec_id }}').checked = true;</script>
    @endforeach
    @include('Front.footer')
    <script src="{{ asset('assist/assists/bootstrap/bootstrap.bundle.min.js') }}"></script>
</body>
</html>