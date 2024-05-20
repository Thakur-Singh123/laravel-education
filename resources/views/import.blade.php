
<style>
.notification-green {
color: green;
padding: 1.5px;
}
.notification-red {
color:red;
padding: 1.5px;
}
</style>
@if (Session::has('success')) 
      <div class="notification-green">
         <p>{{ Session::get('success') }}</p>
      </div>
      @endif 
      @if (Session::has('unsuccess')) 
      <div class="notification-red">
         <p>{{ Session::get('unsuccess') }}</p>
      </div>
      @endif 
<form action="{{ route('import.users') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="file" name="file" accept=".csv, application/vnd.ms-excel, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet">
    <button type="submit">Import Users</button>
</form>
