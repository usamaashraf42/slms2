$(document).ready(function () {
    var branch_name;
        $(".printedme").click(function () {

              // alert('zza');
            //Hide all other elements other than printarea.
            $(".specific_data");
            print();
            // window.print();
        })



    $('#select_branch').on('change', function() {
        branch_id = this.value;

        // alert(branch_id);
        $.ajax({
            type:"get",
            url:"/getclasses/"+branch_id,
            // data:{'branch_name':branch_name},
            success: function (result){
                console.log(result);
                var htmlOptions=[];
                var dx;
               // console.log(result);
                for (item in result){
                    dx='<option>'+result[item].grade_name+'</option>';
                    // console.log(dx);
                    $('#classes').append(dx);
                    // $('#classes').append('')

                }

            }
        });
    });

});

$(document).ready(function () {
    var branch_name;
    $('#select_branch').on('change', function() {
        branch_id = this.value;
        $.ajax({
            type:"POST",
            url:"/branch/class/",
            data:{'branch_name':branch_name},
            success: function (result){

                console.log('branch',result);
                var htmlOptions=[];
                var dx;
               // console.log(result);
                for (item in result){
                    dx='<option>'+result[item].grade_name+'</option>';
                    // console.log(dx);
                    $('#classes').append(dx);
                    // $('#classes').append('')

                }

            }
        });
    });

});


