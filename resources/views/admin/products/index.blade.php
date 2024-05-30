<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Products') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden p-10 shadow-sm sm:rounded-lg flex flex-col gap-y-5">

                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul> 
                            @foreach($errors->all() as $error)
                                <li class="py-4 bg-red-500 text-white font-bold">
                                    {{$error}}
                                </li>
                            @endforeach
                        </ul>           
                    </div>
                @endif

                <div class="flex flex-row justify-between items-center mb-5">
                    <h3 class="text-indigo-950 font-bold text-2xl">My Products</h3>
                    <a href="{{route('admin.products.create')}}" class="rounded-full w-fit py-3 px-5 bg-indigo-950 text-white">
                        Add New Product
                    </a>
                </div>
                @forelse($products as $product)                
                    <div class="item-product flex flex-row justify-between items-center">
                        <div class="flex flex-row items-center gap-x-5">
                            <img src="{{Storage::url($product->cover)}}" class="rounded-2xl h-[100px] w-auto" alt="">
                            <div>
                                <h3 class="text-indigo-950 font-bold text-l">{{$product->name}}</h3>
                                <p class="text-slate-500 font-bold text-sm">{{$product->category->name}}</p>
                            </div>
                        </div>
                        <div>
                            <p>Rp. {{number_format($product->price)}}</p>
                        </div>
                        <div class="flex flex-row gap-x-3">
                            <a href="{{route('admin.products.edit', $product)}}" class="rounded-full font-bold py-3 px-5 bg-indigo-500 text-white">
                                Edit
                            </a>
                            <form action="{{route('admin.products.destroy', $product)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="rounded-full py-3 px-5 bg-red-500 text-white">
                                    Delete
                                </button>
                            </form>                            
                        </div>
                    </div>
                @empty
                    <p>Belum ada produk tersedia</p>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>
