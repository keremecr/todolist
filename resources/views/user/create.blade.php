<x-app-layout>
  <x-slot name="header">Aktivite Oluştur</x-slot>
  @if($errors->any())
    <div class="alert alert-danger">
      @foreach($errors->all() as $error)
        <li>{{$error}}</li>
      @endforeach
    </div>
  @endif
  <div class="card">
    <div class="card-body">
        <form method="POST" action=" {{route('myactivities.store')}} ">
          @csrf
          <div class="form-group">
            <label>Activite Başlığı</label>
            <input type="text" class="form-control" name="title" value="{{old('title')}}">
          </div>
          <div class="form-group">
            <label>Activite Açıklaması</label>
            <textarea class="form-control" rows="4" name="description">
              {{old('description')}}
            </textarea>
          </div>

          <div class="form-group">
            <label>Başlangıç Tarihi</label>
            <input type="datetime-local" class="form-control" name="started_at" value="{{old('started_at')}}">
          </div>
          <div class="form-group">
            <input id="isFinished" type="checkbox">
            <label>Bitiş Tarihi Olacak mı?</label>
          </div>

          <div id="finishinput" style="display: none" class="form-group">
            <label>Bitiş Tarihi</label>
            <input type="datetime-local" class="form-control" name="finished_at" value="{{old('finished_at')}}">
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-success btn-sm btn-block">Aktiviteyi Kaydet</button>
          </div>

    </div>
  </div>


</x-app-layout>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
  $('#isFinished').change(function(){
    if($('#isFinished').is(':checked')){
      $('#finishinput').show();
    }else{
      $('#finishinput').hide();
    }
  })
</script>
