<div class="row">
  <div class="col-md-12">
    <div class="p-2 card">
      <div class="card-body">
        
         <a href="" class="btn btn-info "><i class="fa fa-arrow-left"></i> Back</a>
         <a href="" class="btn btn-primary "><i class="fa fa-save"></i> Save & completed</a>
         <a href="" class="btn btn-warning "><i class="fa fa-spinner"></i> As Draft</a>
         <br>

         <div class="row mt-4">
           <div class="col-md-6">
             <h4><strong>Question</strong></h4>
             <hr>
             <p>{{$question->question}}</p>

             <form action="/admin/exam/choice/create" method="POST">
              @method('PUT') 
              @csrf
              <input type="hidden" name="question_id" value="{{$question->id}}">
                <div class="form-group">
                  <label for="">Choice</label>
                  <textarea class="form-control  @error('content') is-invalid @enderror" id="summernote"  name="content" placeholder="Choice">{{isset($post) ? $post->content : old('content')}}</textarea>
                  @error('content')
                      <div class="invalid-feedback">
                        {{$message}}
                      </div>
                  @enderror
                </div>

                <div class="form-group">
                <label for="">Anotation</label>
                <select  name="anotation" class="form-control @error('anotation') is-invalid @enderror" >
                  <option value="">-- Anotation --</option>
                  @for ($i = 'A'; $i <= 'E'; $i++)
                      @foreach ($question->choices as $item)
                        @if ($item->anotation != $i)
                        <option value="{{$i}}">{{$i}}</option>
                        @endif
                      @endforeach
                    @endfor

                    </select>
                    @error('anotation')
                        <div class="invalid-feedback">
                          {{$message}}
                        </div>
                    @enderror
                </div>

                <div class="float-right">
                  <button type="submit" class="btn btn-primary"><i class="fa fa-indent"></i> Make</button>
                </div>
              </div>
           </form>

            <div class="col-md-6">
              <h4><strong>Choices</strong></h4>
              <hr>
               <table class="table">
                 @foreach ($question->choices as $item)
                 <tr>
                   <td width=50px>{{$item->anotation}}</td>
                   <td>{{$item->content}}</td>
                   <td width=50px><a href=""><i class="fa fa-times"></i></a></td>
                  </tr>
                  @endforeach
               </table>

             <select name="number" class="form-control @error('number') is-invalid @enderror" >
                <option value="">-- Correct Answer --</option>
                @for ($i = 'A'; $i <= 'E'; $i++)
                      <option value="{{$i}}">{{$i}}</option>
                  @endfor

                  </select>
                  @error('number')
                      <div class="invalid-feedback">
                        {{$message}}
                      </div>
                  @enderror
              </div>
           
           </div>
         </div>


      </div>
    </div>
  </div>
</div>

<!-- /.card-body -->


