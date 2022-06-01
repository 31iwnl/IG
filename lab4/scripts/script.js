var error_message = " ";

function valid(first,second,func){
    let a_ = first.split('');
    let b_ = second.split('');
    let c_ = func;
   
    if(first.length>0 && second.length>0 && func.length>0){
        if(a_.length < 4 || b_.length<4){
            error_message = "Элементов должно быть ровно 4"
            return false;
            
        }
        for(let i =0; i<func.length;i++){
            if(func[i].length!=2){
                error_message = "Количество элементов в отношении должно равняться 2";
                return false;
            }
        }
        
        
    }else{
        error_message = " Поля должны быть заполнены"
        return false;
    }return true;
}

function set(){
    let a = document.getElementById("first").value.trim();
    let b = document.getElementById("second").value.trim();
    let c = document.getElementById("func").value.trim().split(' ');
    let function_;
    let _array = [
        [0, 0, 0, 0],
        [0, 0, 0, 0],
        [0, 0, 0, 0],
        [0, 0, 0, 0]];
                
    if(valid(a,b,c)){
        a = a.split('');
        b = b.split('');
        for (let i =0;i<c.length;i++){
            if(Array.from(a).indexOf(c[i][0])>=0 && Array.from(b).indexOf(c[i][1])>=0){
                _array[Array.from(a).indexOf(c[i][0])][Array.from(b).indexOf(c[i][1])] = 1;
            }
        }
        let result = 0;
        for (let i = 0; i < _array.length; i++){
            result = 0;
            for (let j = 0; j < _array[i].length; j++){
                result += _array[i][j];
                function_ = result;
            }
            // если сумма != 1, то это не функция
            if (result != 1) {
                function_ = result;
            }
        }       
            document.getElementById('result').innerHTML = "Кратчайший " + " путь = " + function_ ;
           
    }else{
        alert(error_message);
    }
}