@extends('admin.dashboard')
@section('main-container')
    @if( LaravelLocalization::getCurrentLocaleName() == "English")

    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4>Edit Package Details</h4>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Default Basic Forms Start -->
            <div class="pd-20 card-box mb-30">

                <form method="post" action="{{route('packages.update',['package'=>$category->id])}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Package Name</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="text" placeholder="Package Name" name="name" value="{{$category->name}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Package Price</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" placeholder="Package Price" type="number" name="price" value="{{$category->price}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Package Duration</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" placeholder="Package Duration" type="number" name="duration" value="{{$category->duration}}">

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
                </form>
            </div>
            <!-- Default Basic Forms End -->


        </div>

    </div>
    @else
        <div class="pd-ltr-20 xs-pd-20-10" style="padding-top: 100px">
            <div class="min-height-200px">
                <div class="page-header">
                    <div class="row">
                        <div class=" col-sm-12">
                            <center>
                                <div class="title">
                                    <h4>تعديل بيانات الباقه </h4>
                                </div>
                            </center>

                        </div>
                    </div>
                </div>
                <!-- Default Basic Forms Start -->
                <div class="pd-20 card-box mb-30" style="direction:rtl;text-align:right;">

                    <form method="post" action="{{route('packages.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">أسم الباقة</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" type="text" placeholder="أسم الباقة" name="name" value="{{$category->name}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">سعر الباقة</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" placeholder="سعر الباقة" type="number" name="price" value="{{$category->price}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">مدة الباقة</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" placeholder="مدة الباقة" type="number" name="duration" value="{{$category->duration}}">

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <center>
                                        <input class="form-control btn btn-outline-primary"  type="submit" name="save" value="حفظ">
                                    </center>
                                </div>
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
