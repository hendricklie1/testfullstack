@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Products</div>

                <div class="card-body">
                    <div class="col-md-12">
                        <form action="{{ route('products.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-2">
                                    <label>Name<label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" name="name">
                                </div>
                            </div>

                            <div class="row" style="margin-top:10px;">
                                <div class="col-md-2">
                                    <label>Price<label>
                                </div>
                                <div class="col-md-10">
                                    <input type="number" class="form-control" name="price">
                                </div>
                            </div>

                            <div class="row" style="margin-top:10px;">
                                <div class="col-md-2">
                                    <label>Stock<label>
                                </div>
                                <div class="col-md-10">
                                    <input type="number" class="form-control" name="stock">
                                </div>
                            </div>

                            <div class="row" style="margin-top:10px;">
                                <div class="col-md-2">
                                    <label>Description<label>
                                </div>
                                <div class="col-md-10">
                                    <textarea class="form-control" name="description" height="5"></textarea>
                                </div>
                            </div>

                            <div class="row" style="margin-top:10px;">
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">

</script>
@endsection