/*
*Essa função valida qualquer data (dia, mes e ano)
*O primeiro parâmetro é o campo da data (obrigatório).


*O segundo parâmetro é o nome do campo, para caso de existirem
* 2 campos que precisam ser validados na mesma tela (opcional: caso não setado,


* o nome do campo na msg de erro será "Data".
*O terceiro parâmetro se restringe em limitar a verificação da data até a data atual, ou até 10 anos depois.


* ela é do tipo boolean, caso passada como true ela limita a data até a data de hoje. (obrigatório)
*/
function validarData(data, nomeCampo, limite){
    var dataEscolhida = data;
    dataAtual = new Date();
    anoBissexto = 1996;
    if(limite == false){
        dia = 31;
        mes = 12;
        anoFuturo = dataAtual.getFullYear()+10;
        anoPassado = dataAtual.getFullYear()-100;
    }
    else {
        ano = dataAtual.getFullYear();
        anoPassado = dataAtual.getFullYear()-100;
        if(dataEscolhida.substring(6,10) == ano){
            mes = dataAtual.getMonth()+1;
            if(dataEscolhida.substring(3,5) < (dataAtual.getMonth()+1) ){
                dia = 31;
            }
            else {
                dia = dataAtual.getDate();
            }
        }
        else {
            mes = 12;
            dia = 31;
        }
    }

    if(!nomeCampo){
        nomeCampo = "Data";
    }

    if((dataEscolhida.substring(6, 10) > ((limite==false) ? anoFuturo : ano)) || (dataEscolhida.substring(6, 10) < anoPassado)){
        //alert("O ano escolhido para o campo '" + nomeCampo + "' é inválido. Para essa data o sistema só aceita anos que estejam entre 100 anos antes e " + ((limite == false) ? "10 anos depois da data atual." : "o ano atual."));
        return false;
    }
    else {
        if(dataEscolhida.substring(3, 5) > mes){
            //alert("O mês escolhido para o campo '" + nomeCampo + "' é inválido." + ((limite==false) ? " O número do mês deve estar entre 01 e " + mes + "." : " A data limite para este campo é: " + dia + "/" + mes + "/" + ano + "."));
            return false;
        }
        else {
            if (dataEscolhida.substring(0, 2) > dia){
                dia = (limite==true) ? dataAtual.getDate() : 31;
                //alert("O dia escolhido para o campo '" + nomeCampo + "' é inválido." + ((limite==false) ? " O número do dia deve estar entre 01 e " + dia + "." : " A data limite para este campo é: " + dia + "/" + mes + "/" + ano + "."));
                return false;
            }
            else {				
                if(((dataEscolhida.substring(6,10) - anoBissexto)%4 == 0)){
                    diaFevereiro = 29;
                    //mensagem = "O mês fevereiro setado no campo '" + nomeCampo + "' possui no máximo 29 dias. Pois o ano setado é bissexto.";
                }
                else {
                    diaFevereiro = 28;
                    //mensagem = "O mês fevereiro setado no campo '" + nomeCampo + "' possui no máximo 28 dias. Pois o ano setado não é bissexto.";
                }
                if((dataEscolhida.substring(0,2) > diaFevereiro) && (dataEscolhida.substring(3,5) == 02)){
                    alert(mensagem);
                    return false;
                }
                else {
                    return true;
                }
            }// fim da verificação do ano bissexto
        }
    }
}

