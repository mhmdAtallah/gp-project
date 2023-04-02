<x-layout :css="'product-page.css'" :title="$product->title">

    <div class="product ">
        <div style="background-image:url('{{ asset($product->image) }}')" class="img">

        </div>
        <div class="info">
            <h1>{{ $product->title }}</h1>
            <h3>Price : {{ $product->price }}$</h3>
            <h3>Quantity : {{ $product->quantity }}</h3>
            <p> {{ $product->description }} </p>
            <a href="/products">back</a>



            @can('admin')
                <div class="btns">

                    <form action="/product/destroy/{{ $product->id }}" method="post">
                        @csrf
                        <button class="btn btn-del" type="submit">Del</button>
                    </form>

                    <form action="/product/update/{{ $product->id }}" method="get">
                        @csrf
                        <button class="btn btn-edit" type="submit">Edit</button>
                    </form>
                </div>
            @endcan

            @auth
                <form class="cart-btn" action="/cart" method="post">
                    @csrf

                    <input type="hidden" name="product_id" id="product_id" value={{ $product->id }}>
                    <input type="hidden" name="product_name" id="product_name" value="{{ $product->title }}">

                    <input type="number" name="count" id="count" placeholder="count">
                    <br>
                    <button type="submit">add to cart </button>

                </form>
            @endauth

        </div>



    </div>



</x-layout>
