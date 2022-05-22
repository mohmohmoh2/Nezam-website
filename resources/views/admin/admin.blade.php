
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
        @isset($_COOKIE['editsett'])
            <div class="alert alert-success" role="alert"> Settings Updated Successfully </div>
        @endisset
        <aside>
            <div class="d-flex align-items-start">
                <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <button class="nav-link " id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="false">Account Information</button>
                    <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">Show All Users</button>
                    <button class="nav-link" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false">Add Course</button>
                    <button class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">Add Lecture</button>
                    <button class="nav-link" id="v-pills-instructors-tab" data-bs-toggle="pill" data-bs-target="#v-pills-instructors" type="button" role="tab" aria-controls="v-pills-instructors" aria-selected="false">Add Instructors</button>
                    <button class="nav-link" id="v-pills-seettings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-seettings" type="button" role="tab" aria-controls="v-pills-seettings" aria-selected="false">Settings</button>
                    <button class="nav-link" id="v-pills-courses-tab" data-bs-toggle="pill" data-bs-target="#v-pills-courses" type="button" role="tab" aria-controls="v-pills-courses" aria-selected="false">All Courses</button>
                    <button class="nav-link" id="v-pills-inst-tab" data-bs-toggle="pill" data-bs-target="#v-pills-inst" type="button" role="tab" aria-controls="v-pills-inst" aria-selected="false">All Instructors</button>
                    <button class="nav-link" id="v-pills-quiz-tab" data-bs-toggle="pill" data-bs-target="#v-pills-quiz" type="button" role="tab" aria-controls="v-pills-quiz" aria-selected="false">Add Quizs</button>
                    <button class="nav-link" id="v-pills-squiz-tab" data-bs-toggle="pill" data-bs-target="#v-pills-squiz" type="button" role="tab" aria-controls="v-pills-squiz" aria-selected="false">Show & Edit Quizs</button>
                    <button class="nav-link active" id="v-pills-cat-tab" data-bs-toggle="pill" data-bs-target="#v-pills-cat" type="button" role="tab" aria-controls="v-pills-cat" aria-selected="true">Add Category</button>
                </div>
            </div>
        </aside>
        <main>
            <div class="tab-content" id="v-pills-tabContent">
                <!--   Account Information   -->
                <div class="tab-pane fade " id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                    <div class="general">
                        <h2>Account Information</h2>
                        <div class="container flex">
                            <img src="../instructorImgs/profiles/" alt="" height="90" width="90">
                            <div class="info">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">First Name</th>
                                            <th scope="col">Last Name</th>
                                            <th scope="col">Email</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td> </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!--   Users Informations   -->
                <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                    <div class="cont">
                        <h2>All Users</h2>
                        <div class="user-info">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">First Name</th>
                                    <th scope="col">Last Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Edit</th>
                                    <th scope="col">Delete</th>
                                </tr>
                                </thead>
                                <tbody>
                                <div class="accordion accordion-flush" id="accordionFlushExample">
                                    <div class="accordion-item">
                                        <tr>
                                            <th scope="row"> </th>
                                            <td> </td>
                                            <td> </td>
                                            <td> </td>
                                            <td class="accordion-header btn-primary" id="flush-heading ">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse " aria-expanded="false" aria-controls="flush-collapse ">Edit
                                                </button>
                                            </td>
                                            <td><a href="deleteu.php?id= " class="btn btn-danger dele">Delete</a></td>
                                        </tr>
                                        <!-- href="deleteu.php?id=<hp echo $row['id']?>"  -->
                                            <div id="flush-collapse " class="accordion-collapse collapse" aria-labelledby="flush-heading " data-bs-parent="#accordionFlushExample">
                                            <div class="accordion-body">
                                                <form action="editu.php?id= " method="post">
                                                    <label for="firstName">First Name</label>
                                                    <input type="text" name="firstName" id="firstName" value=" ">
                                                    <label for="lastName">Last Name</label>
                                                    <input type="text" name="lastName" id="lastName" value=" ">
                                                    <label for="email">Email</label>
                                                    <input type="email" name="email" id="email" value=" ">
                                                    <input type="submit" value="Update" class="btn btn-primary">
                                                </form>
                                            </div>
                                            </div>
                                        
                                    </div>
                                </div>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                    <div class="cont">
                        <h2>Add Course</h2>
                        <div class="add-course">
                            <form action="{{ route('admin.course') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="inst-name">
                                    <label for="course-name">course name</label>
                                    <input type="text" name="courseName" class="form-control" id="courseName" placeholder="Course Name" required>
                                </div>
                                <div class="input-img">
                                    <input class="form-control" type="file" name="img" id="img" accept="image/*" required>
                                    <label for="img">Upload Course Picture</label>
                                </div>
                                <div class="inst-name">
                                    <label for="course-desc">Course Description</label>
                                    <textarea name="courseDesc" id="courseDesc" cols="40" rows="50"></textarea>
                                </div>
                                <div class="inst-name">
                                    <label for="shortDesc" class=" fa-10x">Short Description</label>(Less Than 200 character)
                                    <textarea name="shortDesc" id="shortDesc" cols="40" rows="50"></textarea>
                                </div>
                                <div class="radio-levels">
                                    <div class="level-radio">
                                        <label class="form-label" for="beginer">Beginer</label>
                                        <input class="form-check-input" value="Beginer" type="radio" name="courseLevel" id="beginer" required>
                                    </div>
                                    <div class="level-radio">
                                        <label class="form-label" for="intermediate">Intermediate</label>
                                        <input class="form-check-input" value="Intermediate" type="radio" name="courseLevel" id="intermediate" required>
                                    </div>
                                    <div class="level-radio">
                                        <label class="form-label" for="advanced">Advanced</label>
                                        <input class="form-check-input" value="Advanced" type="radio" name="courseLevel" id="advanced" required>
                                    </div>
                                </div>
                                <div class="inst-name">
                                    <label class="form-label" for="instructors">Choose instructor Name</label>
                                    <select class="form-select" id="instructors" name="instructor_id" required>
                                    <option selected disabled>No Instructor</option>
                                    @foreach ($instructors as $i)
                                    <option value="{{ $i->id }}">{{ $i->instructorName }}</option>
                                    @endforeach
                                    </select>
                                </div>
                                <div class="inst-name">
                                    <label class="form-label" for="Catname">Choose Category Name</label>
                                    <select class="form-select" id="Catname" name="cat_id" required>
                                        <option selected disabled>No Category</option>
                                        @foreach ($cat as $i)
                                        <option value="{{ $i->id }}">{{ $i->Catname }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <input type="submit" value="Add The Course" class="btn btn-primary">
                            </form>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                    <div class="cont">
                        <h2>Add Lecture</h2>
                        <div class="add-lec">
                            <form action="{{ url('instructors') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="lec-name">
                                    <input type="text" name="lecName" id="lecName" class="form-control" placeholder="Lecture Name" required>
                                    <label for="lecName">Lecture Name</label>
                                </div>
                                <div class="lec-url">
                                    <input type="text" name="lecUrl" id="lecUrl" class="form-control" placeholder="Lecture Url" required>
                                    <label for="lecUrl">Lecture Url</label>
                                </div>
                                <div class="lec-name">
                                    <select name="course_id" id="course-radio" class="form-select" aria-label="Default select example" required>
                                        <option selected disabled>Select The Course</option>
                                    <label for="course-radio"></label>
                                    @foreach ($courses as $c)
                                    <option value="{{ $c->id }}" name="course_id" id="course-{{ $c->id }}" required>{{ $c->courseName }}</option>
                                    @endforeach
                                    </select>
                                </div>
                                <input type="submit" name="submit" class="btn btn-primary" value="Upload This Lecture">
                            </form>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="v-pills-instructors" role="tabpanel" aria-labelledby="v-pills-instructors-tab">
                    <div class="cont">
                        <h2>Add Instructor</h2>
                        <div class="add-inct">
                            <form action="{{ url('instructor') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="inct-name">
                                    <input type="text" name="instructorName" id="inct-name" class="form-control" required>
                                    <label for="inct-name">Instructor Name</label>
                                </div>
                                <div class="inct-name">
                                    <input type="text" name="instructorDesc" id="inct-desc" class="form-control" required>
                                    <label for="inct-desc">Instructor Description</label>
                                </div>
                                <div class="inst-img " >
                                    <input class="form-control" type="file" name="instructorImg" id="avatar" accept="image/*" required>
                                </div>
                                <input type="submit" value="Add New Instructor" name="submit" class="btn btn-primary">
                            </form>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="v-pills-seettings" role="tabpanel" aria-labelledby="v-pills-seettings-tab">
                    <div class="cont">
                        <h2>Settings</h2>
                        <div class="add-inct">
                            @foreach ($sett as $s)
                            <form action="{{ url('editsett') }}" method="post"ٍ>
                                @csrf
                                <div class="row">
                                    <div class="col">
                                        <div class="inct-name">
                                            <input type="text" value="{{ $s->mainName }}" name="mainName" id="main-name" class="form-control" required>
                                            <label for="main-name">Main Site Name</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="inct-name">
                                    <input type="text" name="aboutUs" id="about-us" class="form-control" value="{{ $s->aboutUs }}">
                                    <label for="about-us">About US </label>
                                </div>
                                <h3>Counters</h3>
                                <div class="row m-3">
                                    <div class="col">
                                        <label for="students">Students</label>
                                    <input type="text" class="form-control" value="{{ $s->students }}" name="students" id="students" placeholder="students" aria-label="First name">
                                    </div>
                                    <div class="col">
                                        <label for="courses">courses</label>
                                    <input type="text" class="form-control"  value="{{ $s->courses }}" name="courses" id="students" placeholder="courses" aria-label="Last name">
                                    </div>
                                    <div class="col">
                                        <label for="certificates">certificates</label>
                                        <input type="text" class="form-control" value="{{ $s->certificates }}" name="certificates" id="students" placeholder="certificates" aria-label="Last name">
                                    </div>
                                    <div class="col">
                                        <label for="years">years</label>
                                        <input type="text" class="form-control" value="{{ $s->years }}" name="years" id="students" placeholder="years" aria-label="Last name">
                                    </div>
                                </div>
                                <input type="submit" value="Save " name="submit" class="btn btn-primary">
                            </form>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="v-pills-courses" role="tabpanel" aria-labelledby="v-pills-courses-tab">
                    <div class="cont">
                        <h2>Courses</h2>
                            <div class="add-inct">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Course Name</th>
                                        <th scope="col">Instructor</th>
                                        <th scope="col">Level</th>
                                        <th scope="col">short description</th>
                                        <th scope="col">Edit</th>
                                        <th scope="col">Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($courses as $c)
                                    <tr>
                                        <th scope="row">{{ $c->id }}</th>
                                        <td>{{ $c->courseName }}</td>
                                        <?php 
                                            $connection = mysqli_connect("localhost", "root", "", "nezam1");
                                            if(! $connection){echo "problem";}
                                            $query = "SELECT * FROM `instructors` WHERE `id` = '".$c->instructor_id."' ";
                                            $courseResult = mysqli_query($connection, $query);
                                            while ($row = mysqli_fetch_assoc($courseResult)) {
                                        ?>
                                        <td>{{ $row['instructorName'] }}</td>
                                        <?php } ?>
                                        <td>{{ $c->courseLevel }}</td>
                                        <td>{{ $c->shortDesc }}</td>
                                        <td><a href="{{ url('editCourse/'.$c->id) }}" class="btn btn-primary">Edit</a></td>
                                        <td><a href="{{ url('delCourse/'.$c->id) }}" class="btn btn-danger cdele">Delete</a></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                </table>
                            </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="v-pills-inst" role="tabpanel" aria-labelledby="v-pills-inst-tab">
                    <div class="cont">
                        <h2>All Instructors</h2>
                        <div class="add-inct">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Instructor Name</th>
                                        <th scope="col">Instructor Description</th>
                                        <th scope="col">Instructor Image</th>
                                        <th scope="col">Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($instructors as $i)
                                    <tr>
                                        <th scope="row">{{ $i->id }}</th>
                                        <td>{{ $i->instructorName }}</td>
                                        <td>{{ $i->instructorDesc }}</td>
                                        <td><img src="{{ asset('uploads/instructors/'. $i->instructorImg)  }}" width="100" alt=""></td>
                                        <td><a href="{{ url('delInstructor/'.$i->id ) }}" class="btn btn-danger adele">Delete</a></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                </table>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="v-pills-quiz" role="tabpanel" aria-labelledby="v-pills-quiz-tab">
                    <div class="cont">
                        <script type="text/javascript">
                            var subjectObject = {
                                <?php 
                                $connection = mysqli_connect("localhost", "root", "", "nezam1");
                                if(! $connection){echo "problem";}
                                $query = "SELECT * FROM `courses`";
                                $result = mysqli_query($connection, $query);
                                while ($row = mysqli_fetch_assoc($result)) {
                                $queryy = "SELECT * FROM `lectures` WHERE `course_id`='".$row['id']."'";
                                $results = mysqli_query($connection, $queryy);
                                ?>
                            "<?php echo $row['courseName']?>": {<?php while ($roow = mysqli_fetch_assoc($results)) {echo '"'; echo $roow['lecName'];echo '": [],';} ?>}<?php echo ','?>
                            <?php }?>
                                }
                                window.onload = function() {
                                    var subjectSel = document.getElementById("subject");
                                    var topicSel = document.getElementById("topic");
                                    var chapterSel = document.getElementById("chapter");
                                    for (var x in subjectObject) {
                                        subjectSel.options[subjectSel.options.length] = new Option(x, x);
                                    }
                                    subjectSel.onchange = function() {
                                        //empty Topics- dropdowns
                                        topicSel.length = 1;
                                        //display correct values
                                        for (var y in subjectObject[this.value]) {
                                        topicSel.options[topicSel.options.length] = new Option(y, y);
                                        }
                                    }
                                }
                        </script>
                        <h2>Add quiz</h2>
                        <div class="add-inct">
                            <form action="{{ route('admin.quiz') }}" method="post">
                                @csrf
                                <div class="mb-3">
                                    <label for="formGroupExampleInput" class="form-label">The Question</label>
                                    <input type="text" class="form-control" name="question" id="question" placeholder="Question" required>
                                </div>
                                <div class="mb-3">
                                    <label for="formGroupExampleInput2" class="form-label">First Answer</label>
                                    <input type="text" class="form-control is-valid" name="ans1" id="ans1" placeholder="First Answer" required>
                                </div>
                                <div class="mb-3">
                                    <label for="formGroupExampleInput2" class="form-label">Second Answer</label>
                                    <input type="text" class="form-control is-invalid" name="ans2" id="ans2" placeholder="Second Answer" required>
                                </div>
                                <div class="mb-3">
                                    <label for="formGroupExampleInput2" class="form-label">Third Answer</label>
                                    <input type="text" class="form-control is-invalid" name="ans3" id="ans3" placeholder="Third Answer" required>
                                </div>
                                <div class="mb-3">
                                    <label for="formGroupExampleInput2" class="form-label">Last Answer</label>
                                    <input type="text" class="form-control is-invalid" name="ans4" id="ans4" placeholder="Last Answer" required>
                                </div>
                                <div class="lec-name">
                                    <select name="subject" id="subject" class="form-select" required>
                                        <option value="" selected="selected">Select The Course</option>
                                    </select>
                                </div>
                                <div class="lec-name">
                                <select name="lec_id" id="topic" class="form-select" required>
                                        <option value="" selected="selected">Select The Lecture</option>
                                    </select>
                                </div>
                                <input type="submit" class="btn btn-primary" value="Save The Quiz">
                            </form>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="v-pills-squiz" role="tabpanel" aria-labelledby="v-pills-squiz-tab">
                    <div class="cont">
                        <h2>Quizs</h2>
                            <div class="add-inct">
                                @isset($_COOKIE['editQuiz'])
                                    <div class="alert alert-success" role="alert"> Quiz Updated Successfully </div>
                                @endisset
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">question</th>
                                        <th scope="col">Answer true</th>
                                        <th scope="col">Answer 2</th>
                                        <th scope="col">Answer 3</th>
                                        <th scope="col">Answer 4</th>
                                        <th scope="col">Lecture Name</th>
                                        <th scope="col">Edit</th>
                                        <th scope="col">Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($quizs as $c)
                                    <tr>
                                        <th scope="row">{{ $c->id }}</th>
                                        <td>{{ $c->question }}</td>
                                        <td>{{ $c->ans1 }}</td>
                                        <td>{{ $c->ans2 }}</td>
                                        <td>{{ $c->ans3 }}</td>
                                        <td>{{ $c->ans4 }}</td>
                                        <td>{{ $c->lectures->lecName }}</td>
                                        <td><a href="" class="btn btn-primary collapsed" data-bs-toggle="modal" data-bs-target="#flush-collapse{{ $c->id }}" >EDIT</a></td>
                                        <td><a href="{{ url('delQuiz/'.$c->id) }}" class="btn btn-danger cdele">Delete</a></td>
                                    </tr>
                                    <div class="modal fade" id="flush-collapse{{ $c->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Edit Quiz</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ url('editQuiz/'.$c->id) }}" method="post">
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{ $c->id }}">
                                                        <div class="form-floating mb-3">
                                                            <input type="text" class="form-control" name="question" id="idd" placeholder="name@example.com" value="{{ $c->question }}">
                                                            <label for="floatingInput">Question</label>
                                                        </div>
                                                        <div class="form-floating mb-3">
                                                            <input type="text" class="form-control" name="ans1" id="lecName" placeholder="name@example.com" value="{{ $c->ans1 }}">
                                                            <label for="floatingInput">True Answer</label>
                                                        </div>
                                                        <div class="form-floating mb-3 row">
                                                            <div class="col">
                                                                <label for="floatingInput">Answer Two</label>
                                                                <input type="text" class="form-control" name="ans2" id="lecId" placeholder="name@example.com" value="{{ $c->ans2 }}">
                                                            </div>
                                                            <div class="col">
                                                                <label for="floatingInput">Answer Three</label>
                                                                <input type="text" class="form-control" name="ans3" id="lecId" placeholder="name@example.com" value="{{ $c->ans3 }}">
                                                            </div>
                                                        </div>
                                                        <div class="form-floating mb-3">
                                                            <input type="text" class="form-control" name="ans4" id="lecName" placeholder="name@example.com" value="{{ $c->ans4 }}">
                                                            <label for="floatingInput">Answer Four</label>
                                                        </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </tbody>
                                </table>
                            </div>
                    </div>
                </div>
                <div class="tab-pane fade show active" id="v-pills-cat" role="tabpanel" aria-labelledby="v-pills-cat-tab">
                    <div class="cont">
                        <h2>Add Category</h2>
                        <div class="add-inct">
                            <form action="{{ url('addcat') }}" method="post"ٍ>
                                @csrf
                                <div class="inct-name">
                                    <input type="text" name="Catname" id="Catname" class="form-control">
                                    <label for="Catname">Category Name</label>
                                </div>
                                <input type="submit" value="Save " name="submit" class="btn btn-primary">
                            </form>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Category Name</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cat as $c)
                                    <tr>
                                        <th scope="row">{{ $c->id }}</th>
                                        <td>{{ $c->Catname }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    @include('Front.footer')
    <script>
        tinymce.init({
            selector: 'textarea',
            plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
            toolbar_mode: 'floating',
            mode : "specific_textareas",
            editor_selector : "mceEditor",
        });
    </script>
    <script src="../assists/js/admin.js"></script>
<script src="{{ asset('assist/assists/bootstrap/bootstrap.bundle.min.js') }}"></script>
</body>
</html>