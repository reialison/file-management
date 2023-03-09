"use strict";
function randomPassword() {
    let chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
    let pass = " ";
    for (let x = 0; x < 10; x++) {
        i = Math.floor(Math.random() * 62);
        pass += chars.charAt(i);
    }
    ff1.password.value = pass;
    $(".top_testresult").remove();
}
