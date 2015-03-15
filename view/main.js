jQuery(document).ready(function update_time() {
    index;
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
        if (count === 0) {
            countM = countM - 1;
            count = 60;
            //document.location.reload();
            //document.location.href=index;
        }
    } else {
        msg.innerHTML = ":( ";
        tempo2.innerHTML = ' !';
        tempo.innerHTML = "Tempo esgotado";
        document.location.href = index;
        //document.location.index;
    }
    setTimeout(update_time, 1000);
});

jQuery(document).ready(function () {
    $('input[type=submit]').click(function () {
        jQuery.ajax({
            type: "POST",
            url: "index.php",
            //success: function(){
            //    document.location.href = index;
            //}
        });

        return false;
    });
});