<div class="row">
    <div class="col-md-12">
        @if (session('sucess'))
            <div class="alert alert-success">
                <div class="alert-text">{{session('sucess')}}</div>
                
                <div class="alert-close">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true"><i class="ki ki-close"></i></span>
                    </button>
                </div>
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                <div class="alert-text">{{session('error')}}</div>
                
                <div class="alert-close">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true"><i class="ki ki-close"></i></span>
                    </button>
                </div>
            </div>
        @endif
    </div>
</div>