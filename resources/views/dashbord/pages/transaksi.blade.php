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
                    <th>Image</th>
                    <th>Price</th>
                  </tr>
              </thead>
              <tfoot>
                  <tr>
                    <th>Name</th>
                    <th>Product</th>
                    <th>Status</th>
                    <th>Image</th>
                    <th>Price</th>
                  </tr>
              </tfoot>
              <tbody>
                @foreach ($transaction as $item)
                  <tr>
                    <td>{{ $cart->user->name }}</td>
                    <td>{{ $item->product->name }}</td>
                    <td>
                        @if($item->status == 1)
                            Sudah Pesan & Belum dibayar
                        @else
                            Sudah dibayar 
                        @endif
                    </td>
                    <td><img width="60px" height="60px" src="{{ Storage::url('gambar/').$item->product->image }}" ></td>
                    <td align="right">Rp. {{ number_format($cart->jumlah_harga-$cart->kode) }}</td>
                    {{-- <td>
                      <form action="/product/{{ $item->id }}" method="POST" class="d-inline">
                        @method('DELETE')
                        @csrf
  
                        {{-- Update  --}}
                        {{-- <a href="product/{{ $item->id }}/edit" class="badge bg-info"><i class="fa-solid fa-pen-to-square"></i></a>   --}}
                        {{-- Delete  --}}
                        {{-- <button class="badge bg-danger border-0" onclick="return confirm('apakah anda yakin ?')"><i class="fa-solid fa-trash-can"></i></button>
                      </form>
                    </td>  --}}
                  </tr>
                @endforeach
              </tbody>
          </table>
      </div>
    </div>
  </main>
@endsection