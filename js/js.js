
$(document).ready(function(){




    // Show the date form DB on the table
    function showData(){

      $.ajax({
        url: 'show-cars.php',
        data: 'show-cars',
        type: 'GET',

        success: function(data){
          $('#table tbody').html(data);

          // Add the options to Update and Delete
          tabaleBTNS();
        },

        error: function(data) {
          CRUDdb('alert-danger', 'ERROR!!! Something goes wrong on the Table list');
        }


      });
    }
    showData();




    /* Event to car list data
    function eventToCars(){
      $('a.cars').click(function(e){
        e.preventDefault();
        //alert(e);
        //console.log(e);
      });
    }
    */
    









    // Search cars from DB 
    $('#search').keyup(function(){

      var search = $('#search').val();

      $.ajax({
        url:     'search.php',
        data:    { key:search },
        type:    'POST',

        success: function(data){
          if(!data.error){
            $('#result').html(data);
          }
        },
        error: function(data) {
          CRUDdb('alert-danger', 'ERROR!!! Something goes wrong');
        }
          

      });

    });









    // Add new car to DB 
    $('#add-car-todb').submit(function(e){

      e.preventDefault();
      var postData = $(this).serialize();
      var url = $(this).attr('action');
      var success = false;

      $.post(url, postData, function(php_table_data){

         CRUDdb('alert-success', 'Car added to to the stock :)');
         $('#add-field').val('');
         success = true;
         showData()
      });

      if ( success ){
        CRUDdb('alert-danger', 'ERROR!!! Something goes wrong :(');
      }
    });





    function tabaleBTNS() { 

      // Delete the table row on click
      $('.n-btn.delete-btn').click(function(){


        var id = $(this).attr('data-id');
        var carName = $(this).attr('data-car');

        var result = confirm('Are you sure you want to delete '+ carName +'?');
        if (result) {

          $.ajax({
            url: 'delete.php',
            data: { delete:id },
            type: 'POST',
            
            success: function(data){
              if(!data.error){
                //alert('data');
                showData();
              }
            },
            error: function(data) {
              alert('ERORR delete-btn ID ' + id + ' clicked');
            }

          });
      }

      });







      // Store the old val of the table before update
      var tableVal;
      $('#table tbody tr td .cars').on( "click", function(){
        tableVal = $(this).text();
      });


      // update the new val
      $('#table tbody tr td .cars').on( "blur", function(){

        var val, id; 
        val = $(this).text();
        id  = $(this).attr('data-id');

        if ( val !== tableVal ){


            $.ajax({
            url: 'update.php',
            data: { 
                id:id,
                val:val
            },
            type: 'POST',
            
            success: function(data){
                if(!data.error){
                showData();
                }
            },
            error: function(data) {
                alert('ERORR Update car No.' + id + 'failed' );
            }

            });
        }



      });

      

    }


    // Add sort options
    $( '#table tbody' ).sortable({

        axis: 'y',

        update: function (event, ui) {

            var oldID, newId;
            oldID = $(ui.item[0]).find('p').attr('data-id');
            newId = $(ui.item[0].rowIndex);
            newId = newId['0'];

            //console.log(oldID);
            //console.log(newId);

            var data = $('#table tbody').sortable('widget');
            console.log( data.childNodes);

           /*
            $.ajax({

                url: 'reorder.php',
                data: {
                    oldID: oldID,
                    newId: newId
                },
                type: 'POST',
                success: function(data) {
                CRUDdb('alert-success', 'List Reordered');
                alert(data);
                },
                error: function(data) {
                  alert(data);
              }
            });
            */
            
            
        }
        

    });





    // Add success/error message on CRUD db 
    function CRUDdb ( cssClass, message ) { 
      
      $('<p class="alert '+ cssClass +' CRUDdb-div">'+ message +'</p>').insertBefore($('#container > div:first-child'));

      setTimeout( function(){
         $('.CRUDdb-div').fadeOut('slow');
      } , 5000);

      setTimeout( function(){
         $('.CRUDdb-div').remove();
      } , 5500);
    }









  }); // document ready
