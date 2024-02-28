@extends('admin.layouts.layout')
@section('content')
<main>
    @if(!Auth::user()->hasRole('guest'))
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1>HOME</h1>
                <br>
                    <h2>Hi {{Auth::user()->name;}}!</h2>
                    <p>“Welcome {{Auth::user()->name;}}! to the team! We are beyond thrilled to have you at our office. We know how much of an asset you will be within our company, and we can’t wait to see all that you accomplish.” </p>
                    <p>Please wait till we assign you a task.</p>
            </div>
        </div>
    </div>
    @else
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                        
                </div>
            </div>           
        </div>
        <div class="container-fluid mt-5">
            <div class="row">
                <div class="col-6">
                    <div class="card d-flex rounded-0">
                        <div class="row align-items-center">
                            <div class="col-lg-8">
                                <div class=" d-flex flex-grow-1 min-width-zero">
                                    <div
                                        class="card-body align-self-center d-flex flex-column flex-lg-row justify-content-between min-width-zero">
                                        <div class="min-width-zero text-center">
                                            <p class="mb-1">Branches</p>
                                            <h1 class="mb-0" style="color: #2a75ff;">
                                            <div id="filteredBranchesCountContainer">
                                                {{ @$data['totalbranches'] }}
                                            </div>
                                        </h1>
                                            <p class="mb-1">Survey Performed </p>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <i class="simple-icon-present" style="font-size: 95px; color: #224fb5;"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-6">
                    <div class="card d-flex rounded-0">
                        <div class="row align-items-center">
                            <div class="col-lg-8">
                                <div class=" d-flex flex-grow-1 min-width-zero">
                                    <div
                                        class="card-body align-self-center d-flex flex-column flex-lg-row justify-content-between min-width-zero">
                                        <div class="min-width-zero text-center">
                                            <p class="mb-1">Branches</p>
                                            <h1 class="mb-0" style="color: rgb(42, 117, 255);">
                                            <div id="branchesWithComplaintsCountContainer">
                                                <!-- Display the branches with complaints count here -->
                                                {{@$data['branchIncident']}}
                                            </div>
                                            </h1>
                                            <p class="mb-1">Incdents Report</p>
                                            <div id="branchesWithComplaintsCountContainer">
                                                <!-- Display the branches with complaints count here -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <i class="iconsminds-shield" style="font-size: 95px; color: #224fb5;"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid mt-5">
            <div class="row">
                <div class="col-12">
                    <div class="card h-100 rounded-0">
                        <div class="card-body">
                            <h5 class="card-title">Branches Network</h5>
                            <div class="dashboard-donut-chart chart">
                                <canvas id="categoryChartNoShadow"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif      
    </main>

     <!-- Modal for displaying error message -->
     <div class="modal fade" id="errorModal" tabindex="-1" role="dialog" aria-labelledby="errorModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="errorModalLabel">Error</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="errorModalBody">
                    <!-- Error message will be inserted here -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    
@endsection
@section('graphs-data');

    
@endsection
@section('chart-script');

<!-- JavaScript to show the modal on page load if there's an error -->
<script>
        // Check if there's an error message
        @if(session('error'))
            // Display the error message in the modal
            $('#errorModalBody').text('{{ session('error') }}');
            // Show the modal
            $('#errorModal').modal('show');
        @endif
    </script>
@endsection