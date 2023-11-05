@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Products</div>

                <div class="card-body">
                    <div class="col-md-12">
                        <form action="{{ route('transactions.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-2">
                                    <label>Products<label>
                                </div>
                                <div class="col-md-10">
                                    <select class="form-control" name="product_id">
                                        @foreach($products as $p)
                                        <option value="{{$p->id}}">{{$p->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row" style="margin-top:10px;">
                                <div class="col-md-2">
                                    <label>Quantity<label>
                                </div>
                                <div class="col-md-10">
                                    <input type="number" class="form-control" name="quantity">
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