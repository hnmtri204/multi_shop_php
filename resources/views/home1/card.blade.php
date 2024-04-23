@extends('layout')

@section('content')

<table class="table mt-5">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Image</th>
      <th scope="col">Price</th>
      <th scope="col">Quantity</th>
      <th scope="col">Update</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>

    @php
    $total = 0;
    @endphp
    
    @foreach($cart as $item)
    @php
    $subtotal = $item['price'] * $item['quantity'];
    $total += $subtotal;
    @endphp
    <tr>
      <td> # </td>
      <td>{{ $item['name'] }}</td>
      <td>
        <img src="{{ $item['img'] }}" alt="Product Image" style="width: 100px;">
      </td>
      <td>{{ $item['price'] }}</td>

      <form action="{{ route('update-card', $item['id']) }}" method="post">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        <td> <input type="number" name="quantity" max="10" min="1" value="{{ $item['quantity'] }}"></td>
        <td><button type="submit" class="btn btn-primary"><i data-lucide="check"></i></button></td>
      </form>

      <td>
        <form action="{{ route('delete-card', $item['id']) }}" method="post">
          {{ csrf_field() }}
          {{ method_field('DELETE') }}
          <button type="submit" class="btn btn-danger"><i data-lucide="trash-2"></i></button>
        </form>
      </td>
    </tr>
    @endforeach


    <tr>
      <td colspan="5" class="text-right">Total Price</td>
      <td>{{ $total }}</td> 
    </tr>
  </tbody>
</table>

@endsection
