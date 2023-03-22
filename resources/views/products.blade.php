<x-layout :css="'products.css'" :title="'Watch|Products'">

    <div class="container ">

        <h1>Products </h1>
        {{-- @dd($products) --}}

        <a href="/products/create">Add product</a>


        <div class="products">

            @foreach ($products as $product)
                <x-product :product="$product"></x-product>
            @endforeach



        </div>
        {{ $products->links() }}
    </div>

</x-layout>
