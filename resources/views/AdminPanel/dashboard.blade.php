<div class="container-fluid py-2">

  <div class="row">
    <div class="ms-3">
      <h3 class="mb-0 h4 font-weight-bolder">Dashboard</h3>
    </div><br>

    <div class="ms-3">
      <h3 class="mb-0 h4 font-weight-bolder">Usres Info</h3>
      <p class="mb-4">
        Check Active Inactive Users.
      </p>
    </div>

    <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
        <div class="card-header p-2 ps-3">
          <div class="d-flex justify-content-between">
            <div>
              <p class="text-sm mb-0 text-capitalize">Active User</p>
              <h4 class="mb-0">{{ count($getUsers->where('status',  2)) }}</h4>
            </div>
            <div class="icon icon-md icon-shape bg-gradient-dark shadow-dark shadow text-center border-radius-lg">
              <i class="material-symbols-rounded opacity-10">groupperson</i>
            </div>
          </div>
        </div>
        <hr class="dark horizontal my-0">

      </div>
    </div>
    <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
        <div class="card-header p-2 ps-3">
          <div class="d-flex justify-content-between">
            <div>
              <p class="text-sm mb-0 text-capitalize">Inactive Users</p>
              <h4 class="mb-0">{{ count($getUsers->where('status', 1)) }}</h4>
            </div>
            <div class="icon icon-md icon-shape bg-gradient-dark shadow-dark shadow text-center border-radius-lg">
              <i class="material-symbols-rounded opacity-10">groupperson</i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
        <div class="card-header p-2 ps-3">
          <div class="d-flex justify-content-between">
            <div>
              <p class="text-sm mb-0 text-capitalize">Total User</p>
              <h4 class="mb-0">{{ count($getUsers) }}</h4>
            </div>
            <div class="icon icon-md icon-shape bg-gradient-dark shadow-dark shadow text-center border-radius-lg">
              <i class="material-symbols-rounded opacity-10">groupperson</i>
            </div>
          </div>
        </div>

      </div>
    </div>
    <br>
    <br>
    <div class="ms-3">
      <h3 class="mb-0 h4 font-weight-bolder">Events Info</h3>
      <p class="mb-4">
        Check Events Status.
      </p>
    </div>
    <br>
    <div class="col-xl-3 col-sm-6">
      <div class="card">
        <div class="card-header p-2 ps-3">
          <div class="d-flex justify-content-between">
            <div>
              <p class="text-sm mb-0 text-capitalize">Events Panding</p>
              <h4 class="mb-0">{{ count($getUserEvent->where('status', 1)) }}</h4>
            </div>
            <div class="icon icon-md icon-shape bg-gradient-dark shadow-dark shadow text-center border-radius-lg">
              <i class="material-symbols-rounded opacity-10">event</i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6">
      <div class="card">
        <div class="card-header p-2 ps-3">
          <div class="d-flex justify-content-between">
            <div>
              <p class="text-sm mb-0 text-capitalize">Events Apprived</p>
              <h4 class="mb-0">{{ count($getUserEvent->where('status', 2)) }}</h4>
            </div>
            <div class="icon icon-md icon-shape bg-gradient-dark shadow-dark shadow text-center border-radius-lg">
              <i class="material-symbols-rounded opacity-10">event</i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6">
      <div class="card">
        <div class="card-header p-2 ps-3">
          <div class="d-flex justify-content-between">
            <div>
              <p class="text-sm mb-0 text-capitalize">Events Rejected</p>
              <h4 class="mb-0">{{ count($getUserEvent->where('status', 3)) }}</h4>
            </div>
            <div class="icon icon-md icon-shape bg-gradient-dark shadow-dark shadow text-center border-radius-lg">
              <i class="material-symbols-rounded opacity-10">event</i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6">
      <div class="card">
        <div class="card-header p-2 ps-3">
          <div class="d-flex justify-content-between">
            <div>
              <p class="text-sm mb-0 text-capitalize">Overall Events</p>
              <h4 class="mb-0">{{ count($getUserEvent) }}</h4>
            </div>
            <div class="icon icon-md icon-shape bg-gradient-dark shadow-dark shadow text-center border-radius-lg">
              <i class="material-symbols-rounded opacity-10">event</i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <br>
    <br>
    <div class="ms-3">
      <h3 class="mb-0 h4 font-weight-bolder">Payments Info</h3>
    </div>
    <br>
    <div class="col-xl-4 col-sm-6">
      <div class="card">
        <div class="card-header p-2 ps-3">
          <div class="d-flex justify-content-between">
            <div>
              <p class="text-sm mb-0 text-capitalize">Overall Payments</p>
              <h4 class="mb-0">{{ count($paymentStatus) }}</h4>
            </div>
            <div class="icon icon-md icon-shape bg-gradient-dark shadow-dark shadow text-center border-radius-lg">
              <i class="material-symbols-rounded opacity-10">event</i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-xl-4 col-sm-6">
      <div class="card">
        <div class="card-header p-2 ps-3">
          <div class="d-flex justify-content-between">
            <div>
              <p class="text-sm mb-0 text-capitalize">Payment Panding</p>
              <h4 class="mb-0">{{ $paymentStatus->where('status', 1)->sum('amount') }}</h4>
            </div>
            <div class="icon icon-md icon-shape bg-gradient-dark shadow-dark shadow text-center border-radius-lg">
              <i class="material-symbols-rounded opacity-10">event</i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-4 col-sm-6">
      <div class="card">
        <div class="card-header p-2 ps-3">
          <div class="d-flex justify-content-between">
            <div>
              <p class="text-sm mb-0 text-capitalize">Payment Approved</p>
              <h4 class="mb-0">{{ $paymentStatus->where('status', 2)->sum('amount') }}</h4>
            </div>
            <div class="icon icon-md icon-shape bg-gradient-dark shadow-dark shadow text-center border-radius-lg">
              <i class="material-symbols-rounded opacity-10">event</i>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    
  </div>
</div>