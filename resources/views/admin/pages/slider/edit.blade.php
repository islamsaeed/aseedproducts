  <!-- edit_modal_Grade -->
  <div class="modal fade" id="edit{{ $value->id }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
       <div class="modal-content">
           <div class="modal-header">
               <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                   id="exampleModalLabel">
                   {{ trans('Grades_trans.edit_Grade') }}
               </h5>
               <button type="button" class="close" data-dismiss="modal"
                       aria-label="Close">
                   <span aria-hidden="true">&times;</span>
               </button>
           </div>
           <div class="modal-body">
               <!-- Edit_Form -->
               <form action="{{ route('slider.update',$value->id) }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="text-center">
                    <img src="{{ asset('assets/images/'. $value->logo) }}" alt="" style="height: 100px; width:100px">
                </div><br><br>

                <div class="row">
                    <div class="col">
                        <label for="Name" class="mr-sm-2">
                               وصف الشركة بالعربي
                            :</label>
                        <input id="Name" type="text" name="descreption_ar" class="form-control" value="{{ $value->getTranslation('descreption','ar') }}">
                    </div>
                    <div class="col">
                        <label for="Name_en" class="mr-sm-2">
                               وصف الشركة بالانجليزية
                         :</label>
                        <input type="text" class="form-control" name="descreption_en" required value="{{ $value->getTranslation('descreption','en') }}">
                    </div>
                </div>
                <div class="form-group">
                    <label for=""> اضافة صورة</label>
                    <input type="file" name="logo" class="form-control">
                </div>
                <br><br>
                 </div>
                     <div class="modal-footer">
                         <button type="button" class="btn btn-secondary"
                                 data-dismiss="modal">{{ trans('Grades_trans.Close') }}</button>
                         <button type="submit"
                                 class="btn btn-success">{{ trans('Grades_trans.submit') }}</button>
                     </div>
             </form>

           </div>
       </div>
   </div>
</div>
