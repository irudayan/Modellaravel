@extends('layouts.admin')

@section('content')

<style>
  .mandatory{
    color: red;
  }
  label.error {
    color: red;
    font-weight: bold;
  }
  
  </style>

<section class="content">
  <head>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css"> 
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.3/dist/sweetalert2.min.css">
  <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<h1>

</h1>
    <div class="container-fluid">
      <div class="row">

        {{-- main section --}}
        <div class="col-md-6">
          <div class="card card-primary">
            <div class="card-header">
             <h5>Main section
              <button  type="button" id="section" class="btn btn-success float-right"  data-toggle="modal" data-target="#exampleModal" >Add</button>
             </h5>
              
            </div>
                <table class="table table-bordered data-table">
                    <thead>
                        <tr>
                            <th>Main section</th>
                            <th>description</th>
                            <th width="100px">Action</th>
                        </tr>
                    </thead>
                    <tbody id="maincontent">   
              </tbody>
                   
                </table>
          </div>
        </div>
 


    {{-- Sub section--}}
    
    <div class="col-md-6">
      <div class="card card-primary">
        <div class="card-header">
         <h5>Sub section
          <button  type="button" id="subsection" class="btn btn-success float-right"  data-toggle="modal" data-target="#subModal" >Add</button>
         </h5>
          
        </div>
            <table class="table table-bordered subsection-table">
                <thead>
                    <tr>
                      <th>Mainsection</th>
                        <th width="8px">Subsection</th>
                        <th>description</th>
                        <th >Action</th>
                    </tr>
                </thead>
                <tbody id="subcontent">   
          </tbody>
               
            </table>
      </div>
    </div>


  {{-- main model --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Main Section</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="section-validation-form" name="section-validation-form">
             @csrf
            <input type="hidden" name="section_id" id="section_id">
            <div class="form-group">
              <label for="section-name" class="col-form-label">Section Name:<span class="mandatory">*</span></label>
              <input type="text" name="name" class="form-control" id="name">
            </div>
            <div class="form-group">
              <label for="description" name="description" class="col-form-label">Description:<span class="mandatory">*</span></label>
              <textarea class="form-control" name="description" id="description"></textarea>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" id="main-section-close" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" id="saveBtn">Add</button>
        </div>
      </div>
    </div>
  </div>


  {{-- sub section model --}}
  <div class="modal fade" id="subModal" tabindex="-1" role="dialog" aria-labelledby="subModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
   <div class="modal-content">
     <div class="modal-header">
       <h5 class="modal-title" id="subModalLabel">Sub Section</h5>
       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
         <span aria-hidden="true">&times;</span>
       </button>
     </div>
     <div class="modal-body">
       <form id="subsection-validation" name="subsection-validation">
          @csrf
         <input type="hidden" name="subsection_id" id="subsection_id">
       
         <div class="form-group">
          <label for="submain-section" class="form-label">Main Section <span class="mandatory">*</span></label>
          <select class="form-control" name="section_id" id="sub-main-sectionname">
            <option>Select Main Section</option>
            @foreach($selectsection as $item)
            <option value="{{$item->id}}">{{ $item->name }}</option> 
            @endforeach
          </select>
        </div>

         <div class="form-group">
           <label for="subsection-name" class="col-form-label">Subsection Name:<span class="mandatory">*</span></label>
           <input type="text" name="subsectionname" class="form-control" id="subsectionname">
         </div>
         <div class="form-group">
           <label for="description" name="subdescription" class="col-form-label">Description:<span class="mandatory">*</span></label>
           <textarea class="form-control" name="subdescription" id="subdescription"></textarea>
         </div>
       </form>
     </div>
     <div class="modal-footer">
       <button type="button" class="btn btn-secondary" id="sub-section-close" data-dismiss="modal">Close</button>
       <button type="button" class="btn btn-primary" id="subsaveBtn">Add</button>
     </div>
   </div>
 </div>
</div>
</div>
</div>
</section>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.3/dist/sweetalert2.min.js"></script>
<script src="jquery.validate.js"></script>


<script type="text/javascript">

$(function (){

  $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
    });


// table show

  var maintable = $('.data-table').DataTable({
    processing: true,
    serverSide: true,
      ajax: "{{ route('mainsection') }}",
      columns: [
          {data: 'name'},
          {data: 'description'},
          {data: 'action', orderable: false, searchable: false},
      ]
  });


  $('#section').click(function () {
        $('#saveBtn').val(" ");
        $('#section_id').val('');
        $('#section-validation-form').trigger("reset");
        $('#exampleModal').modal('hide');
    });


// save
    $(function() {
  // Initialize the validation plugin
  $("#section-validation-form").validate({
    rules: {
      name: {
        required: true,
      },
      description: {
        required: true,
      },
    },
    messages: {
      name: {
        required: "Please enter your name.",
      },
      description: {
        required: "Please enter your description.",
      },
    },
    errorClass: "error",
    submitHandler: function(form) {
      // form submission
      var formData = $(form).serialize();
      $.ajax({
        url: "{{ url('sectionstore') }}",
        type: "POST",
        data: formData,
        dataType: 'json',
        success: function(data) {
          if (data.status === 'success'){
            // success response
            $(form).trigger("reset");
            $('#exampleModal').modal('hide');
            Swal.fire({
              title: 'success',
              text: 'Submitted successfully!',
              icon: 'success',
              confirmButtonText: 'OK'
            }).then((result) => {
                if (result.isConfirmed) {
                  $('#main-section-close').click();
                  maintable.draw();
                }
            });
          }else if (data.status) {
            $(form).trigger("reset");
            $('#exampleModal').modal('hide');
            Swal.fire({
              title: 'Error',
              text: 'Name already exists!',
              icon: 'error',
              confirmButtonText: 'OK'
            }).then((result) => {
              if (result.isConfirmed) {
                $('#main-section-close').click();
                maintable.draw();
              }
            });
          }
        },
        error: function(xhr, status, error) {
          // Handle the error response
          console.log(xhr.responseText);
        }
      });
    }
  });

 
  // button click
  $('#saveBtn').click(function(e) {
    e.preventDefault();
    $('#section-validation-form').submit();
  });
});


// edit
$('body').on('click', '.editSection', function () {
      var section_id = $(this).data('id');
      $.get("{{ url('sectionedit') }}" +'/' + section_id +'/edit', function (data) {
          $('#saveBtn').val(" ");
          $('#exampleModal').modal('show');
          $('#section_id').val(data.id);
          $('#name').val(data.name).prop('disabled',true);
          $('#description').val(data.description);
      })
    });

    // delete
$('body').on('click', '.deleteSection', function () {
    var section_id = $(this).data("id");
    confirm("Are you sure you want to delete!");

    $.ajax({
        type: "DELETE",
        url: "{{ url('sectiondelete') }}"+'/'+section_id,
        success: function (data) {
            if (data.status === 'success') {
                $('#exampleModal').modal('hide');
                Swal.fire({
                    title: 'Confirm',
                    text: 'Are you sure you want to delete?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Delete',
                    cancelButtonText: 'Cancel'
                }).then((result) => {
                    if (result.isConfirmed) {
                        maintable.draw();
                    }
                });
            } else if (data.status === 'failed') {
                $('#exampleModal').modal('hide');
                Swal.fire({
                    title: 'Mainsection is there',
                    text: 'Sub section are exist do not delete the main section!',
                    icon: 'error',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.isConfirmed) {
                        maintable.draw();
                    }
                });
            }
        }
    });
});


// subsection


    //   var subtable = $('.subsection-table').DataTable({
    //     processing: true,
    //     serverSide: true,
    //     ajax: {
    //     url: "{{ route('subsection') }}",
    //     dataSrc: function(response) {
    //         // Access the name value from the response
    //         console.log(response.name);
    //         return response.data;
    //     }
    // },
    // columns:
    //     [
    //       {data: 'name'},
    //       {data: 'subsectionname'},
    //       {data: 'subdescription'},
    //       {data: 'action', orderable: false, searchable: false},
    //     ]
    //   });

    var subtable = $('.subsection-table').DataTable({
    processing: true,
    serverSide: true,
    ajax: {
        url: "{{ route('subsection') }}",
        dataSrc: function(response) {
            // Access the name value from the response
            console.log(response.name);
            return response.data;
        }
    },
    columns: [
        {data: 'name'},
        {data: 'subsectionname'},
        {data: 'subdescription'},
        {data: 'action', orderable: false, searchable: false},
    ]
});


      // when click 
      $('#subsection').click(function () {
              $('#subsaveBtn').val(" ");
              $('#subsection_id').val('');
              $('#subsection-validation').trigger("reset");
              $('#subModal').modal('hide');
          });

      // save
      $('#subsaveBtn').click(function (e) {
        e.preventDefault();
        $.ajax({
          data: $('#subsection-validation').serialize(),
          url: "{{ url('subsectionstore') }}",
          type: "POST",
          tocken:"CSRF",
          dataType: 'json',
          success: function (data) {
            console.log(data);
            $('#subsection-validation').trigger("reset");
            $('#subModal').modal('hide');
            Swal.fire({
            title: 'Success',
            text: 'submitted successfully!',
            icon: 'success',
            confirmButtonText: 'OK'
          }).then((result) => {
            if (result.isConfirmed) {
              $('#sub-section-close').click();
             subtable.draw();
              
            }
          });

          }
        });
      });



          // edit
      $('body').on('click', '.editsubSection', function () {
        var subsection_id = $(this).data('id');
   
            $.get("{{ url('subsectionedit') }}" +'/' + subsection_id +'/edit', function (data) {
                $('#subsaveBtn').val(" ");
                $('#subModal').modal('show');
                $('#sub-main-sectionname option[value='+data.section_id+']').attr('selected','selected');
                $('#subsectionname').val(data.subsectionname);
                $('#subdescription').val(data.subdescription);
            })
          });

          // delete
          $('body').on('click', '.deletesubSection', function () {
          
          var subsection_id = $(this).data("id");
          confirm("Are You sure want to delete !");
          $.ajax({
              type: "DELETE",
              url: "{{ url('subsectiondelete') }}"+'/'+subsection_id,
              success: function (data){
            console.log(data);
            $('#subsection-validation').trigger("reset");
            $('#subModal').modal('hide');
            Swal.fire({
            title: 'Success',
            text: 'Deleted successfully!',
            icon: 'Delete',
            confirmButtonText: 'Delete'
          }).then((result) => {
            if (result.isConfirmed) {
            subtable.draw();
            }
          });

          }
          });
      });

  
  });

</script>

@endsection