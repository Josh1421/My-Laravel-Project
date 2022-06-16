<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
  <title>Add List</title>
</head>
<body>
  <div class="container">
    <br/>
    <h3 align="center">PHP - Sending multiple forms data through jquery Ajax</h3>
    <br><br> 
    <div id="">
      <div class="row">
        <div class="col-md-4">
          <div class="form-group">
            <label class="form-label">Enter First Name</label>
            <input type="text" name="first_name" id="first_name" class="form-control" />
            <span id="error_first_name" class="text-danger"></span>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label class="form-label">Enter Middle Name</label>
            <input type="text" name="middle_name" id="middle_name" class="form-control" />
            <span id="error_middle_name" class="text-danger"></span>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label class="form-label">Enter Last Name</label>
            <input type="text" name="last_name" id="last_name" class="form-control" />
            <span id="error_last_name" class="text-danger"></span>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <div class="form-group">
            <label class="form-label">Enter Age</label>
            <input type="text" name="age" id="age" class="form-control" />
            <span id="error_age" class="text-danger"></span>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label class="form-label">Enter Relationship</label>
            <input type="text" name="relationship" id="relationship" class="form-control" />
            <span id="error_relationship" class="text-danger"></span>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label class="form-label">Enter Number</label>
            <input type="text" name="number" id="number" class="form-control" />
            <span id="error_number" class="text-danger"></span>
          </div>
        </div>
      </div>
      <div class="form-group my-2" align="right">
        <input type="hidden" name="row_id" id="hidden_row_id" />
        <button type="button" name="save" id="save" class="btn btn-success btn-xs">Add</button>
      </div>
    </div>
    <form action="" method="POST" id="user_form">
      @csrf
      <div class="table-responsive">
        <table class="table table-striped table-bordered" id="user_data">
          <tr>
            <th>First Name</th>
            <th>Middle Name</th>
            <th>Last Name</th>
            <th>Age</th>
            <th>Relationship</th>
            <th>Number</th>
            <th>Remove</th>
          </tr>
        </table>
      </div>
      <div class="" align="right">
        <b class="me-5 total">Total: 0</b>
      </div>
      <div align="center">
        <input type="submit" name="insert" id="insert" class="btn btn-primary" value="Insert">
      </div>
    </form>
    <br>
  </div>
  
  <div id="action_alert" title="Action">

  </div>
