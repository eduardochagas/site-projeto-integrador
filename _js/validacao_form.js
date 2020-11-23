            function validacaoFormulario() {

                //alert(moment());
                
                var nome, empresa, email, telefone, dataForm, horario;
                
                nome = document.getElementById('nome').value;
                empresa = document.getElementById('empresa').value;
                email = document.getElementById('email').value;
                telefone = document.getElementById('telefone').value;
                dataForm = document.getElementById('data').value;
                horario = document.getElementById('horario').value;


                if(nome == ""){
                    alert('Campo nome é obrigatório !!!');
                    nome.focus();
                }                    
                if(empresa == ""){
                    alert('Campo empresa é obrigatório !!!');
                    empresa.focus();
                }
                if(email == ""){
                    alert('Campo email é obrigatório !!!');
                    email.focus();
                }
                if(telefone == ""){
                    alert('Campo telefone é obrigatório !!!');
                    telefone.focus();
                }
                
                if(dataForm == "") {
                    alert('Campo data é obrigatório !!!');
                    dataForm.focus();
                }
                else {
                    
                    //alert('funcionou !!!');                    

                    var date, anoAtual, diaHoje, dataFormulario, dataDoFormularioFatiada, anoDataDoFormulario, data, feriados, feriado, dataDoFormulario, varMoment, aviso;

                    date = new Date();
                    anoAtual = date.getFullYear(); // retorna o ano atual do sistema
                    diaHoje = date.getDay(); // retorna o dia de hoje do sistema

                    dataFormulario = document.getElementById('data').value;
                    // é um array com os dados do: ano, mes e dia nessa ordem: ['ano', 'mes', 'dia'].
                    // OBS: os três dados do array estão no formato: string.
                    dataDoFormularioFatiada = dataFormulario.split("-");
                    // anoDataDoFormulario recebe o ano do array dataDataDoFormularioFatiada 
                    anoDataDoFormulario = dataDoFormularioFatiada[0]; 
                    // se o ano atual for igual ao ano da data do formulário html... 
                    if(anoDataDoFormulario == anoAtual) {

                        // a variavel data recebe o dia e o mes do array dataDoFormularioFatiada, ficando assim: 'dia/mes'.
                        data = dataDoFormularioFatiada[2] + '/' + dataDoFormularioFatiada[1];

                        // lista de todas as datas de feriado do ano
                        feriados = ['01/01', '21/02', '22/02', '23/02', '24/02', '25/02', '26/02', '10/04', '12/04', '21/04', '01/05', '10/05', '11/06', '12/06', '09/08', '07/09', '12/10', '15/10', '28/10', '02/11', '15/11', '20/11', '25/12', '31/12'];

                        
                        //alert(feriados.length);
                        var i=0;
                        // enquanto i for menor que o comprimento do array feriados...
                        while(i < feriados.length-1) {
                            // se a data for igual a data do feriado...
                            if(data == feriados[i]) {
                                // a variável feriado armazena a data do feriado, nesse formtato: d/m/A
                                feriado = feriados[i]+'/'+anoDataDoFormulario;
                                break;
                            }                                
                            else {
                                feriado = "00/00/0000";
                            }
                        i++ // incrementa o valor do loop while...
                        }

                        //alert(feriado);

                        // o valor de dataDoFormulário é a data nessa ordem: dia/mes/ano
                        dataDoFormulario = data + '/' + anoDataDoFormulario;   

                        //Na linha abaixo, usamos uma lib externa chamada moment.js. Essa lib é responsável por manipular datas. Nesse código utilizamos essa lib para poder pegar o dia da semana de uma determinada data, em um determinado ano.
                        //
                        //    ex:
                        //        que DIA DA SEMANA está a data 25/03 do ano de 2020?
                        //         R: o dia da semana dessa data é: quarta-feira.

                        //OBS: lembrando que inserimos a lib moment.js no header do documento
                        //    ex:
                        //        <script src="_js/lib/moment/moment-with-locales-min.js"> 
                        //OBS2: a lib moment.js formata datas na estrutura: mes/dia/ano, fique atento !!!. */
                        varMoment = moment(dataDoFormularioFatiada[1]+'/'+dataDoFormularioFatiada[2]+'/'+dataDoFormularioFatiada[0]);
                        // deixa a data no formato: dia/mes/ano
                        varMoment.locale('pt-br');
                        // pega o dia da semana da data
                        diaDaSemana = varMoment.format('dddd');
                        //alert('dia da semana: '+diaDaSemana);
                       

 
                        // se o dia da semana for igual a domingo ('Sunday') e dia da semana for igual a sábado ('Saturday') e feriado for igual a data preenchida no formulário html...  
                        //diaDaSemana == 6 || diaDaSemana == 0 || dataDoFormulario == feriado
                        if(diaDaSemana == 'sábado' || diaDaSemana == 'domingo' || dataDoFormulario == feriado) {
                           alert(dataDoFormulario+" : Desculpe, não trabalhamos nos finais de semana e feriados"); 

                        }
                    }
                }
            }