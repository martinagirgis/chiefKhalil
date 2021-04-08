@extends('admin.dashboard')
<style>
    table.dataTable thead .sorting:after,
    table.dataTable thead .sorting:before,
    table.dataTable thead .sorting_asc:after,
    table.dataTable thead .sorting_asc:before,
    table.dataTable thead .sorting_asc_disabled:after,
    table.dataTable thead .sorting_asc_disabled:before,
    table.dataTable thead .sorting_desc:after,
    table.dataTable thead .sorting_desc:before,
    table.dataTable thead .sorting_desc_disabled:after,
    table.dataTable thead .sorting_desc_disabled:before {
        bottom: .5em;
    }
    table thead tr th{
        width:1px; white-space:nowrap;
        text-align:center;
    }
    table tbody tr td{
        white-space:normal;
    }
</style>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

@if( LaravelLocalization::getCurrentLocaleName() == "English")
@section('main-container')
    <div class="table-responsive"  style="overflow-y:scroll;">
        <table id="myTable" class="table table-striped table-bordered table-sm table-responsive"  style="width:auto;" style="text-align:center;layout:auto">
            <thead>
            <tr>
                <th>Number</th>
                <th>
                    image
                </th>
                <th class="th-sm">
                    First Name
                </th>
                <th class="th-sm">
                    Last Name
                </th>
                <th class="th-sm">
                    Email
                </th>
                <th class="th-sm">
                    Phone
                </th>
                <th>
                    Gender
                </th>

                <th>
                    Package
                </th>
                <th>
                    State
                </th>
                <th>
                    End of Subscription
                </th>
                <th >
                    <center>
                        Controllers
                    </center>
                </th>

            </tr>
            </thead>
            <tbody>
            <?php $i=1;?>
            @foreach($categories as $category)
                <tr style="text-align:center">
                    <td>
                        {{$i}}
                    </td>
                    <td>
                        <img src="{{asset('assets/images/users/'.$category->image.'')}}" alt="" style="width:70px;height:70px">
                    </td>
                    <td>{{$category->fname}}</td>
                    <td>{{$category->lname}}</td>
                    <td>{{$category->email}}</td>
                    <td>{{$category->phone}}</td>
                    <td>{{$category->gender}}</td>

                    <td>{{$category->userPackages->name}}</td>
                    <!-- Change States -->
                    <td >
                        @if($category->state == 0)
                            <div class="col-sm-12">
                                Refused
                            </div>
                            <div class="col-sm-12">
                                <form action="{{route('users.state')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="state" value="1">
                                    <input type="hidden" name="userId" value="{{$category->id}}">
                                    <input type="submit" class="btn btn-success" value="Accept">
                                </form>
                            </div>
                        @elseif($category->state == 1)
                            <div class="col-sm-12">
                                <h6>
                                    Accepted
                                </h6>
                            </div>
                            <div class="col-sm-12">
                                <form action="{{route('users.state')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="state" value="0">
                                    <input type="hidden" name="userId" value="{{$category->id}}">
                                    <input type="submit" class="btn btn-danger" value="Refuse">
                                </form>
                            </div>
                        @else
                            <div class="col-sm-12">
                            <h6>
                                Pending
                            </h6>

                            </div>

                            <div class="col-sm-6">
                                <form action="{{route('users.state')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="state" value="1">
                                    <input type="hidden" name="userId" value="{{$category->id}}">
                                    <input type="submit" class="btn btn-success" value="Accept">
                                </form>
                            </div>
                            <div class="col-sm-6">
                                <form action="{{route('users.state')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="state" value="0">
                                    <input type="hidden" name="userId" value="{{$category->id}}">
                                    <input type="submit" class="btn btn-danger" value="Refuse">
                                </form>
                            </div>


                        @endif
                    </td>
                    <!-- End of States -->
                    <td>{{$category->endDateSubscripe}}</td>

                    <td>
                        <center>
                            <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                                <div class="btn-group" role="group">
                                    <button id="btnGroupDrop1" type="button" class="btn btn-dark dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Controllers
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                        <a class="btn btn-dark col-sm-12" href="{{route('users.show',['user'=>$category->id])}}">Show</a>
                                        <a class="btn btn-dark col-sm-12"  href="{{route('chiefs.edit',['chief'=>$category->id])}}">Edit</a>
                                        <form method="post" action="{{route('chiefs.destroy',['chief'=>$category->id])}}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-dark col-sm-12" >Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </center>
                    </td>


