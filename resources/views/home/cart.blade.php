@extends('layout')

@section('content')

<table class="table mt-5">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Price</th>
      <th scope="col">Quantity</th>
      <th scope="col">Image</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
  @if(session('cart'))
    @foreach(session('cart') as $id => $detail)
    <tr>
      <th scope="row">{{ $loop->iteration }}</th>  
      <td>{{ $detail['name'] }}</td>
      <td>{{ $detail['price'] }}</td>
      <td><input type="number" max="10" min="1" value="{{ $detail['quantity'] }}"></td>
      <td><img src="{{ $detail['image'] }}" alt="Product Image" style="width: 100px;"></td>
      <td><button type="button" class="btn btn-danger"><i data-lucide="trash-2"></i></button></td>
    </tr>
    @endforeach
  @endif
  </tbody>
</table>

@endsection
