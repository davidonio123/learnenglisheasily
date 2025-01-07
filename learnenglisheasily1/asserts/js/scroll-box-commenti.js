let nomi = document.getElementById('nomi');
let container = document.getElementById('box-con-le-persone');

let ret = 0 - nomi.clientHeight + container.clientHeight - 10;
let velocita = 20;

if(nomi.clientHeight>container.clientHeight){
    document.documentElement.style.setProperty( '--animation-count', ret + "px" );
    velocita = Math.trunc(0-ret/velocita/0.5    );
    document.documentElement.style.setProperty('--time', velocita + "s");
}else{
    document.documentElement.style.setProperty('--time', '0s');
}
//PRENDO LALTEZZA DELL BOX CHE CONTIENE TUTTO LA SOTTRAGGO ALLA LUNGHEZZA DEL BOX CHE CONTIENE SOLO I NOMI E CI SOMMO IL PADDING, IN FINE AGGIORNO LA VARIABILE NEL :ROOT