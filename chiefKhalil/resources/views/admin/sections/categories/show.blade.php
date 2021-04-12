@extends('admin.dashboard')
@section('main-container')

    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4>View {{$category->name_ar}} Details</h4>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Default Basic Forms Start -->
            <div class="pd-20 card-box mb-30">

                <form method="post" action="{{route('categories.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Arabic Name</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="text" placeholder="Arabic Name" name="name_ar" style="direction: rtl;text-align:right" disabled value="{{$category->name_ar}}">

                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">English Name</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" placeholder="English Name" type="search" name="name_en" disabled value="{{$category->name_en}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Description Arabic</label>
                        <div class="col-sm-12 col-md-10">
                            <textArea placeholder="Description in Arabic" class="form-control" name="description_ar" style="direction: rtl;text-align:right" disabled >{{$category->description_ar}}</textArea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Description English</label>
                        <div class="col-sm-12 col-md-10">
                            <textArea placeholder="Description in Arabic" class="form-control" name="description_en" disabled>{{$category->description_en}}</textArea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label" disabled>Image</label>
                        <div class="col-sm-12 col-md-10">
<!--                            <input class="form-control"  type="file" name="image">-->
                            <img src="{{asset('assets/images/categories/'.$category->image.'')}}" alt="" style="width:300px;height:300px">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12 col-md-12">
                            <center>
                            </center>
                        </div>
                    </div>
                </form>
            </div>
            <!-- Default Basic Forms End -->


        </div>

    </div>
@endsection
