<x-app-layout>
  <x-slot name="header">Aktivite Güncelle</x-slot>
  <div class="card">
    <div class="card-body">
        <form method="POST" action=" {{route('myactivities.update',$activity->id)}} ">
          @method('PUT')
          @csrf
          <div class="form-group">
            <label>Activite Başlığı</label>
            <input type="text" class="form-control" name="title" value="{{ $activity->title }}">
          </div>
          <div class="form-group">
            <label>Activite Açıklaması</label>
            <textarea class="form-control" rows="4" name="description">{{ $activity->description }}</textarea>
          </div>


          <div class="form-group">
            <label>Başlangıç Tarihi</label>
            <input type="datetime-local" class="form-control" name="started_at" value="{{$activity->started_at}}">
          </div>
          <div class="form-group">
            <input id="isFinished" @if($activity->finished_at)) checked @endif type="checkbox">
            <label>Bitiş Tarihi Olacak mı?</label>
          </div>
          <div class="form-group">
            <label>Bitiş Tarihi</label>
            <input type="datetime-local" class="form-control" name="finished_at" value="{{$activity->finished_at}}">
          </div>

          <div class="form-group">
            <label>Tamamlanma Durumu</label><br>
            <select name="status">
              <option @if($activity->status=="completed") selected @endif value="completed">Tamamlandı</option>
              <option @if($activity->status=="notcompleted") selected @endif value="notcompleted">Tamamlanmadı</option>
            </select>
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-success btn-sm btn-block">Aktiviteyi Güncelle</button>
          </div>
        </form>
    </div>
  </div>
</x-app-layout>
<script>
      const cb = document.querySelector('#iscompleted');
      console.log(cb.checked); // false
</script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
