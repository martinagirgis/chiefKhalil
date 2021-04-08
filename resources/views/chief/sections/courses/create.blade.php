@extends('admin.dashboard')
@section('main-container')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <style>
        .wizard-content .wizard>.actions>ul>li>a{
            display:none;
        }
    </style>

    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4>Add New Course</h4>
                        </div>

                    </div>
                </div>
            </div>


            <div class="pd-20 card-box mb-30">

                <div class="wizard-content">
                    <form class="tab-wizard wizard-circle wizard vertical" id="tab-wizard" method="post" action="{{route('courses.store')}}" enctype="multipart/form-data">
                        @csrf
                        <h5>Course Details</h5>
                        <section>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label >Name Arabic :</label>
                                        <input type="text" class="form-control" name="name_ar" style="text-align: right;direction: rtl">

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label >Name English :</label>
                                        <input type="text" class="form-control" name="name_en">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Description Arabic :</label>
                                        <textarea  class="form-control" id="" cols="30" rows="10" name="details_ar" style="text-align: right;direction: rtl"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Description English :</label>
                                        <textarea  class="form-control" id="" cols="30" rows="10" name="details_en"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Select Chief :</label>
                                        <select class="custom-select form-control" name="chief_id">
                                            <option>Select Chief</option>
                                            @foreach($chiefs as $chief)
                                            <option value="{{$chief->id}}">{{$chief->fname}} {{$chief->lname}}</option>
                                            @endforeach
                                        </select>
                                        <center>
                                            <a href="{{route('chiefs.create')}}" target="_blank">Add New Chief</a>
                                        </center>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Select Category :</label>
                                        <select class="custom-select form-control" name="category_id">
                                            <option>Select Category</option>
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}">{{$category->name_en}}</option>
                                            @endforeach
                                        </select>
                                        <center>
                                            <a href="{{route('categories.create')}}" target="_blank">Add New Category</a>
                                        </center>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Type the Number of course lessons:</label>
                                        <input class="form-control" type="number" name="number_of_lessons" onchange="myFunction(this.value)">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Upload an image :</label>
                                        <input class="form-control" type="file" name="image">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <center>
                                            <input class="form-control btn btn-outline-primary"  type="submit" name="save" value="Save">
                                        </center>
                                    </div>
                                </div>
                            </div>
                        </section>

                    </form>
                </div>
            </div>


        </div>

    </div>

@endsection

<script>
    var x=0;
    function myFunction(val) {
        x = val;
        if(IsThereCourses(x)){

        }
    }
    function IsThereCourses(x){
        if(x <= 0){
            return 0;
        }else{
            return 1;
        }
    }






</script>
