@extends('layouts.app')

@section('title', 'Semua Berita')

@section('content')
  <div class="w-full mb-16 bg-[#F6F6F6]">
        <h1 class="text-center font-bold text-2xl p-24">Semua Berita</h1>
      </div>

   <div class=" flex flex-col gap-5 px-4 lg:px-14">
      <div class="grid sm:grid-cols-1 gap-5 lg:grid-cols-4 mb-8">
        @foreach ($news as $item)
        <a href="{{ route('news.show', $item->slug) }}">
          <div
            class="border border-slate-200 p-3 rounded-xl hover:border-primary hover:cursor-pointer transition duration-300 ease-in-out" >
            <div class="bg-primary text-white rounded-full w-fit px-5 py-1 font-normal" style="background: linear-gradient(to right, #c4b5fd, #f9a8d4);">
              {{$item->newsCategory->title}}</div>
            <img src="{{ asset('storage/' . $item->thumbnail) }}" alt="" class="w-full rounded-xl mb-3" style="height: 200px; object-fit: cover;">
            <p class="font-bold text-base mb-1">{{ $item->title }}</p>
            <p class="text-slate-400">{{ \Carbon\Carbon::parse($item->created_at)->format('d M Y') }}</p>
          </div>
        </a>
        @endforeach
      </div>
       <div class="mt-5">
        {{ $news->links('vendor.pagination.custom') }}
      </div>
    </div>

@endsection