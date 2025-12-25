@extends('admin.maindesing')

@section('dashbosrd')
 <div class="container-fluid">
    <div class="row">
        
        <div class="col-md-3 col-sm-6">
            <div class="statistic-block block">
                <div class="progress-details d-flex align-items-end justify-content-between">
                    <div class="title">
                        <div class="icon"><i class="icon-user-1"></i></div>
                        <strong>New Coustomer</strong>
                    </div>
                    <div class="number dashtext-1">{{ $newClients }}</div>
                </div>
                <div class="progress progress-template">
                    <div role="progressbar" style="width: {{ ($newClients / 100) * 100 }}%" aria-valuenow="30" aria-valuemin="0"
                        aria-valuemax="100" class="progress-bar progress-bar-template dashbg-1"></div>
                </div>
            </div>
        </div>

        
        <div class="col-md-3 col-sm-6">
            <div class="statistic-block block">
                <div class="progress-details d-flex align-items-end justify-content-between">
                    <div class="title">
                        <div class="icon"><i class="icon-padnote"></i></div>
                        <strong>Total Products</strong>
                    </div>
                    <div class="number dashtext-3">{{ $totalProducts }}</div>
                </div>
                <div class="progress progress-template">
                    <div role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0"
                        aria-valuemax="100" class="progress-bar progress-bar-template dashbg-3"></div>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6">
            <div class="statistic-block block">
                <div class="progress-details d-flex align-items-end justify-content-between">
                    <div class="title">
                        <div class="icon"><i class="icon-writing-whiteboard"></i></div>
                        <strong>All Category</strong>
                    </div>
                    <div class="number dashtext-4">{{ $totalCategories }}</div>
                </div>
                <div class="progress progress-template">
                    <div role="progressbar" style="width: 35%" aria-valuenow="35" aria-valuemin="0"
                        aria-valuemax="100" class="progress-bar progress-bar-template dashbg-4"></div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection