function validasiForm(){
    const nama = document.getElementById('nama').value;
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;
    let adA = false; let adHB = false; let adHK = false;

    if (nama.trim() === "" || email.trim() === "" || password.trim() === ""){
        alert("ISI SEMUA FORM WOY!!");
        return false;
    }
    if (password.length < 6){
        alert("PASSWORDNYA MINIMAL 6 KARAKTER KOCAK!!");
        return false;
    } else {
        for (let i = 0; i < password.length; i++){
            let char = password[i];
            if (char >= '0' && char <= '9'){
                adA = true;
            } else if (char >= 'a' && char <= 'z'){
                adHK = true;
            } else if (char >= 'A' && char <= 'Z'){
                adHB = true;
            }
        }
        if (!adA || !adHK || !adHB){
            alert("HARUS PAKE ANGKA, HURUF BESAR, DAN HURUF KECIL DONGGG KOCAKK!!!!");
            return false;
        }
    }

    console.log("YEYYY, VALIDASI BERHASIL, DATA TELAH TERSIMPAN HEHE XD");
    return true;
}