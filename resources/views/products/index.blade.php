@extends('layouts.app')

@section('content')
<!-- <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script> -->
<!-- <div id="my_vue"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap4.min.css">
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Products</div>

                    @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{ session('success') }}</strong>  
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif

                    <div class="card-body">
                        <div class="col-md-12">
                            <a class="btn btn-default" href="{{route('products.add')}}">Add</a>
                        </div>
                        <div class="col-md-12" style="margin-top:10px;">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="products" style="font-size:12px;">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Price</th>
                                            <th>Stock</th>
                                            <th>Description</th>
                                            <th>Created At</th>
                                            <th>#</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($products as $p)
                                        <tr>
                                            <td>{{$p->id}}</td>
                                            <td>{{$p->name}}</td>
                                            <td>{{$p->price}}</td>
                                            <td>{{$p->stock}}</td>
                                            <td>{{$p->description}}</td>
                                            <td>{{$p->created_at}}</td>
                                            <td>
                                                <a class="btn btn-warning btn-sm" href="{{url('products/update/'.$p->id)}}">Update</a>
                                                <a class="btn btn-danger btn-sm" href="{{url('products/delete/'.$p->id)}}">Delete</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- </div> -->
<script type="text/javascript">
let table = new DataTable('#products');
// let app = new Vue({
//     el:'#my_vue',
//     data:{
//         title:'Products'

//     },
//     methods:{

//     }
// });
</script>
@endsection