<?$i++?>
                </tr>
            @endforeach
            <tfoot>
            <tr>
                <th colspan="11">
                    <center>
                        <br>
                        <a href="{{route('users.create')}}" class="btn btn-dark ">Add New User</a>

                    </center>
                </th>

            </tr>
            </tfoot>
        </table>
    </div>
@endsection
@else
@section('main-container')
    <div class="table-responsive"  style="overflow-y:scroll;padding-top: 100px;">
        <table id="myTable" class="table table-striped table-bordered table-sm table-responsive"  style="text-align:center;width:auto">
            <thead>
            <tr>
                <th>الترتيب</th>
                <th>
                    الصورة
                </th>
                <th class="th-sm">
                  الاسم الاول
                </th>
                <th class="th-sm">
                    الاسم الاخير
                </th>
                <th class="th-sm">
                    البريد الإلكتروني
                </th>
                <th class="th-sm">
                   رقم الهاتف
                </th>
                <th>
                    النوع
                </th>

                <th>
                    الباقة
                </th>
                <th>
                    الحالة
                </th>
                <th>
                   نهاية الاشتراك
                </th>
                <th >
                    <center>
                        التحكم
                    </center>
                </th>

            </tr>
            </thead>
            <tbody>
            <?php $i=1;?>
            @foreach($categories as $category)
                <tr style="text-align:center">
                    <td>
                        {{$i}}
                    </td>
                    <td>
                        <img src="{{asset('assets/images/courses/'.$category->image.'')}}" alt="" style="width:70px;height:70px">
                    </td>
                    <td>{{$category->fname}}</td>
                    <td>{{$category->lname}}</td>
                    <td>{{$category->email}}</td>
                    <td>{{$category->phone}}</td>
                    <td>{{$category->gender}}</td>

                    <td>{{$category->userPackages->name}}</td>
                    <!-- Change States -->
                    <td >
                        @if($category->state == 0)
                            <div class="col-sm-12">
                                رفض
                            </div>
                            <div class="col-sm-12">
                                <form action="{{route('users.state')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="state" value="1">
                                    <input type="hidden" name="userId" value="{{$category->id}}">
                                    <input type="submit" class="btn btn-success" value="قبول">
                                </form>
                            </div>
                        @elseif($category->state == 1)
                            <div class="col-sm-12">
                                <h6>
                                    قبول
                                </h6>
                            </div>
                            <div class="col-sm-12">
                                <form action="{{route('users.state')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="state" value="0">
                                    <input type="hidden" name="userId" value="{{$category->id}}">
                                    <input type="submit" class="btn btn-danger" value="رفض">
                                </form>
                            </div>
                        @else
                            <div class="col-sm-12">
                                <h6>
                                    قيد الانتظار
                                </h6>

                            </div>

                            <div class="col-sm-6">
                                <form action="{{route('users.state')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="state" value="1">
                                    <input type="hidden" name="userId" value="{{$category->id}}">
                                    <input type="submit" class="btn btn-success" value="قبول">
                                </form>
                            </div>
                            <div class="col-sm-6">
                                <form action="{{route('users.state')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="state" value="0">
                                    <input type="hidden" name="userId" value="{{$category->id}}">
                                    <input type="submit" class="btn btn-danger" value="رفض">
                                </form>
                            </div>


                        @endif
                    </td>
                    <!-- End of States -->
                    <td>{{$category->endDateSubscripe}}</td>

                    <td>
                        <center>
                            <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                                <div class="btn-group" role="group">
                                    <button id="btnGroupDrop1" type="button" class="btn btn-dark dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        التحكم
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                        <a class="btn btn-dark col-sm-12" href="{{route('users.show',['user'=>$category->id])}}">عرض</a>
                                        <a class="btn btn-dark col-sm-12"  href="{{route('chiefs.edit',['chief'=>$category->id])}}">تعديل</a>
                                        <form method="post" action="{{route('chiefs.destroy',['chief'=>$category->id])}}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-dark col-sm-12" >حذف</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </center>
                    </td>


                    <?$i++?>
                </tr>
            @endforeach
            <tfoot>
            <tr>
                <th colspan="11">
                    <center>
                        <br>
                        <a href="{{route('users.create')}}" class="btn btn-dark ">Add New User</a>

                    </center>
                </th>

            </tr>
            </tfoot>
        </table>
    </div>

@endsection
@endif
<script>
    function myFunction() {
        // Declare variables
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");

        // Loop through all table rows, and hide those who don't match the search query
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }
</script>
