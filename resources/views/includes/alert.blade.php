<div class="col-md-12">

    @if (Session::has('success'))
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
            <span>{{ Session::get('success') }}</span>
        </div>
    @endif

    @if (Session::has('failed'))
        <div class="alert alert-danger" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
            <strong>Oops. </strong>
            <span>{{ Session::get('failed') }}</span>
        </div>
    @endif
    
    @php
        if (Session::has('error'))
        {
            $error=array();
            $errors=Session::get('error');
            foreach ($errors as $idx=> $err)
            {
                $error[$idx]=$err;
            }
            // dd($error);
        }
    @endphp
    @if (Session::has('error'))
        <div class="alert alert-danger" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
            <strong>Oops, There some error. </strong>
            <span>
                <ul>
                    @php
                        $error=array();
                        $errors=Session::get('error');
                        foreach ($errors as $idx=> $err)
                        {
                            echo '<li>'.$err[0].'</li>';
                        }
                    @endphp  
                </ul>
            </span>
        </div>
    @endif
    <script>
        setInterval(destroyAlert, 3000);
        function destroyAlert() {
            $('.alert-dismissible').fadeOut(500)
        }
    </script>
    
</div>