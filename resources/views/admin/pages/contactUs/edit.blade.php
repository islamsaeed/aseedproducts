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
               <form action="{{ route('contactUs.update',$value->id) }}" method="POST">
                @csrf

                <div class="row">

                    {{-- COUNTRY AR  --}}
                    <div class="col-sm-6" style="margin-bottom: 23px">
                        <label for="Name" class="mr-sm-6">
                              الدولة بالعربي
                            :</label>
                        <input id="Name" type="text" name="Country_ar" class="form-control" value="{{ $value->getTranslation('Country','ar') }}">
                    </div>

                    {{-- COUNTRY EN  --}}
                    <div class="col-sm-6" style="margin-bottom: 23px">
                        <label for="Name_en" class="mr-sm-6">
                               الدولة بالانجليزية
                         :</label>
                        <input type="text" class="form-control" name="Country_en" required value="{{ $value->getTranslation('Country','en') }}">
                    </div>

                    {{-- CITY AR  --}}
                    <div class="col-sm-6" style="margin-bottom: 23px">
                        <label for="Name_en" class="mr-sm-6">
                               المدينة بالعربي
                         :</label>
                        <input type="text" class="form-control" name="city_ar" required value="{{ $value->getTranslation('city','ar') }}">
                    </div>

                    {{-- CITY EN  --}}
                    <div class="col-sm-6" style="margin-bottom: 23px">
                        <label for="Name_en" class="mr-sm-6">
                               المدينة بالانجليزية
                         :</label>
                        <input type="text" class="form-control" name="city_en" required value="{{ $value->getTranslation('city','en') }}">
                    </div>



                    {{-- ADRESS AR  --}}
                    <div class="col-sm-6" style="margin-bottom: 23px">
                        <label for="Name_en" class="mr-sm-6">
                               العنوان بالعربي
                         :</label>
                        <input type="text" class="form-control" name="adress_ar" required value="{{ $value->getTranslation('adress','ar') }}">
                    </div>


                    {{-- ADRESS EN  --}}
                    <div class="col-sm-6" style="margin-bottom: 23px">
                        <label for="Name_en" class="mr-sm-6">
                               العنوان بالانجليزية
                         :</label>
                        <input type="text" class="form-control" name="adress_en" required value="{{ $value->getTranslation('adress','ar') }}">
                    </div>


                    {{--  PHONE NUMBER  --}}
                    <div class="col-sm-6" style="margin-bottom: 23px">
                        <label for="Name_en" class="mr-sm-6">
                               رقم التليفون
                         :</label>
                        <input type="text" class="form-control" name="phone_number" required value="{{ $value->phone_number }}">
                    </div>

                    {{--  MOBILE NUMBER 1 --}}
                    <div class="col-sm-6" style="margin-bottom: 23px">
                        <label for="Name_en" class="mr-sm-6">
                               رقم الجوال
                         :</label>
                        <input type="text" class="form-control" name="mobile_number1" required value="{{ $value->mobile_number1 }}">
                    </div>

                    {{--  MOBILE NUMBER 2--}}
                    <div class="col-sm-6" style="margin-bottom: 23px">
                        <label for="Name_en" class="mr-sm-6">
                              (رقم اخر اختياري) رقم الجوال
                         :</label>
                        <input type="text" class="form-control" name="mobile_number2" value="{{ $value->mobile_number1 }}">
                    </div>

                    {{--  WHATS APP  NUMBER  --}}
                    <div class="col-sm-6" style="margin-bottom: 23px">
                        <label for="Name_en" class="mr-sm-6">
                              (اختياري) رقم الواتس اب
                         :</label>
                        <input type="text" class="form-control" name="whatsApp_number" value="{{ $value-> whatsApp_number}}">
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
