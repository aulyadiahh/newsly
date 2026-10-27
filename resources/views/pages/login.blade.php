@extends('layouts.app')

@section('title', 'Masuk | Newsly')

@section('content')
<div class="flex justify-center items-center" style="min-height: calc(100vh - 182px);">
    <div class="w-full max-w-md p-8 bg-white rounded-2xl shadow-lg border border-slate-200">
        <h1 class="text-3xl font-bold text-center mb-6">Masuk</h1>

        <form>
            <div class="mb-4">
                <label class="block mb-2">Email</label>
                <input type="email" class="w-full border border-slate-300 rounded-lg p-3">
            </div>

            <div class="mb-6">
                <label class="block mb-2">Password</label>
                <input type="password" class="w-full border border-slate-300 rounded-lg p-3">
            </div>

            <button type="submit"
                class="w-full text-white font-semibold py-3 rounded-xl"
                style="background: linear-gradient(to right, #c4b5fd, #f9a8d4);">
                Sign In
            </button>
        </form>
    </div>
</div>
@endsection