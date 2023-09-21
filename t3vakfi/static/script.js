document.addEventListener("DOMContentLoaded", function() {

    const radioCay1 = document.getElementById('radioCay1');
    const radioCay2 = document.getElementById('radioCay2');
    const radioKahve1 = document.getElementById('radioKahve1');
    const radioKahve2 = document.getElementById('radioKahve2');
    const radioSoguk1 = document.getElementById('radioSoguk1');
    const radioSoguk2 = document.getElementById('radioSoguk2');
    const durumBilgisi = document.getElementById('durumBilgisi');
    const cateringBilgisi = document.getElementById('cateringBilgisi');
    const damacanaBilgisi = document.getElementById('damacanaBilgisi');

    const damacanaTalep = document.getElementById('damacanaTalep');
    const damacanaTeslim = document.getElementById('damacanaTeslim');
    const damacanaTeslimAdet = document.getElementById('damacanaTeslimAdet');
    const damacanaTalepAdet = document.getElementById('damacanaTalepAdet');
    const krizDurumu = document.getElementById('krizDurumu');
    const krizButton = document.getElementById('krizButton');
    const hiddenContent = document.getElementById('hiddenContent');
    const sendButton = document.getElementById('sendButton');
    const krizAlert = document.getElementById('krizAlert');
    const gonderButton = document.getElementById('gonderButton');
    const successAlert = document.getElementById('successAlert');

    gonderButton.addEventListener('click', function() {
        if (document.getElementById('saatSaat').value !== '' && document.getElementById('saatDakika').value !== '' && document.getElementById('yer').value !== '' && document.getElementById('resim').files.length !== 0) {
            successAlert.style.display = 'block';
        }
        // successAlert.style.display = 'block';
    });
    var clickCountTalep = 0;

    document.getElementById('damacanaTalep').addEventListener('click', function() {
        clickCountTalep++;
        var damacanaTalepAdet = document.getElementById('damacanaTalepAdet');

        if (clickCountTalep % 2 === 1) {
            damacanaTalepAdet.style.display = "block";
            damacanaTalepAdet.disabled = false;
        } else {
            damacanaTalepAdet.style.display = "none";
            damacanaTalepAdet.disabled = true;
        }
    });

    // Teslimat geldi kutucuğu seçildiğinde
    document.getElementById('radio4').addEventListener('change', function() {
        document.getElementById('ikramlikGeldiTalep').style.display = 'block';
    });

    // Mevcut kutucuğu seçildiğinde
    document.getElementById('radio1').addEventListener('change', function() {
        document.getElementById('ikramlikGeldiTalep').style.display = 'none';
    });
    // getelementsByName ile de yapılabilir
    document.getElementById('radio2').addEventListener('change', function() {
        document.getElementById('ikramlikGeldiTalep').style.display = 'none';
    });
    // bitti kutucuğu seçildiğinde
    document.getElementById('radio3').addEventListener('change', function() {
        document.getElementById('ikramlikGeldiTalep').style.display = 'none';
    });

    document.getElementById('damacanaTeslim').addEventListener('click', function() {
        clickCountTalep++;
        var damacanaTeslimAdet = document.getElementById('damacanaTeslimAdet');

        if (clickCountTalep % 2 === 1) {
            damacanaTeslimAdet.style.display = "block";
            damacanaTeslimAdet.disabled = false;
        } else {
            damacanaTeslimAdet.style.display = "none";
            damacanaTeslimAdet.disabled = true;
        }
    });

    durumBilgisi.addEventListener('change', function () {
        var cateringBilgisiDiv = document.getElementById('cateringBilgisi');
        if (this.value === 'cateringInfo') {
            cateringBilgisiDiv.style.display = 'block';
        } else {
            cateringBilgisiDiv.style.display = 'none';
        }
    });

    durumBilgisi.addEventListener('change', function () {
        var damacanaBilgisiDiv = document.getElementById('damacanaBilgisi');
        if (this.value === 'damacanaInfo') {
            damacanaBilgisiDiv.style.display = 'block';
        } else {
            damacanaBilgisiDiv.style.display = 'none';
        }
    });

    krizButton.addEventListener('click', function () {
        hiddenContent.classList.remove('d-none');
    });

    sendButton.addEventListener('click', function() {
        krizAlert.style.display = 'block';
        hiddenContent.classList.add('d-none');
        document.getElementById('textBox').value = '';
    });

    krizDurumu.addEventListener('change', function () {
        const altSeceneklerDiv = document.getElementById('altSecenekler');
        if (this.value === 'const') {
            altSeceneklerDiv.style.display = 'block';
        } else {
            altSeceneklerDiv.style.display = 'none';
        }
    });

    durumBilgisi.addEventListener('change', function() {
        if (this.value === "CateringInfo") {
            altDurumBilgisiCatering1.style.display = 'block';
        } else if (this.value === "damacanaInfo") {
            altDurumBilgisiDamacana1.style.display = 'block';
        }
    });


    // Saat seçiciyi oluşturan JavaScript kodu
    const saatSecici = document.getElementById("saatSecici");
    const saatSaat = document.getElementById("saatSaat");
    const saatDakika = document.getElementById("saatDakika");

    saatSecici.style.display = "flex";

    saatSaat.addEventListener("input", () => {
        if (saatSaat.value.length > 2) {
            saatSaat.value = saatSaat.value.slice(0, 2);
        }
    });

    saatDakika.addEventListener("input", () => {
        if (saatDakika.value.length > 2) {
            saatDakika.value = saatDakika.value.slice(0, 2);
        }
    });

    const garsonAdet = document.getElementById("garsonAdet");

    garsonAdet.addEventListener("input", () => {
        if (garsonAdet.value.length > 6) {
            garsonAdet.value = garsonAdet.value.slice(0, 6);
        }
    });  

    // durum bilgisine göre alt durum bilgisi görünür hale gelsin
    durumBilgisi.addEventListener('change', function() {
        var selectedOption = this.value;
        if (selectedOption === 'cateringInfo') {
            cateringBilgisi.style.display = 'block';
        } else {
            cateringBilgisi.style.display = 'none';
        }

        if (selectedOption === 'damacanaInfo') {
            damacanaBilgisi.style.display = 'block';
        } else {
            damacanaBilgisi.style.display = 'none';
        }
    });
    
});

