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
              <input type="text" name="exam_pack_id" value="{{request('exampack_id')}}" id="">
              <div class="form-group">
              <label for="">Number</label>
              <select name="number" class="form-control @error('number') is-invalid @enderror" >
                <option value="">-- Number --</option>
                @for ($i = 1; $i <= $exampack->question_amount; $i++)
                        
                    <option value="{{$i}}"
                      <?php 
                        if(isset($question)){
                          if($question->number == $i){
                            echo 'selected';
                          }
                        }
                        ?>
                      >{{$i}}</option>
             @endfor

            </select>
            @error('number')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
            @enderror
          </div>

               <div class="form-group">
                <label for="">Question</label>
                <textarea class="form-control  @error('question') is-invalid @enderror" id="summernote"  name="question" placeholder="Question">{{isset($post) ? $post->question : old('question')}}</textarea>
                @error('question')
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
                $link = '/admin/exam/question?exampack_id='.request('exampack_id') ;
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

