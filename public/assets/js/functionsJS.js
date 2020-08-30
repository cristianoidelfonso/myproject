function typeOf (obj) {
    return alert({}.toString.call(obj).split(' ')[1].slice(0, -1).toLowerCase());
}

function getIdadeJS(data){

    if(data === ''){
        alert('Data de nascimento precisa ser preenchida');
        document.getElementById('dataNasc').classList.add('required');
        return;
    }else{
        document.getElementById('dataNasc').classList.remove('required');
    }

    hoje = new Date();
    var array_data = data.split("-");
    //alert(array_data[0] + array_data[1] + array_data[2]);
    if (array_data.length != 3) { 
        return false;
    }   
    var ano = parseInt(array_data[0]);
    if (isNaN(ano)){
        return false;
    }
    var mes = parseInt(array_data[1]);
    if (isNaN(mes)){
        return false;
    }
    var dia = parseInt(array_data[2]);
    if (isNaN(dia)){
        return false;
    } 
    //se o ano da data que recebo so tem 2 cifras temos que muda-lo a 4
    if (ano<=99){
        ano +=1900;
    }
    //subtraio os anos das duas datas
    idade = ( hoje.getFullYear() - ano ) - 1; //-1 porque ainda nao fez anos durante este ano

     //se subtraio os meses e for menor que 0 entao nao cumpriu anos. Se for maior sim ja cumpriu
    if (hoje.getMonth() + 1 - mes < 0){ //+ 1 porque os meses comecam em 0
        return idade;
    }
    if (hoje.getMonth() + 1 - mes > 0){
        return idade + 1;
    }
    //entao eh porque sao iguais. Vejo os dias
    //se subtraio os dias e der menor que 0 entao nao cumpriu anos. Se der maior ou igual sim que já cumpriu
    if (hoje.getUTCDate() - dia >= 0){
        return idade + 1;
    }
    return idade;
}

function getMenorIdade(idade){
    var checkIdade = document.getElementById('menorIdade');
    var responsavel = document.getElementById('responsavel');
    var vinculo = document.getElementById('vinculo');
    var cpfResponsavel = document.getElementById('cpfResponsavel')
    var identidadeResponsavel = document.getElementById('identidadeResponsavel')
    
    if(idade < 18){
        checkIdade.checked = true;
        responsavel.required = true;
        vinculo.required = true;
        responsavel.classList.add('required');
        vinculo.classList.add('required');
        cpfResponsavel.classList.add('required');
        identidadeResponsavel.classList.add('required');
    }else{
        checkIdade.checked = false;
        responsavel.required = false;
        vinculo.required = false;
        responsavel.classList.remove('required');
        vinculo.classList.remove('required');
        cpfResponsavel.classList.remove('required');
        identidadeResponsavel.classList.remove('required');
    }
}

function ucWords(string){
    var str = string;
    str = str.toLowerCase().replace(/\b[a-z]/g, function (letter) {
        return letter.toUpperCase();
    });
    //return alert(str); //Displays "Hello World"
    return str;
}
