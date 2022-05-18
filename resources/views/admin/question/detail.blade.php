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
             <p>THis is question</p>

              <div class="form-group">
                <label for="">Choice</label>
                <textarea class="form-control  @error('question') is-invalid @enderror" id="summernote"  name="question" placeholder="Question">{{isset($post) ? $post->question : old('question')}}</textarea>
                @error('question')
                    <div class="invalid-feedback">
                      {{$message}}
                    </div>
                @enderror
              </div>

              <div class="form-group">
              <label for="">Number</label>
              <select name="number" class="form-control @error('number') is-invalid @enderror" >
                <option value="">-- Number --</option>
                @for ($i = 'A'; $i <= 'E'; $i++)
                        
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

              <div class="float-right">
                <button type="submit" class="btn btn-primary"><i class="fa fa-indent"></i> Make</button>
              </div>
           </div>

            <div class="col-md-6">
              <h4><strong>Choices</strong></h4>
              <hr>
               <table class="table">
                 <tr>
                   <td width=50px>A</td>
                   <td>A</td>
                   <td width=50px><a href=""><i class="fa fa-times"></i></a></td>
                 </tr>
               </table>

             <select name="number" class="form-control @error('number') is-invalid @enderror" >
                <option value="">-- Correct Answer --</option>
                @for ($i = 'A'; $i <= 'E'; $i++)
                        
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
           
           </div>
         </div>


      </div>
    </div>
  </div>
</div>

<!-- /.card-body -->


