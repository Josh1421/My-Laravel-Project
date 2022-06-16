$(document).ready(function(){
  $("#guest_fullname").autocomplete({
    source: function(data, cb){
      console.log(data);
      $.ajax({
        url: '/hotel/newcheckin/'+data.term,
        method: 'GET',
        dataType: 'json',
        data: {
          name: data.term,
          fieldName: "AutoComplete"
        },
        success: function(res){
          var result;
          result = [
            {
              label: "There is no matching record found for "+data.term,
              value: ""
            }
          ];

          if (res.length){
            result = $.map(res, function(obj){
              return {
                label: obj.id,
                value: obj.id,
                data: obj
              };
            });
          }
          cb(result);
        }
      });
    },
    select:function(event, selectedData){
        
      if (selectedData && selectedData.item && selectedData.item.data){
        console.log(selectedData);
        var data;
        data = selectedData.item.data;
        $("#guest_room_no").val(data.first_name);
      }
    }
  })
});