@extends('admin.dashboard')
@section('main-container')
    @if( LaravelLocalization::getCurrentLocaleName() == "English")

    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4>User Details</h4>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Default Basic Forms Start -->
            <div class="pd-20 card-box mb-30">

                <form method="post" action="{{route('packages.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">ID</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="text" placeholder="Package Name" name="fname" disabled value="{{$category->id}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Image</label>
                        <div class="col-sm-12 col-md-10">
                            <img src="{{asset('assets'.$category->image.'')}}" alt="" style="width:80px;height:80px">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">First Name</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="text" placeholder="Package Name" name="fname" disabled value="{{$category->fname}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Last Name</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" placeholder="Package Price" type="text" name="lname" disabled value="{{$category->lname}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Email</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" placeholder="Package Duration" type="text" name="duration" disabled value="{{$category->email}}">

                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Phone</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" placeholder="Package Duration" type="text" name="duration" disabled value="{{$category->countryCode}} {{$category->phone}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Package</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" placeholder="Package Duration" type="text" name="duration" disabled value="{{$category->userPackages->name}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Active</label>
                        <div class="col-sm-12 col-md-10">
                            @if($category->active == 0)
                               <input class="form-control btn btn-danger" placeholder="Package Duration" type="text" name="duration" disabled value="Banned">
                            @elseif($category->active == 1)
                                <input class="form-control btn btn-success" placeholder="Package Duration" type="text" name="duration" disabled value="Activated">
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">State</label>
                        <div class="col-sm-12 col-md-10">
                            @if($category->state == 0)
                                <input class="form-control btn btn-danger" placeholder="Package Duration" type="text" name="duration" disabled value="Refused">
                            @elseif($category->state == 1)
                                <input class="form-control btn btn-success" placeholder="Package Duration" type="text" name="duration" disabled value="Accepted">
                            @elseif($category->state == 2)
                                <input class="form-control btn btn-dark" placeholder="Package Duration" type="text" name="duration" disabled value="Pending">
                            @endif
                        </div>
                    </div>
                </form>
            </div>
            <!-- Default Basic Forms End -->


        </div>

    </div>
    @else
        <div class="pd-ltr-20 xs-pd-20-10" style="padding:100px;direction: rtl;text-align:right">
            <div class="min-height-200px">
                <div class="page-header">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="title">
                                <h4>تفاصيل المستخدم</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Default Basic Forms Start -->
                <div class="pd-20 card-box mb-30">

                    <form method="post" action="{{route('packages.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">الترتيب</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" type="text" placeholder="Package Name" name="fname" disabled value="{{$category->id}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">الصورة</label>
                            <div class="col-sm-12 col-md-10">
                                <img src="{{asset('assets'.$category->image.'')}}" alt="" style="width:80px;height:80px">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">الاسم الاول</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" type="text" placeholder="Package Name" name="fname" disabled value="{{$category->fname}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">الاسم الاخير</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" placeholder="Package Price" type="text" name="lname" disabled value="{{$category->lname}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">البريد الإلكتروني</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" placeholder="Package Duration" type="text" name="duration" disabled value="{{$category->email}}">

                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">رقم الهاتف</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" placeholder="Package Duration" type="text" name="duration" disabled value="{{$category->countryCode}} {{$category->phone}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">الباقة</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" placeholder="Package Duration" type="text" name="duration" disabled value="{{$category->userPackages->name}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">الحاله</label>
                            <div class="col-sm-12 col-md-10">
                                @if($category->state == 0)
                                    <input class="form-control btn btn-danger" placeholder="Package Duration" type="text" name="duration" disabled value="مرفوض">
                                @elseif($category->state == 1)
                                    <input class="form-control btn btn-success" placeholder="Package Duration" type="text" name="duration" disabled value="مقبول">
                                @elseif($category->state == 2)
                                    <input class="form-control btn btn-dark" placeholder="Package Duration" type="text" name="duration" disabled value="قيد الانتظار">
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
                <!-- Default Basic Forms End -->


            </div>

        </div>

    @endif

@endsection
<script>
    var flag = 0;
    if(flag === 1){
        var oldVal=0;
    }
    function NumOfFields(){
        usingClassNameToShowDisplayNone();
        var skills = document.getElementById('skills').value;
        //alert(skills);
        if(skills > 0) {

            if (flag !== 1) {
                var test = document.getElementById('sad');
                for (var i = 0; i < skills; i++) {
                    var newtest = test.cloneNode(true);
                    newtest.style.display = "block";
                    newtest.id = 'skill' + i;
                    newtest.name = 'skill' + i;

                    newtest.placeholder = 'Type Your Skill';
                    document.getElementById("container").appendChild(newtest);

                    var newtest2 = test.cloneNode(true);
                    newtest2.style.display = "block";
                    newtest2.id = 'percentages' + i;
                    newtest2.name = 'percentages' + i;

                    newtest2.type = 'number';
                    newtest2.placeholder = 'Type Your Percentage % ';
                    document.getElementById("container1").appendChild(newtest2);


                    flag = 1;
                    oldVal = skills;
                }
            } else if(oldVal !== null) {
                alert('You have already specify number of skills ');
                flag =0;
                resetFields(oldVal);
                //alert(oldVal + '' + skills);
            }
        }else{
            alert('Enter a valid number');
        }
    }
    function resetFields(oldVal){
        for(var i=0;i<oldVal;i++) {
            var myobj = document.getElementById("skill"+i);
            var myobj2 = document.getElementById("percentages"+i);

            myobj.remove();
            myobj2.remove();
        }
        NumOfFields();
    }

    function usingClassNameToShowDisplayNone() {
        var myClasses = document.querySelectorAll('.hh'),
            i = 0,
            l = myClasses.length;
        for (i; i < l; i++) {
            myClasses[i].style.display = 'block';
        }
    }
</script>
