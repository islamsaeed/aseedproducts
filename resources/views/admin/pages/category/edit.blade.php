<!-- edit_modal_Grade -->
<div class="modal fade" id="edit{{ $value->id }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
       <div class="modal-content">
           <div class="modal-header">
               <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                   id="exampleModalLabel">
                   تعديل القسم {{ $value->getTranslation('name','ar') }}
               </h5>
               <button type="button" class="close" data-dismiss="modal"
                       aria-label="Close">
                   <span aria-hidden="true">&times;</span>
               </button>
           </div>
           <div class="modal-body">
               <!-- Edit_Form -->
               <form action="{{ route('category.update',$value->id) }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col">
                        <label for="Name" class="mr-sm-2">
                               اسم القسم بالعربي
                            :</label>
                        <input id="Name" type="text" name="name_ar" class="form-control" value="{{ $value->getTranslation('name','ar')  }}">
                    </div>
                    <div class="col">
                        <label for="Name_en" class="mr-sm-2">
                         اسم القسم بالانجليزية
                         :</label>
                        <input type="text" class="form-control" name="name_en" required value="{{ $value->getTranslation('name','en')  }}">
                    </div>
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
