function valida(){

		 if($('#id').val()==''){
                alert("Campo ID ideia vazio!");
                $('#id').focus();
              return false;

          }else{

          	return true;
          }
	}