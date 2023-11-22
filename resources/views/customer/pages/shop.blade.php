@extends('..customer/layouts/app')
@section('content_customer')
@php
  $category = DB::select("SELECT * FROM category ");
@endphp
<div class="site-section">
    <div class="container">

      <div class="row mb-5">
        <div class="col-md-9 order-2">

          <div class="row">
            <div class="col-md-12 mb-5">
              <div class="float-md-left mb-4"><h2 class="text-black h5">Shop All</h2></div>
              <div class="d-flex">
                <div class="dropdown mr-1 ml-md-auto">
                  <button type="button" class="btn btn-secondary btn-sm dropdown-toggle" id="dropdownMenuOffset" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Categories
                  </button>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuOffset">
                    @foreach ($category  as $dt)
                      <a class="dropdown-item" href="#">{{ $dt->categoryname }}</a>
                    @endforeach
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row mb-5">
         @foreach ($products as $item)
         <div class="col-sm-6 col-lg-4 mb-4" data-aos="fade-up">
          <div class="block-4 text-center border">
            <figure class="block-4-image" >
              <a href="/shop/single"><img src="{{asset('assets/customer/images/cloth_1.png')}}" alt="Image placeholder" class="img-fluid" ></a>
            </figure>
            <div class="block-4-text p-4">
              <h3><a href="/shop/single">{{ $item->name }}</a></h3>
              <p class="mb-0">11kg</p>
              <p class="text-primary font-weight-bold">{{ $item->sellprice }}₱50</p>
            </div>
          </div>
        </div>
         @endforeach
          </div>
          {{-- {!! $products->links() !!} --}}
          {{ $products->links('vendor.pagination.pagination-custom') }}
          {{-- <div class="row" data-aos="fade-up">
            <div class="col-md-12 text-center">
              <div class="site-block-27">
                <ul>
                  <li><a href="#">&lt;</a></li>
                  <li class="active"><span>1</span></li>
                  <li><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#">4</a></li>
                  <li><a href="#">5</a></li>
                  <li><a href="#">&gt;</a></li>
                </ul>
              </div>
            </div>
          </div> --}}
        </div>

        <div class="col-md-3 order-1 mb-5 mb-md-0">

            <form action="{{ route('shop.page') }}" method="GET" class="site-block-top-search">
                <span class="icon icon-search2"></span>
                <input type="text" class="form-control border-0" name="search" placeholder="Search">
            </form>
            <hr>
          <div class="border p-4 rounded mb-4">
            <h3 class="mb-3 h6 text-uppercase text-black d-block">Categories</h3>
            <ul class="list-unstyled mb-0">
              @foreach ($category  as $dt)
                <li class="mb-1"><a class="d-flex" href="#">{{ $dt->categoryname }}</a></span></a></li>
              @endforeach
            </ul>
          </div>
        </div>
      </div>

    </div>
  </div>
  @endsection
