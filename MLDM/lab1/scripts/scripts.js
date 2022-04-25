var error_message = " ";

function isValid(strok){
    let arr = strok.split(" ");
    if(strok1.length === 0 || strok2.length === 0) {
        error_message = "Одно из множеств пустое, введите множества";
        return false;
    }
    for(let i = 0; i<arr.length; i++){
        if (arr[i].length != 4)
        {
            error_message = "Элемент массива должен содержать 4 символа"
            return false;
        }
        if ((arr[i][0] < 'A' ||  arr[i][0]>'z'))
        {
            error_message = "Первый элемент должен быть буквой"
            return false;
        }
        if (!(arr[i][1] < 'A' ||  arr[i][0]>'z'))
        {
            error_message = "Второй элемент должен быть числом"
            return false;
        }
        if (arr[i][1] %2 === 0)
        {
            error_message = "Второй элемент должен быть нечетным"
            return false;
        }
        if (!(arr[i][2] < 'A' ||  arr[i][0]>'z'))
        {
            error_message = "Третий элемент должен быть числом"
            return false;
        }
        if (!(arr[i][3] < 'A' ||  arr[i][0]>'z'))
        {
            error_message = "Четвертый элемент должен быть числом"
            return false;
        }
        if (arr[i][3] %2 != 0)
        {
            error_message = "Четверый элемент должен быть четным"
            return false;
        }
      }  return true;
}
function Calc(){
    strok1 = document.getElementById('first').value;
    strok2 = document.getElementById('second').value;
    if (isValid(strok1) && isValid(strok2)){
        const first_set = new Set(strok1.split(" "));
        const second_set = new Set(strok2.split (" "));
        const union_set = new Set([...first_set,...second_set]);
        document.getElementById('union').innerHTML =  [...union_set.values()];
        const intersection_set = new Set([...first_set].filter(x =>second_set.has(x)));
        document.getElementById('int').innerHTML = [...intersection_set.values()];
        const difference_set_a = new Set([...first_set].filter(x => !second_set.has(x)));
        document.getElementById('diff a').innerHTML = [...difference_set_a.values()];
        // B \ A    
        const difference_set_b = new Set([...second_set].filter(x => !first_set.has(x)));
        document.getElementById('diff b').innerHTML = [...difference_set_b.values()];
        // Симметрическая разность 
        const symmetric_difference_set = new Set([...difference_set_a, ...difference_set_b]);
        document.getElementById('symm').innerHTML = [...symmetric_difference_set.values()];
    }
    else
    {
        alert(error_message);
    }
}