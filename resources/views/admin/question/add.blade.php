  <link rel="stylesheet" href="/plugins/summernote/summernote-bs4.min.css">
<div class="row">
  <div class="col-md-12">
    <div class="p-3  card">
      <div class="card-body">

        @if (Request::is('admin/exam/question/create'))
          <form action="/admin/exam/question" method="POST" enctype="multipart/form-data">  
        @else
          <form action="/admin/exam/question/{{$question->id}}" method="POST">  
            @method('PUT')
        @endif
          @csrf

          <div class="row">
            <div class="col-6">

              <div class="form-group">
                <label for="">Number</label>
                <input type="text" class="form-control  @error('name') is-invalid @enderror"  name="name"  value="{{isset($question) ? $question->name : old('name')}}" placeholder="Number">
                @error('name')
                    <div class="invalid-feedback">
                      {{$message}}
                    </div>
                @enderror
              </div>

              <div class="form-group">
                <label for="">Time</label>
                <input type="number" class="form-control  @error('times') is-invalid @enderror"  name="times"  value="{{isset($question) ? $question->times : old('times')}}" placeholder="Time : in minute. ex: 90">
                @error('times')
                    <div class="invalid-feedback">
                      {{$message}}
                    </div>
                @enderror
              </div>
              
              <div class="form-group">
                <label for="">Question Amount</label>
                <input type="number" class="form-control  @error('question_amount') is-invalid @enderror"  name="question_amount"  value="{{isset($question) ? $question->question_amount : old('question_amount')}}" placeholder="Ex. 100">
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
              if (Request::is('admin/exam/question/create')){
                $link = '/admin/exam/question' ;
              }else{
                $link = '/admin/exam/question/'.$question->id;
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

