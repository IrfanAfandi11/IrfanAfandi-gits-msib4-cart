@extends('dashbord.layout.main')

@section('content')
<main class="container-fluid px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2">Riwayat Transaksi</h1>
    </div>
  
    @if ($message = Session::get('success'))
      <div class="alert alert-success">
        <p>{{ $message }}</p>
      </div>
    @endif
  
    <div class="card mb-4">
      <div class="card-body">
          <table id="datatablesSimple">
              <thead>
                  <tr>
                    <th>Name</th>
                    <th>Product</th>
                    <th>Status</th>
                    <th>Jumlah</th>
                    <th>Price</th>
                  </tr>
              </thead>
              <tfoot>
                  <tr>
                    <th>Name</th>
                    <th>Product</th>
                    <th>Status</th>
                    <th>Jumlah</th>
                    <th>Price</th>
                  </tr>
              </tfoot>
              <tbody>
                @foreach ($transaction as $item)
                  <tr>
                    <td>{{ $item->cart->user->name }}</td>
                    <td>{{ $item->product->name}}</td>
                    <td>
                      @if( $item->cart->status  == 1)
                      <form action="/verify" method="get" class="d-inline">
                          @csrf
                          <input type="hidden" name="id" value="{{ $item->cart->id }}">
                          <button type="submit" class="btn btn-warning" >Verify</button>
                      </form>
      
                  @else
                      <form action="/block" method="get" class="d-inline">
                          @csrf
                          <input type="hidden" name="id" value="{{ $item->cart->id }}">
                          <button type="submit" class="btn btn-success" >Verified</button>
                      </form>
                  @endif
                    </td>
                    <td>{{ $item->jumlah}}</td>
                    <td align="right">Rp. {{ number_format($item->jumlah_harga-$item->cart->kode) }}</td>
                  </tr>
                @endforeach
              </tbody>
          </table>
      </div>
    </div>
  </main>
@endsection