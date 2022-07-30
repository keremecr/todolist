<x-app-layout>
  <x-slot name="header">Yapılacak Aktivitelerim</x-slot>
  <div class="card">
    <div class="card-body">
      <h5 class="card-title float-right">
        <a href="{{route('myactivities.create')}}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Aktivite OLuştur</a>
      </h5>
      <form method="GET" action="">
        <div class="form-row">
          <div class="col-md-2">
            <input type="text" name="title" value="{{request()->get('title')}}"  placeholder="Aktivite Adı" class="form-control">
          </div>
          <div class="col-md-2">
            <select class="form-control" onchange="this.form.submit()" name="status">
              <option value="">Durum Seçiniz</option>
              <option @if(request()->get('status')=='completed') selected @endif value="completed">Tamamlandı</option>
              <option @if(request()->get('status')=='notcompleted') selected @endif value="notcompleted">Tamamlanmadı</option>
            </select>
          </div>

          @if(request()->get('title') || request()->get('status'))
           <div class="col-md-2">
             <a href="{{route('myactivities.index')}}" class="btn btn-secondary">Sıfırla</a>
           </div>
          @endif

        </div>
      </form>

      <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">Aktivite Adı</th>
            <th scope="col">Durum</th>
            <th scope="col">Bitiş Tarihi</th>
            <th scope="col">İşlemler</th>
          </tr>
        </thead>
        <tbody>
          @foreach($activity as $activite)
          <tr>
            <td>{{ $activite->title}}</td>
            <td>{{$activite->status}}</td>
            <td>{{$activite->finished_at}}</td>
            <td>
              <a href="{{route('myactivities.edit',$activite->id)}}" class="btn btn-sm btn-primary">Güncelle</a>
              <a href="{{route('myactivities.destroy',$activite->id)}}" class="btn btn-sm btn-danger">Sil</a>
            </td>
          </tr>
          <tr>
          @endforeach
          </tr>
          <tr>

        </tbody>
      </table>

    </div>
  </div>



</x-app-layout>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
