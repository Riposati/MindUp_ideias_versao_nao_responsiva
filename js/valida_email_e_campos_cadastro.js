        
         $(document).ready(function() {

            $("#datanascimento").mask("99/99/9999");
            $("#celular").mask("(99) 9999-9999");
            $("#telfixo").mask("(99) 9999-9999");
            $("#cpf").mask("999.999.999-99");

        });

        function validaEmail(email) {
            var email = $("#email").val();
            if (email != "")
            {
                var filtro = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
                if (filtro.test(email))
                {
                    return true;
                } else {
                    return false;
                }
            }

        }

        function validaCampos() {

            if ($('#nome').val() == '' || $('#nome').val().length < 7) {
                alert("O nome não pode ficar vazio e não pode possuir menos de 7 letras!");
                $('#nome').focus();
                return false;
            } else {
                    if ($('#datanascimento').val() == '') {
                        alert("A data de nascimento não pode ficar vazia");
                        $('#datanascimento').focus();
                        return false;
                    } else {

                        if ($('#celular').val() == '') {
                            alert("O celular não pode ficar vazio");
                            $('#celular').focus();
                            return false;
                        } else {

                            if ($('#email').val() == '' || validaEmail($('#email').val()) == false) {
                                alert("email inválido");
                                $('#email').focus();
                                return false;
                            } else {
                                if ($('#confirmaemail').val() == '' || validaEmail($('#confirmaemail').val()) == false) {
                                    alert("comfirmação de email inválida");
                                    $('#confirmaemail').focus();
                                    return false;
                                } else {
                                    if ($('#confirmaemail').val() != $('#email').val()) {
                                        alert("Os Emails são diferentes");
                                        $('#confirmaemail').focus();
                                        return false;
                                    }
                                    if ($('#senha').val() == '') {
                                        alert("A senha não pode ficar vazia");
                                        $('#senha').focus();
                                        return false;
                                    } else {
                                        if ($('#confirmasenha').val() == '') {
                                            alert("A confirmação da senha não pode ficar vazia");
                                            $('#confirmasenha').focus();
                                            return false;
                                        } else {
                                            if ($('#confirmasenha').val() != $('#senha').val()) {
                                                alert("As senhas são diferentes");
                                                $('#confirmasenha').focus();
                                                return false;
                                            } else

                                                return true;
                                            }
                                        }
                                    }
                                }
                            }
                        }

                    }

                }