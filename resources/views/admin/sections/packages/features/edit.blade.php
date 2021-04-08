@extends('admin.dashboard')
@section('main-container')
    @if( LaravelLocalization::getCurrentLocaleName() == "English")
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <div class="page-header">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="title">
                                <h4>Edit Features Details</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Default Basic Forms Start -->
                <div class="pd-20 card-box mb-30">

                        <div class="form-group row">
                            <div class="col-sm-5">
                                <label>Enter Number of features</label>
                                    <table>
                                        <form action="{{route('feature.change')}}" method="post" enctype="multipart/form-data">

                                            @csrf
                                           <tr>
                                            <td>
                                                <input class="form-control" type="number" min="1" placeholder="Package Name" name="num" style="display:inline-block" value="{{count($package_features)}}">
                                                <input type="hidden" name="package_id" value="{{$package_id}}">
                                            </td>
                                            <td>
                                                <input class="btn btn-dark" type="submit" style="display:inline-block" value="change">
                                            </td>
                                        </tr>
                                        </form>

                                    </table>
                            </div>
                        </div>
                    <form action="{{route('feature.add')}}" method="post">
                        @csrf
                        <?php $i=0;?>
                        @foreach($package_features as $package)
                        <div class="form-group row">
                            <div class="col-sm-5">
                                <label>Arabic Name</label>
                                <div>

                                    <input type="hidden" value="{{count($package_features)}}" name="numberOfFeatures">
                                        <input class="form-control" type="text" placeholder="Package Name" name="name_ar{{$i}}" value="{{$package->name_ar}}">
                                        <input type="hidden"  name="feature_id{{$i}}" value="{{$package->id}}">

                                </div>
                            </div>
                            <div class="col-sm-5">
                                <label>English Name</label>
                                <div >
                                    <input class="form-control" type="text" placeholder="Package Name" name="name_en{{$i}}" value="{{$package->name_en}}">
                                </div>
                            </div>
                            <div class="col-sm-2" style="padding-top: 35px">
                                <div>
                                    <a href="{{route('feature.remove',['id'=>$package->id])}}">
                                    <input type="button" class="btn btn-dark" value="remove">
                                    </a>
                                </div>
                            </div>
                        </div>
                            <?php $i++?>
                        @endforeach
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
        <div class="pd-ltr-20 xs-pd-20-10" style="padding-top:80px">
            <div class="min-height-200px">
                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-12">
                            <center>
                                <div class="title">
                                    <h4>تعديل مميزات الباقة</h4>
                                </div>
                            </center>
                        </div>
                    </div>
                </div>
                <!-- Default Basic Forms Start -->
                <div class="pd-20 card-box mb-30">

                    <div class="form-group row" style="direction: rtl;text-align: right">
                        <div class="col-sm-5">
                            <label>قم بادخال عدد الخصائص</label>
                            <table>
                                <form action="{{route('feature.change')}}" method="post" enctype="multipart/form-data">

                                    @csrf
                                    <tr>
                                        <td>
                                            <input class="form-control" type="number" min="1" placeholder="Package Name" name="num" style="display:inline-block" value="{{count($package_features)}}">
                                            <input type="hidden" name="package_id" value="{{$package_id}}">
                                        </td>
                                        <td>
                                            <input class="btn btn-dark" type="submit" style="display:inline-block" value="تغيير">
                                        </td>
                                    </tr>
                                </form>

                            </table>
                        </div>
                    </div>
                    <form action="{{route('feature.add')}}" method="post">
                        @csrf
                        <?php $i=0;?>
                        @foreach($package_features as $package)
                            <div class="form-group row">
                                <div class="col-sm-5">
                                    <label>الاسم بالعربية</label>
                                    <div>

                                        <input type="hidden" value="{{count($package_features)}}" name="numberOfFeatures">
                                        <input class="form-control" type="text" placeholder="Package Name" name="name_ar{{$i}}" value="{{$package->name_ar}}">
                                        <input type="hidden"  name="feature_id{{$i}}" value="{{$package->id}}">

                                    </div>
                                </div>
                                <div class="col-sm-5">
                                    <label>الاسم بالانجليزية</label>
                                    <div >
                                        <input class="form-control" type="text" placeholder="Package Name" name="name_en{{$i}}" value="{{$package->name_en}}">
                                    </div>
                                </div>
                                <div class="col-sm-2" style="padding-top: 35px">
                                    <div>
                                        <a href="{{route('feature.remove',['id'=>$package->id])}}">
                                            <input type="button" class="btn btn-dark" value="حذف">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <?php $i++?>
                        @endforeach
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
