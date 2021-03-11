<!-- add_modal_Grade -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
   <div class="modal-content">
       <div class="modal-header">
           <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
               id="exampleModalLabel">
               اضافة بيانات عن الشركة
           </h5>
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
           </button>
       </div>
       <div class="modal-body">
           <!-- add_form -->
            <form action="{{ route('slider.store') }}" method="POST" enctype="multipart/form-data">
               @csrf
               <div class="row">
                   <div class="col">
                       <label for="Name" class="mr-sm-2">
                              وصف الشركة بالعربي
                           :</label>
                       <input id="Name" type="text" name="descreption_ar" class="form-control">
                   </div>
                   <div class="col">
                       <label for="Name_en" class="mr-sm-2">
                              وصف الشركة بالانجليزية
                        :</label>
                       <input type="text" class="form-control" name="descreption_en" required>
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
