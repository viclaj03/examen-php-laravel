@extends('layouts.gangaBatoi')
@section('content')
    <section class="hero-slider">
        <!-- Single Slider -->
        <div class="single-slider">
            <div class="container">
                <div class="row no-gutters">
                    <div class="col-lg-9 offset-lg-3 col-12">
                        <div class="text-inner">
                            <div class="row">
                                <div class="col-lg-7 col-12">
                                    <div class="hero-text">
                                        <h1><span>UP TO 50% OFF </span>Gangues Escandaloses</h1>
                                        <p>Ací trobaras <br> les ganges més grans <br> de tota la web.</p>
                                        <div class="button">
                                            <a href="#" class="btn">Compra Ara !</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/ End Single Slider -->
    </section>
    <div class="product-area section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>Trending Item</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="product-info">
                        <div class="nav-main">
                            <!-- Tab Nav -->
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                @php($primeraVuelta = true)
                                @foreach($categories as $categoria)
                                    <li class="nav-item"><a class="nav-link  <?=$primeraVuelta?'active':''?>" data-toggle="tab" href="#category{{$categoria->id}}" role="tab"><?= $categoria->title ?></a></li>
                                    @php($primeraVuelta = false)
                                @endforeach

                            </ul>
                        </div>
                        <div class="tab-content" id="myTabContent">
                            @php($primeraVuelta = true)

                            @foreach($gangas as $key => $gangasByCategory)
                                <div class="tab-pane fade  <?=$primeraVuelta?'show active':''?>" id="category{{$key}}" role="tabpanel">
                                    @php($primeraVuelta = false)

                                    <div class="tab-single">
                                        <div class="row">

                                            @foreach($gangasByCategory as $ganga)

                                                <div class="col-xl-3 col-lg-4 col-md-4 col-12">
                                                    <div class="single-product">
                                                        <div class="product-img">
                                                            <a href="{{route('ganga.show',$ganga->id)}} ">
                                                                <img class="default-img" src="https://via.placeholder.com/550x750" alt="#">
                                                                <img class="hover-img" src="https://via.placeholder.com/550x750" alt="#">
                                                            </a>
                                                            <div class="button-head">
                                                                <div class="product-action">
                                                                    <a data-toggle="modal" data-target="#exampleModal" title="naa" href=""><i class=" ti-eye"></i><span>Show product</span></a>
                                                                    <a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
                                                                    <a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>
                                                                    @if(Auth::user() && Auth::user()->admin)
                                                                        <a title="edit" href="{{route('ganga.edit',$ganga->id)}}"><i class=" ti-pencil "></i><span>Edit ganga</span></a>
                                                                        <form action="{{ route('ganga.destroy', $ganga->id) }}" method="POST" class="d-inline-block">
                                                                            @method('DELETE')
                                                                            @csrf
                                                                            <button class="bi bi-trash"><i class="ti-trash"></i></button>
                                                                        </form>
                                                                    @endif
                                                                </div>
                                                                <div class="product-action-2">
                                                                    <a title="Add to cart" href="#">Add to cart</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="product-content">
                                                            <h3><a href="product-details.html"><?=$ganga->title?></a></h3>
                                                            <div class="product-price">
                                                                <?= $ganga->discount_price??'' ?>
                                                                <?= isset($ganga->price)
                                                                    ?'<span  class="text-muted text-decoration-line-through">'.$ganga->price.'</span>'
                                                                    :$ganga->price
                                                                ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
