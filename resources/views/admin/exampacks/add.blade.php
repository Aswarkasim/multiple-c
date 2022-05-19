  <link rel="stylesheet" href="/plugins/summernote/summernote-bs4.min.css">
<div class="row">
  <div class="col-md-12">
    <div class="p-3  card">
      <div class="card-body">

        @if (Request::is('admin/exam/exampacks/create'))
          <form action="/admin/exam/exampacks" method="POST">  
        @else
          <form action="/admin/exam/exampacks/{{$exampacks->id}}" method="POST">  
            @method('PUT')
        @endif
          @csrf

          <div class="row">
            <div class="col-6">

            @if($errors->any())
    {!! implode('', $errors->all('<div>:message</div>')) !!}
@endif

              <div class="form-group">
                <label for="">Name</label>
                <input type="text" class="form-control  @error('name') is-invalid @enderror"  name="name"  value="{{isset($exampacks) ? $exampacks->name : old('name')}}" placeholder="Name">
                @error('name')
                    <div class="invalid-feedback">
                      {{$message}}
                    </div>
                @enderror
              </div>

              <div class="form-group">
                <label for="">Time</label>
                <input type="number" class="form-control  @error('times') is-invalid @enderror"  name="times"  value="{{isset($exampacks) ? $exampacks->times : old('times')}}" placeholder="Time : in minute. ex: 90">
                @error('times')
                    <div class="invalid-feedback">
                      {{$message}}
                    </div>
                @enderror
              </div>
              
              <div class="form-group">
                <label for="">Question Amount</label>
                <input type="number" class="form-control  @error('question_amount') is-invalid @enderror"  name="question_amount"  value="{{isset($exampacks) ? $exampacks->question_amount : old('question_amount')}}" placeholder="Ex. 100">
                @error('question_amount')
                    <div class="invalid-feedback">
                      {{$message}}
                    </div>
                @enderror
              </div>

            </div>
           
          </div>
          
          @php
              $link = '';
              if (Request::is('admin/exam/exampacks/create')){
                $link = '/admin/exam/exampacks' ;
              }else{
                $link = '/admin/exam/exampacks/'.$exampacks->id;
              }
          @endphp
          <a href="{{$link}}" class="btn btn-info "><i class="fa fa-arrow-left"></i> Kembali</a>

         <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
        
        </form>
      </div>
    </div>
  </div>
</div>

<script src="/plugins/summernote/summernote-bs4.min.js"></script>

<script>
  $(function () {
    // Summernote
    $('#summernote').summernote()

    // CodeMirror
    CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
      mode: "htmlmixed",
      theme: "monokai"
    });
  })
</script>

