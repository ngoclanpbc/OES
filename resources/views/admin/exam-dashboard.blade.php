@extends('layout/admin-layout')

@section('content')

    <h2 class="mb-4">Exams</h2>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addExamModel">
    Add Exam
    </button>

    <div class="modal fade" id="addExamModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add Exam</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="addExam">
            @csrf
                <div class="modal-body">
                    
                    <input type="text" name="exam_name" placeholder="Enter Exam Name" class="w-100" required>
                    <br><br>
                    <select name ="subject_id" required class="w-100">
                        <option value="">Select subject</option>
                        @if(count($subjects) > 0)
                            @foreach($subjects as $subject)
                                <option value="{{ $subject->id}}">{{ $subject->subject}}</option>
                            @endforeach
                        @endif
                    </select>
                    <br><br>
                    <input type="date" name="date" class="w-100" required min="@php echo date('Y-m-d'); @endphp">
                    <br><br>
                    <input type="time" name="time" class="w-100" required>

                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Add Exam</button>
                </div>
            </form>
            </div>
        
        </div>
      </div>

      <script>
        let currentId = '';
    
        // $(document).on('click', '.editButton', function($q) {
        //     $("#edit_Subject").val($(this).attr('data-subject'));
        //     $("#edit_subject_id").val($(this).attr('data-id'));
        // })
        
        // $(document).on('click', '.deleteButton', function($q) {
        //     $("#delete_subject_id").val($(this).attr('data-id'));
        // })
        $(function() {
            $("#addExam").submit(function(e){
                e.preventDefault();
                var formData = $(this).serialize();
    
                $.ajax({
                    url:"{{route('addExam')}}",
                    type:"POST",
                    data:formData,
                    success:function(data){
                        if(data.success == true)
                        {
                            location.reload();
                        }
                        else {
                            alert(data.msg);
                        }
                    }
                });
            });
            //edit subject
    
            $("#editSubject").submit(function(e){
                e.preventDefault();
                var formData = $(this).serialize();
    
                $.ajax({
                    url:"{{route('editSubject')}}",
                    type:"POST",
                    data:formData,
                    success:function(data){
                        if(data.success == true)
                        {
                            location.reload();
                        }
                        else {
                            alert(data.msg);
                        }
                    }
                });
            });
            //delete subject
        //    $(".deleteButton").click(function(){
    
        //     var subject_id = $(this).attr('data-id');
        //     $("delete_subject_id").val(subject_id);
    
        //    });
    
           $("#deleteSubject").submit(function(e){
                e.preventDefault();
                var formData = $(this).serialize();
    
                $.ajax({
                    url:"{{route('deleteSubject')}}",
                    type:"POST",
                    data:formData,
                    success:function(data){
                        if(data.success == true)
                        {
                            location.reload();
                        }
                        else {
                            alert(data.msg);
                        }
                    }
                });
            });
        });
      </script>
      

@endsection