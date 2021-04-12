@extends('admin.dashboard')
@section('main-container')

    <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <div class="page-header">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="title">
                                <h4>Add New Category</h4>
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
                                <input class="form-control" type="text" placeholder="Arabic Name" name="name_ar" style="direction: rtl;text-align:right">
{{--                                @error('name_ar')--}}
{{--                                <small class="form-text text-danger">{{$message}}</small>--}}
{{--                                @enderror()--}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">English Name</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" placeholder="English Name" type="search" name="name_en">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Description Arabic</label>
                            <div class="col-sm-12 col-md-10">
                                <textArea placeholder="Description in Arabic" class="form-control" name="description_ar" style="direction: rtl;text-align:right"></textArea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Description English</label>
                            <div class="col-sm-12 col-md-10">
                                 <textArea placeholder="Description in Arabic" class="form-control" name="description_en" ></textArea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Image</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control"  type="file" name="image">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12 col-md-12">
                                <center>
                                    <input class="col-sm-4 btn btn-dark"  type="submit" value="Save">
                                </center>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- Default Basic Forms End -->


            </div>

        </div>
@endsection
