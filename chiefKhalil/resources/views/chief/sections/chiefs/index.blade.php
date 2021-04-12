@extends('admin.dashboard')
@if( LaravelLocalization::getCurrentLocaleName() == "English")
@section('main-container')
    <div class="table-responsive"  style="width:100%;">
        <table id="myTable" class="table table-striped table-bordered table-sm"  style="text-align:left">
            <thead>
            <tr>
                <th class="th-sm">
                    Number
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
                <th  >
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
                    <td>{{$category->fname}}</td>
                    <td>{{$category->lname}}</td>
                    <td>{{$category->email}}</td>
                    <td>{{$category->phone}}</td>
                    <td>
                        <center>
                            <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                                <div class="btn-group" role="group">
                                    <button id="btnGroupDrop1" type="button" class="btn btn-dark dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Controllers
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                        <a class="btn btn-dark col-sm-12" href="{{route('chiefs.show',['chief'=>$category->id])}}">Show</a>
                                        <a class="btn btn-primary col-sm-12"  href="{{route('chiefs.edit',['chief'=>$category->id])}}">Edit</a>
                                        <form method="post" action="{{route('chiefs.destroy',['chief'=>$category->id])}}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger col-sm-12" >Delete</button>
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
                <th colspan="6">
                    <center>
                        <br>
                        <a href="{{route('chiefs.create')}}" class="btn btn-dark ">Add New Chief</a>

                    </center>
                </th>

            </tr>
            </tfoot>
        </table>
    </div>
@endsection
@else
@section('main-container')
    <div style="text-align:right;direction:rtl">
        <input class=" p-2" type="text" id="myInput" onKeyUp="myFunction()" placeholder="بحث ..">
        <div class="table-responsive"  style="overflow-y:scroll">
            <table id="myTable" class="table table-striped table-bordered table-sm"  style="width:100%;" style="text-align:center">
                <thead>
                <tr>
                    <th class="th-sm">
                        الترتيب
                    </th>
                    <th class="th-sm">
                        الصوره
                    </th>
                    <th class="th-sm">
                        الاسم بالعربية
                    </th>
                    <th class="th-sm">
                        الاسم بالانجليزية
                    </th>
                    <th class="th-sm">
                        التفاصيل بالعربية
                    </th>
                    <th class="th-sm">
                        التفاصيل بالانحليزية
                    </th>
                    <th colspan="3" >
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
                        <td><img src="" alt="" style="width:70px;height:70px"></td>
                        <td>{{$category->name_ar}}</td>
                        <td>{{$category->name_en}}</td>
                        <td>{{$category->description_ar}}</td>
                        <td>{{$category->description_en}}</td>
                        <td colspan="3">
                            <div class="row">
                                <div class="col-sm-4">
                                    <form action="">
                                        <button class="btn btn-dark" style="width:100%">عرض</button>
                                    </form>
                                </div>
                                <div class="col-sm-4">
                                    <form action="">
                                        <button class="btn btn-primary" style="width:100%">تعديل</button>
                                    </form>
                                </div>
                                <div class="col-sm-4">
                                    <form action="">
                                        <button class="btn btn-danger" style="width:100%">حذف</button>
                                    </form>
                                </div>
                            </div>

                        </td>

                    </tr>
                @endforeach

                <tfoot>
                <tr>
                    <th colspan="9">
                        <center>
                            <br>
                            <a href="{{route('categories.create')}}" class="btn btn-dark ">اضافة فئة جديدة</a>

                        </center>
                    </th>

                </tr>
                </tfoot>
            </table>
        </div>
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
