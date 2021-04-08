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
</style>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

@if( LaravelLocalization::getCurrentLocaleName() == "English")
    @section('main-container')
        <div class="table-responsive"  style="overflow-y:scroll">
            <table id="myTable" class="table table-striped table-bordered table-sm"  style="width:100%;" style="text-align:center">
                <thead>
                <tr>
                    <th class="th-sm">
                       Number
                    </th>
                    <th class="th-sm">
                        Name
                    </th>
                    <th class="th-sm">
                        Price
                    </th>
                    <th class="th-sm">
                        Duration
                    </th>
                    <th>
                        Features
                    </th>
                    <th >
                        <center>
                            Controllers
                        </center>
                    </th>

                </tr>
                </thead>
                <tbody>
                <?php $i = 0?>
                @foreach($categories as $category)
                <tr style="text-align:left">
                    <?php $i++ ?>
                        <td>{{$i}}</td>
                        <td>{{$category->name}}</td>
                        <td>{{$category->price}}</td>
                        <td>{{$category->duration}}</td>
                        <td> <a class="btn btn-dark col-sm-8" href="{{route('feature.get',['package_id'=>$category->id])}}">Features</a></td>

                        <td>
                            <center>
                                <div class="btn-group" role="group" aria-label="Button group with nested dropdown">


                                    <div class="btn-group" role="group">
                                        <button id="btnGroupDrop1" type="button" class="btn btn-dark dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Controllers
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                            <a class="btn btn-dark col-sm-12" href="{{route('packages.show',['package'=>$category->id])}}">Show</a>
                                            <a class="btn btn-dark col-sm-12"  href="{{route('packages.edit',['package'=>$category->id])}}">Edit</a>
                                            <form method="post" action="{{route('packages.destroy',['package'=>$category->id])}}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-dark col-sm-12" >Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </center>
                      </td>


                </tr>
                @endforeach

                <tfoot>
                <tr>
                    <th colspan="9">
                        <center>
                            <br>
                            <a href="{{route('packages.create')}}" class="btn btn-dark ">Add New Category</a>

                        </center>
                    </th>

                </tr>
                </tfoot>
            </table>
        </div>
    @endsection
@else
    @section('main-container')
        <div class="table-responsive"  style="overflow-y:scroll;text-align:right;direction:rtl;padding-top: 100px">
            <table id="myTable" class="table table-striped table-bordered table-sm"  style="width:100%;" style="text-align:center">
                <thead>
                <tr>
                    <th class="th-sm">
                        الترتيب
                    </th>
                    <th class="th-sm">
                        اسم الباقة
                    </th>
                    <th class="th-sm">
                        سعر الباقة
                    </th>
                    <th class="th-sm">
                        توقيت الباقة
                    </th>
                    <th>
                        المميزات
                    </th>
                    <th >
                        <center>
                            التحكم
                        </center>
                    </th>

                </tr>
                </thead>
                <tbody>
                <?php $i = 0?>
                @foreach($categories as $category)
                    <tr style="text-align:right">
                        <?php $i++ ?>
                        <td>{{$i}}</td>
                        <td>{{$category->name}}</td>
                        <td>{{$category->price}}</td>
                        <td>{{$category->duration}}</td>
                        <td> <a class="btn btn-dark col-sm-8" href="{{route('packages.show',['package'=>$category->id])}}">المميزات</a></td>
                        <td>
                            <center>
                                <div class="btn-group" role="group" aria-label="Button group with nested dropdown">


                                    <div class="btn-group" role="group">
                                        <button id="btnGroupDrop1" type="button" class="btn btn-dark dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            التحكم
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                            <a class="btn btn-dark col-sm-12" href="{{route('packages.show',['package'=>$category->id])}}">عرض</a>
                                            <a class="btn btn-dark col-sm-12"  href="{{route('packages.edit',['package'=>$category->id])}}">تعديل</a>
                                            <form method="post" action="{{route('packages.destroy',['package'=>$category->id])}}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-dark col-sm-12" >حذف</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </center>
                        </td>


                    </tr>
                @endforeach

                <tfoot>
                <tr>
                    <th colspan="9">
                        <center>
                            <br>
                            <a href="{{route('packages.create')}}" class="btn btn-dark ">أضافة باقة جديدة</a>

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
