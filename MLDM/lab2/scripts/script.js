let error_message = " "; 
var matrix, string, rows, columns, arr, 
stringsm, arrlength;

function isvalid(strok) {
    let arr = false;
    var long = strok.length;
    if (long > 0) {
        arr = strok.split(" ");
        var symb = arr.length;
        for (let i = 0; i < symb; i++) {
            if (symb % 2 != 0) {
                error_message = "Введены не пары чисел!";
                arr = false;
                break;
            }
            
        }
    } else {
        error_message = "Введите пары чисел!";
    }
    return arr;
}

function count(arr, el) {
    let k = 0;
    for (let i = 0; i < arr.length; i++)
        if (arr[i] == el)
            k++;
    return k;
}

function MM(arr) {
    arrlength = arr.length;
    for (let i = 0; i < arrlength; i++) {
        if (count(arr, arr[i]) > 1) {
            arr.splice(i, 1);
            i--;
            arrlength--;
        }
    }

    for (let i = 0; i < arrlength; i++) {
        if (arr[i] > arr[i + 1]) {
            let tmp = arr[i]
            arr[i] = arr[i + 1];
            arr[i + 1] = tmp;
        }
    }
    stringsm = [];
    let k = 0;
    var couplerows = string.length / 2;
    for (let i = 0; i < couplerows; i++) {
        stringsm[i] = [];
        for (let j = 0; j < 2; j++) {
            stringsm[i][j] = string[k];
            k++;
        }
    }
    let r = 0;
    let l = 0;
    var to_matrix = [];
    rows = arr.length + 1;
    columns = arr.length + 1;
    for (let i = 0; i < rows; i++) {
        to_matrix[i] = [];
        for (let j = 0; j < columns; j++) {
            to_matrix[0][0] = '0';
            if (i == 0 || j == 0) {
                if (i == 0 && j != 0) {
                    to_matrix[i][j] = arr[r];
                    r++;
                }
                if (j == 0 && i != 0) {
                    to_matrix[i][j] = arr[l];
                    l++;
                }
            } else {
                for (k = 0; k < couplerows; k++) {
                    if ((to_matrix[0][j] == stringsm[k][1] && to_matrix[i][0] == stringsm[k][0])) {
                        to_matrix[i][j] = '1';
                        break;
                    } else {
                        to_matrix[i][j] = '0';
                    }
                }
            }
        }

    }
    return to_matrix;
}

function reflexivity(matrix) {
    var refl = "Нет";
    let refl_ = 0;
    for (let i = 1; i < rows; i++) {
        for (let j = 1; j < columns; j++) {
            if (i == j && matrix[i][j] == '1') {
                refl_++;
            }
        }
    }
    if (refl_ == arrlength) {
        refl = "Есть";
    }
    return refl;
}

function symmetric(matrix) {
    var symm = "Нет";
    let symm_ = 0;
    let matrixsize = (rows - 1) * (columns - 1);
    for (let i = 1; i < rows; i++) {
        for (let j = 1; j < columns; j++) {
            if (matrix[i][j] == matrix[j][i]) {
                symm_++;
            }
        }
    }
    if (symm_ == matrixsize) {
        symm = "Есть";
    }
    return symm;
}

var coss_;
var matrixsize;

function cossymmetric(matrix) {
    var coss = "Нет";
    coss_ = 0;
    let matrixsize = (rows - 2) * (columns - 1);
    for (let i = 1; i < rows; i++) {
        for (let j = 1; j < columns; j++) {
            if (matrix[i][j] != matrix[j][i] && i != j) {
                coss_++;
            }
        }
    }
    if (coss_ == matrixsize) {
        coss = "Есть";
    }
    return coss;
}

function transitivity(matrix) {
    var tran = "Нет";
    let tran_ = 0;
    for (let i = 1; i < rows; i++) {
        for (let j = 1; j < columns; j++) {
            if (i != j && matrix[i][j] == '1') {
                tran_++;
            }
        }
    }
    if (tran_ >= rows) {
        tran = "Есть";
    }
    return tran;
}

function result() {
    let res = "";
    var strings = document.getElementById('strings');
    string = isvalid(strings.value);
    arr = isvalid(strings.value);
    if (string == false) {
        alert(error_message);
    } else {
        matrix = MM(arr);
        for (let i = 0; i < rows; i++) {
        }
        res += "Рефлексивность: " + reflexivity(matrix) + "\n";
        res += "Симметричность: " + symmetric(matrix) + "\n";
        res += "Кососимметричность: " + cossymmetric(matrix) + "\n";
        res += "Транзитивность: " + transitivity(matrix) + "\n";

        document.getElementById("result").innerText = res;
    }
}