
<div class="panel panel-default">
  <div class="panel-heading">Ranking de Kills - Pk</div>
  <div class="panel-body">

    <table class="table">
        <thead>
          <tr>
            <th>#</th>
            <th>Nick</th>
            <th>Guild</th>
            <th>Kills</th>
          </tr>
        </thead>
        @foreach ($dates as $char)
        <tbody>
          <tr>
            <th scope="row">{{$id}}</th>
            <td>{{$char->Name}}</td>
            <td>Sem Guild</td>
            <td><span class="badge">{{$char->PkCount}}</span></td>
          </tr>
        </tbody>
        <?php $id++; ?>
        @endforeach

      </table> 

  </div>
</div>
