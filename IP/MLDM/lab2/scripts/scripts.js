var error_message = " ";

function isValid(strok){
    let arr = strok.split(" ");
    if(strok1.length === 0 || strok2.length === 0) {
        error_message = "Одно из множеств пустое, введите множества";
        return false;
    }
    if (isValid(arr.value)) { //true
        let map = arr.value.split('\n');
   const reflex = true;
   const simm = true;
   const nesimm = true;
   const tranz = true;
   

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