
function limpar_formulario() 
{
    document.getElementById("cadastro").reset();
}

function Upper()
{ 
	 ToUpperCase("nome");
	 ToUpperCase("sobrenome");
	 ToUpperCase("complemento");
} 

function ToUpperCase(idElement)
{
	var up = document.getElementById(idElement);
	up.value = up.value.toUpperCase(); 
}

function verificaCPF() {

	var campoCPF = document.getElementById("cpf")

    var Soma;
    var Resto;
    Soma = 0;   
    //strCPF  = RetiraCaracteresInvalidos(strCPF,11);
    if (strCPF == "00000000000")
    {
    	alert("CPF Invalido!");
    	campoCPF.value = "";
		return false;
	}

    for (i=1; i<=9; i++)
		Soma = Soma + parseInt(strCPF.substring(i-1, i)) * (11 - i); 
    Resto = (Soma * 10) % 11;

    if ((Resto == 10) || (Resto == 11)) 
		Resto = 0;

    if (Resto != parseInt(strCPF.substring(9, 10)) )
    {
    	alert("CPF Invalido!");
    	campoCPF.value = "";
		return false;
	}

	Soma = 0;

    for (i = 1; i <= 10; i++)
       Soma = Soma + parseInt(strCPF.substring(i-1, i)) * (12 - i);

    Resto = (Soma * 10) % 11;

    if ((Resto == 10) || (Resto == 11)) 
		Resto = 0;
    if (Resto != parseInt(strCPF.substring(10, 11) ) )
    {
    	alert("CPF Invalido!");
    	campoCPF.value = "";
        return false;
    }
    return true;
}

function verificaCEP()
{
	$(document).ready(function()
		{	

			           //Nova variável com valor do campo "cep".
                var cep = $("#cep").val();

                //Verifica se campo cep possui valor informado.
                if (cep != "") {

                    //Expressão regular para validar o CEP.
                    var validacep = /^[0-9]{5}-?[0-9]{3}$/;

                    //Valida o formato do CEP.
                    if(validacep.test(cep)) {

                        //Preenche os campos com "..." enquanto consulta webservice.
                        $("#rua").val("...");
                        $("#bairro").val("...");
                        $("#cidade").val("...");
                        $("#estado").val("...");



                        //Consulta o webservice viacep.com.br/
                        $.getJSON("http://viacep.com.br/ws/"+ cep +"/json/?callback=?", 

                        function(dados) {
                            if (!("erro" in dados))
                            {
                                //Atualiza os campos com os valores da consulta.
                                $("#rua").val(dados.logradouro.toUpperCase());
                                $("#bairro").val(dados.bairro.toUpperCase());
                                $("#cidade").val(dados.localidade.toUpperCase());
                                $("#estado").val(dados.uf.toUpperCase());
                            } //end if.
                            else 
                            {
                                //CEP pesquisado não foi encontrado.
                                limparEndereco();
                                alert("CEP não encontrado.");
                            }
                        });
                    } //end if.
                    else 
                    {
                        //cep é inválido.
                        limparEndereco();
                        alert("Formato de CEP inválido.");
                    }
                } //end if.
		});
}

function verificaNumero()
{



}

function limparEndereco()
{
	 $("#rua").val("");
     $("#bairro").val("");
     $("#cidade").val("");
     $("#estado").val("");
     $("#cep").val("");
}