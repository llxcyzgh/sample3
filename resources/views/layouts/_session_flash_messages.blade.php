{{-- 引入闪存信息 --}}
@foreach(['success','danger','info','warning'] as $msg)
    @if(session()->has($msg))
        <div>
            <p class="alert alert-{{ $msg }}">{{ session()->get($msg) }}</p>
        </div>
    @endif
@endforeach