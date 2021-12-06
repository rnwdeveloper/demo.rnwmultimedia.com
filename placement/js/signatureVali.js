$("#Signature").change(function () {



    var validExtensions = ["png","jpeg","jpg"]

    var file = $(this).val().split('.').pop();

    var numb = $(this)[0].files[0].size/1024/1024;

    console.log(numb);

    numb = numb.toFixed(2);

    console.log(numb);

    if (validExtensions.indexOf(file) == -1) {

        alert("Only formats are allowed : "+validExtensions.join(', '));

        $(this).val('');

    }

    else if(numb > 0.1){

      alert('to big, maximum is 100KB. You file size is: '+ numb +' KB');

       $(this).val('');

    }





});