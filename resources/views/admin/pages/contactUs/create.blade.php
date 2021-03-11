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
            <form action="{{ route('contactUs.store') }}" method="POST">
               @csrf
               <div class="row">

                   {{-- COUNTRY AR  --}}
                   <div class="col-sm-6" style="margin-bottom: 23px">
                       <label for="Name" class="mr-sm-6">
                             الدولة بالعربي
                           :</label>
                       <input id="Name" type="text" name="Country_ar" class="form-control">
                   </div>

                   {{-- COUNTRY EN  --}}
                   <div class="col-sm-6" style="margin-bottom: 23px">
                       <label for="Name_en" class="mr-sm-6">
                              الدولة بالانجليزية
                        :</label>
                       <input type="text" class="form-control" name="Country_en" required>
                   </div>

                   {{-- CITY AR  --}}
                   <div class="col-sm-6" style="margin-bottom: 23px">
                       <label for="Name_en" class="mr-sm-6">
                              المدينة بالعربي
                        :</label>
                       <input type="text" class="form-control" name="city_ar" required>
                   </div>

                   {{-- CITY EN  --}}
                   <div class="col-sm-6" style="margin-bottom: 23px">
                       <label for="Name_en" class="mr-sm-6">
                              المدينة بالانجليزية
                        :</label>
                       <input type="text" class="form-control" name="city_en" required>
                   </div>



                   {{-- ADRESS AR  --}}
                   <div class="col-sm-6" style="margin-bottom: 23px">
                       <label for="Name_en" class="mr-sm-6">
                              العنوان بالعربي
                        :</label>
                       <input type="text" class="form-control" name="adress_ar" required>
                   </div>


                   {{-- ADRESS EN  --}}
                   <div class="col-sm-6" style="margin-bottom: 23px">
                       <label for="Name_en" class="mr-sm-6">
                              العنوان بالانجليزية
                        :</label>
                       <input type="text" class="form-control" name="adress_en" required>
                   </div>


                   {{--  PHONE NUMBER  --}}
                   <div class="col-sm-6" style="margin-bottom: 23px">
                       <label for="Name_en" class="mr-sm-6">
                              رقم التليفون
                        :</label>
                       <input type="text" class="form-control" name="phone_number" required>
                   </div>

                   {{--  MOBILE NUMBER 1 --}}
                   <div class="col-sm-6" style="margin-bottom: 23px">
                       <label for="Name_en" class="mr-sm-6">
                              رقم الجوال
                        :</label>
                       <input type="text" class="form-control" name="mobile_number1" required>
                   </div>

                   {{--  MOBILE NUMBER 2--}}
                   <div class="col-sm-6" style="margin-bottom: 23px">
                       <label for="Name_en" class="mr-sm-6">
                             (رقم اخر اختياري) رقم الجوال
                        :</label>
                       <input type="text" class="form-control" name="mobile_number2">
                   </div>

                   {{--  WHATS APP  NUMBER  --}}
                   <div class="col-sm-6" style="margin-bottom: 23px">
                       <label for="Name_en" class="mr-sm-6">
                             (اختياري) رقم الواتس اب
                        :</label>
                       <input type="text" class="form-control" name="whatsApp_number">
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
