@if ($message = Session::get('success'))
        <div style="position: absolute;z-index:93;max-width:280px;top:0;right:0; margin:100px 12px 0 0  ;">
            <div class="alert alert-success alert-block animate alert-dismissible fade show shadow"  role="alert" aria-live="polite" aria-atomic="true" data-delay="3000" data-autohide="true" data-animate="fadeInUp" role="alert">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
        </div>
        {{-- <div class="alert alert-warning alert-block animate alert-dismissible fade show" data-animate="fadeInUp" role="alert">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div> --}}
@endif


@if ($message = Session::get('error'))
        <div style="position: absolute;z-index:93;max-width:280px;top:0;right:0; margin:100px 12px 0 0  ;">
        <div class="alert alert-danger alert-block animate alert-dismissible fade show shadow"  role="alert" aria-live="polite" aria-atomic="true" data-delay="3000" data-autohide="true" data-animate="fadeInUp" role="alert">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
        </div>
@endif


@if ($errors->any())
<div style="position: absolute;z-index:93;max-width:280px;top:0;right:0; margin:100px 12px 0 0  ;">
<div class="alert alert-danger alert-block animate alert-dismissible fade show shadow"  role="alert" aria-live="polite" aria-atomic="true" data-delay="3000" data-autohide="true" data-animate="fadeInUp" role="alert">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <ul>
                @foreach ($errors->all() as $error)
                    <li><strong>{{ $error }}</strong></li>
                @endforeach
            </ul>
        </div>
</div>
@endif
