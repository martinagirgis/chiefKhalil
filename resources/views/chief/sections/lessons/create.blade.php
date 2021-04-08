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
    @if (!empty($success))
        <div class="alert alert-success">
        <h1>{{$success}}</h1>
        </div>
    @endif

    <style>
        .sad{
            color:black;
            background: #fff;
            cursor:pointer;
        }
        .sad:hover{
            font-weight:bolder;
            color:#fff;
            background: #031e23;
            cursor:pointer;
        }
        .happy{
            font-weight:bolder;
            color:#fff;
            background: #031e23;
            cursor:pointer;
        }
         .progress { position:relative; width:100%; border: 1px solid #7F98B2; padding: 1px; border-radius: 3px; }
        .bar { background-color: #B4F5B4; width:0%; height:25px; border-radius: 3px; }


        .percent { position:absolute; display:inline-block; top:3px; left:48%; color: #7F98B2;}
    </style>

    <div class="pd-ltr-20 xs-pd-20-10">
    <div class="container">
        <form action="{{route('lessons.store')}}" method="post" enctype="multipart/form-data" >
            @csrf

            <div class="row">
            <div class="col-sm-8">
                <input type="hidden" name="course_id" value="{{$course->id}}">
                <input type="hidden" name="lessons" value="{{count($lessons)}}">

            @for($i=0;$i<count($lessons);$i++)
                    <input type="hidden" name="{{'lesson_id'.$i}}" value="{{$lessons[$i]->id}}">
                        <div class="card mb-2 p-2" id="content{{$i}}" style="display:none">
                        <div class="card-body text-center"  style="height:auto">
                            <h4 class="card-title">{{$lessons[$i]->name_en}}</h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label  >Name Arabic :</label>
                                        <input type="text" class="form-control" name="name_ar{{$i}}" style="text-align: right;direction: rtl" value="{{$lessons[$i]->name_ar}}">

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label >Name English :</label>
                                        <input type="text" class="form-control" name="name_en{{$i}}"  value="{{$lessons[$i]->name_en}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Description Arabic :</label>
                                        <textarea  class="form-control" id="" cols="30" rows="10" name="details_ar{{$i}}" style="text-align: right;direction: rtl">{{$lessons[$i]->details_ar}}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Description English :</label>
                                        <textarea  class="form-control" id="" cols="30" rows="10" name="details_en{{$i}}">{{$lessons[$i]->details_en}}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Upload an image :</label>
                                        <input class="form-control" type="file" name="{{'image'.$i}}" value="{{$lessons[$i]->image}}">
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Upload an video :</label>
                                        <input class="form-control" type="file" name="{{'video'.$i}}" value="{{$lessons[$i]->video}}">
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    @endfor
            </div>
            <div class="col-sm-4">
                <div class="row">
                    <div class="col-sm-12 ">
                        <center>
                            <input type="submit" class="btn btn-dark col-sm-6" value="Save">
                        </center>
                        <br><br>
                    </div>
                </div>

                @for($i=0;$i<count($lessons);$i++)

                <div class="row ">
                    <div class="col-sm-12 ">
                        <div class="card mb-2 p-2 sad" id="tabs{{$i}}">
                            <div class="card-body text-center" onclick="dosmthing({{$i}},{{count($lessons)}})">
                              {{$lessons[$i]->name_en}}
                            </div>
                        </div>
                    </div>
                </div>
                @endfor
            </div>
        </div>
        </form>
    </div>


    </div>

@endsection

<script type="text/javascript">


    function dosmthing(id,lessons){
        for(var i=0;i < lessons;i++){
            document.getElementById('content' + i).style.display = 'none';
            document.getElementById('tabs' + i).classList.remove("happy");
        }
        document.getElementById('content' + id).style.display = 'block';
        document.getElementById('tabs' + id).classList.add("happy");
    }
</script>