</body>
<script>
  $(document).ready(function(){

    var count = 0;
    var total = 0;

    $('#user_dialog').dialog({
      autoOpen:false,
      width:400
    });

    $(document).on('click', '#save', function () {
      var error_first_name = '';
      var error_middle_name = '';
      var error_last_name = '';
      var error_age = '';
      var error_relationship = '';
      var error_number = '';
      var first_name = '';
      var middle_name = '';
      var last_name = '';
      var age = '';
      var relationship = '';
      var number = '';

      if($('#first_name').val() == '')
      {
        error_first_name = 'First Name is required';
        $('#error_first_name').text(error_first_name);
        $('#first_name').css('border-color', '#cc0000');
        first_name = '';
      }
      else{
        error_first_name = '';
        $('#error_first_name').text(error_first_name);
        $('#first_name').css('border-color', '');
        first_name = $('#first_name').val();
      } 

      if($('#middle_name').val() == '')
      {
        error_middle_name = 'Middle Name is required';
        $('#error_middle_name').text(error_middle_name);
        $('#middle_name').css('border-color', '#cc0000');
        middle_name = '';
      }
      else{
        error_middle_name = '';
        $('#error_middle_name').text(error_middle_name);
        $('#middle_name').css('border-color', '');
        middle_name = $('#middle_name').val();
      }

      if($('#last_name').val() == '')
      {
        error_last_name = 'Last Name is required';
        $('#error_last_name').text(error_last_name);
        $('#last_name').css('border-color', '#cc0000');
        last_name = '';
      }
      else{
        error_last_name = '';
        $('#error_last_name').text(error_last_name);
        $('#last_name').css('border-color', '');
        last_name = $('#last_name').val();
      }

      if($('#age').val() == '')
      {
        error_age = 'Age is required';
        $('#error_age').text(error_age);
        $('#age').css('border-color', '#cc0000');
        age = '';
      }
      else{
        error_age = '';
        $('#error_age').text(error_age);
        $('#age').css('border-color', '');
        age = $('#age').val();
      }

      if($('#relationship').val() == '')
      {
        error_relationship = 'Relationship is required';
        $('#error_relationship').text(error_relationship);
        $('#relationship').css('border-color', '#cc0000');
        relationship = '';
      }
      else{
        error_relationship = '';
        $('#error_relationship').text(error_relationship);
        $('#relationship').css('border-color', '');
        relationship = $('#relationship').val();
      }

      if($('#number').val() == '')
      {
        error_number = 'Number is required';
        $('#error_number').text(error_number);
        $('#number').css('border-color', '#cc0000');
        number = '';
      }
      else{
        error_number = '';
        $('#error_number').text(error_number);
        $('#number').css('border-color', '');
        number = $('#number').val();
      }

      if(error_first_name != '' || error_middle_name != '' || error_last_name != '' || error_age != '' || error_relationship != '' || error_age != ''){
        return false;
      }
      else
      {
        if($('#save').text() == 'Add')
        {
          count = count + 1;
          output = '<tr id="row_'+count+'">';
          output += '<td>'+first_name+' <input type="hidden" name="hidden_first_name[]" id="first_name'+count+'" class="first_name" value="'+first_name+'" /></td>';
          output += '<td>'+middle_name+' <input type="hidden" name="hidden_middle_name[]" id="middle_name'+count+'" class="middle_name" value="'+middle_name+'" /></td>';
          output += '<td>'+last_name+' <input type="hidden" name="hidden_last_name[]" id="last_name'+count+'" class="last_name" value="'+last_name+'" /></td>';
          output += '<td>'+age+' <input type="hidden" name="hidden_age[]" id="age'+count+'" class="age" value="'+age+'" /></td>';
          output += '<td>'+relationship+' <input type="hidden" name="hidden_relationship[]" id="relationship'+count+'" class="relationship" value="'+relationship+'" /></td>';
          output += '<td>'+number+' <input type="hidden" name="hidden_number[]" id="number'+count+'" class="number" value="'+number+'" /></td>';
          // output += '<td><button type="button" name="view_details" class="btn btn-warning btn-xs view_details" id="'+count+'">View</button></td>';
          output += '<td><button type="button" name="remove_details" class="btn btn-danger btn-xs remove_details" id="'+count+'">Remove</button></td>';
          output += '</tr>';
         
          $('#user_data').append(output);
          var number = parseInt($('#number').val());
          total += number;
          $('.total').text("Total: " + total);

          $('#first_name').val('');
          $('#middle_name').val('');
          $('#last_name').val('');
          $('#age').val('');
          $('#relationship').val('');
          $('#number').val('');

          $('#error_first_name').text('');
          $('#error_middle_name').text('');
          $('#error_last_name').text('');
          $('#error_age').text('');
          $('#error_relationship').text('');
          $('#error_number').text('');
        }
      }
    });

    $(document).on('click', '.view_details', function(){
      var row_id = $(this).attr("id");
      var first_name = $('#first_name'+row_id+'').val();
      var middle_name = $('#middle_name'+row_id+'').val();
      var last_name = $('#last_name'+row_id+'').val();
      var age = $('#age'+row_id+'').val();
      var relationship = $('#relationship'+row_id+'').val();
      var number = $('#number'+row_id+'').val();
      $('#first_name').val(first_name);
      $('#middle_name').val(middle_name);
      $('#last_name').val(last_name);
      $('#age').val(age);
      $('#relationship').val(relationship);
      $('#number').val(number);
      $('#save').text('Edit');
      $('#hidden_row_id').val(row_id);
      $('#user_dialog').dialog('option', 'title', 'Edit Data');
      $('#user_dialog').dialog('open');
    });

    $(document).on('click', '.remove_details', function(){
      var row_id = $(this).attr("id");
      if(confirm("Are you sure you want to remove this row data?"))
      {
      var number = document.getElementById('number'+row_id+'');
      console.log(number);
      var numberValue = parseInt($(number).val());
      total -= numberValue;
      $('.total').text("Total: " + total);
      $('#row_'+row_id+'').remove();
      }
      else
      {
      return false;
      }
    });

    $('#action_alert').dialog({
      autoOpen:false
    });

    $('#user_form').on('submit', function(event){
      event.preventDefault();
      var count_data = 0;
      $('.first_name').each(function(){
      count_data = count_data + 1;
      });
      if(count_data > 0)
      {
      var form_data = $(this).serialize();
      $.ajax({
        url:"/Jquery-Practice/AddList/post",
        method:"POST",
        data:form_data,
        success:function(data)
        {
        $('#user_data').find("tr:gt(0)").remove();
        $('#action_alert').html('<p>Data Inserted Successfully</p>');
        $('#action_alert').dialog('open');
        }
      })
      }
      else
      {
      $('#action_alert').html('<p>Please Add atleast one data</p>');
      $('#action_alert').dialog('open');
      }
    });

  });
</script>
</html>