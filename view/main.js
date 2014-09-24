function start() {
    if ((countM - 1) >= -1) {
        if ((count - 1) >= 0) {
            count = count - 1;
            tempo.innerHTML = countM;
            tempo2.innerHTML = count
            msg.innerHTML = "Você tem: ";
            if (count < 10) {
                tempo2.innerHTML = '0' + count;
            }
            if (countM < 10) {
                tempo.innerHTML = '0' + countM;
            }
        }
        if (count == 0) {
            countM = countM - 1;
            count = 60;
            document.location.reload();
        }
    } else {
        msg.innerHTML = ":( ";
        tempo2.innerHTML = ' !';
        tempo.innerHTML = "Tempo esgotado";
        document.location.reload();
    }
    setTimeout('start();', 1000);
}