<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel | Nezam Academy</title>
    <link rel="stylesheet" href="{{ asset('assist/assists/bootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assist/assists/css/admin.css') }}">

    <script src="https://cdn.tiny.cloud/1/he37w4t0m4nmikk44tegd7yclh6sfn331i6nv4p1h40rn2iu/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
</head>
<body>
    <header>
        @include('Front.header')
    </header>
    <div class="main-content">
        
        <aside>
            <div class="d-flex align-items-start">
                <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <button class="nav-link active" id="v-pills-courses-tab" data-bs-toggle="pill" data-bs-target="#v-pills-courses" type="button" role="tab" aria-controls="v-pills-courses" aria-selected="false">All Courses</button>
                </div>
            </div>
        </aside>
        <main>
            <div class="tab-content" id="v-pills-tabContent">
                <div class="tab-pane fade show active" id="v-pills-courses" role="tabpanel" aria-labelledby="v-pills-courses-tab">
                    <div class="cont">
                        <h2>Course Details</h2>
                            <div class="add-inct">
                            <div>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Lecture Name</th>
                                            <th scope="col">Lecture Url</th>
                                            <th scope="col">Edit</th>
                                            <th scope="col">Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <div class="accordion-item">
                                            @foreach ($lectures as $l)
                                            <tr>
                                                <th scope="row">{{ $l->id }}</th>
                                                <td>{{ $l->lecName }}</td>
                                                <td>{{ $l->lecUrl }}</td>
                                                <td><a href="" class="btn btn-primary collapsed" data-bs-toggle="collapse" data-bs-target="#flush-collapse{{ $l->id }}" aria-expanded="false" aria-controls="flush-collapse{{ $l->id }}">EDIT</a></td>
                                                <td><a href="{{ url('delLec/'.$l->id) }}" class="btn btn-danger">DELETE</a></td>
                                            </tr>
                                            <tr>
                                                <div id="flush-collapse{{ $l->id }}" class="accordion-collapse collapse" aria-labelledby="flush-heading" data-bs-parent="#accordionFlushExample">
                                                    <div class="accordion-body">
                                                        <div class="cont">
                                                            <form action="{{ url('editLecture/'.$l->id) }}" method="post">
                                                                @csrf
                                                                <div class="form-floating mb-3">
                                                                    <input type="text" class="form-control" name="id" id="idd" placeholder="name@example.com" value="{{ $l->id }}" disabled>
                                                                    <label for="floatingInput">Id</label>
                                                                </div>
                                                                <div class="form-floating mb-3">
                                                                    <input type="text" class="form-control" name="lecName" id="lecName" placeholder="name@example.com" value="{{ $l->lecName }}">
                                                                    <label for="floatingInput">Lecture Name</label>
                                                                </div>
                                                                <div class="form-floating mb-3">
                                                                    <input type="text" class="form-control" name="lecUrl" id="lecId" placeholder="name@example.com" value="{{ $l->lecUrl }}">
                                                                    <label for="floatingInput">Lecture Id</label>
                                                                </div>
                                                                <div class="form-floating mb-3">
                                                                    <input type="submit" id="floatingInput" class="btn btn-primary">
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </tr>
                                            @endforeach
                                        </div>
                                    </tbody>
                                </table>
                            </div>

                    </div>
                </div>
            </div>
        </main>
    </div>
    <script>
        tinymce.init({
            selector: 'textarea',
            plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
            toolbar_mode: 'floating',
        });
    </script>
<script src="{{ asset('assist/assists/bootstrap/bootstrap.bundle.min.js') }}"></script>
</body>
</html>