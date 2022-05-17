<div class="row">
  <div class="col-3">
    <div class="card">
      <div class="card-body">
        <data-pack-group>
          <div class="">Name</div>
          <strong class="strong">{{$exampacks->name}}</strong>
          <hr>
        </data-pack-group>

         <data-pack-group>
          <div class="">Times</div>
          <strong class="strong">{{$exampacks->times.' Minutes'}}</strong>
          <hr>
        </data-pack-group>

         <data-pack-group>
          <div class="">Questions Amount</div>
          <strong class="strong">{{$exampacks->question_amount}} Question</strong>
          <hr>
        </data-pack-group>
        <a href="/admin/exam/exampacks/{{$exampacks->id}}/edit" class="btn btn-primary btn-block"><i class="fa fa-edit"></i> Edit</a>
      </div>
    </div>
    <a href="/admin/exam/question?exampack_id={{$exampacks->id}}" class="btn btn-info btn-block">Question</a>
  </div>
  <div class="col-9">

    <div class="card">
      <div class="card-body">
        
      </div>
    </div>

  </div>
</div>

<!-- /.card-body -->


