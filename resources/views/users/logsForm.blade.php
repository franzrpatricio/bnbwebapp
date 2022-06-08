<!-- Navbar Search-->
<div class="mb-2">
  <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0" type="get" action="{{url('admin/logs/find')}}">
    @csrf
    <div class="col md-6"><h3 class="font-weight-bold text-center">Activity Logs</h4></div>
      <div class="input-group">

        {{-- SEARCH FUNCTION --}}
        <div class="col-6 mb-3">
          <input class="form-control" name="query" type="search" placeholder="&#xf002; Search activity log here..." style="font-family:Arial, FontAwesome" aria-describedby="btnNavbarSearch" />
        </div>

        {{-- SEARCH BY INPUT TIME --}}
        <div class="col-6 mb-3">
          <input class="form-control" name="time" type="search" placeholder="&#xf002; Search by time..." style="font-family:Arial, FontAwesome" aria-describedby="btnNavbarSearch" />
        </div>

        {{-- SEARCH BY INPUT BETWEEN DATES --}}
        <div class="col-md-4">
          <label for="">Start Date</label>
          <input type="date" class="form-control" name="start_date">
        </div>
        <div class="col-md-4">
          <label for="">End Date</label>
          <input type="date" class="form-control" name="end_date">
        </div>

        {{-- SUBMIT BUTTON --}}
        <div class="col-mb-3 mt-4" style="font-family:Arial, FontAwesome">
          <button class="btn btn-outline-primary" type="submit">&#xf002; Search</button>
        </div>

        {{-- GENERATE PDF --}}
        <div class="col-mb-3 ml-2 mt-4" style="font-family:Arial, FontAwesome">
          <a href="{{ url('admin/logs/download') }}" class="btn btn-outline-info">&#xf1c1; Print</a>
        </div>
        
      </div>
  </form>
</div>