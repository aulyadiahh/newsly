@if ($paginator->hasPages())
    <div class="pagination">

        {{-- Tombol sebelumnya --}}
        @if ($paginator->onFirstPage())
            <span class="disabled">&lt;</span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}">&lt;</a>
        @endif

        {{-- Nomor halaman --}}
        @foreach ($elements as $element)
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <span class="active">{{ $page }}</span>
                    @else
                        <a href="{{ $url }}">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Tombol berikutnya --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}">&gt;</a>
        @else
            <span class="disabled">&gt;</span>
        @endif

    </div>

    <style>
        .pagination {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 6px;
        }

        .pagination a,
        .pagination span {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 32px;
            height: 32px;
            padding: 0 8px;
            border: 1px solid #d1d5db;
            border-radius: 6px;
            background: #fff;
            color: #333;
            font-size: 14px;
            text-decoration: none;
            box-sizing: border-box;
        }

        .pagination .active {
             background: #d946ef;
             color: #fff;
             border-color: #d946ef;
             box-shadow: 0 3px 10px rgba(217, 70, 239, 0.35);
        }

        .pagination a:hover {
             background: #e879f9;
             color: #fff;
             border-color: #e879f9;
        }

        .pagination .disabled {
            color: #cbd5e1;
            cursor: not-allowed;
        }
    </style>
@endif