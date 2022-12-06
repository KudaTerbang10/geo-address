
function cek() {
    let nilai = document.getElementById('form').inputNilai.value;

    let hasil = document.getElementById('hasil');

    if (nilai >= 500)
    {
        hasil.innerHTML= `<div class="alert alert-primary" role="alert"> Sangat Tinggi </div> `
    }
    else if (nilai >= 400 && nilai <500)
    {
        hasil.innerHTML=`<div class="alert alert-info" role="alert"> Tinggi </div>`
    }
    else if (nilai >= 300 && nilai <400)
    {
        hasil.innerHTML=`<div class="alert alert-success" role="alert">Menengah</div>`
    }
    else if (nilai >= 200 && nilai <300)
    {
        hasil.innerHTML=`<div class="alert alert-warning" role="alert">Rendah</div>`
    }
    else if (nilai <200)
    {
        hasil.innerHTML=`<div class="alert alert-danger" role="alert">Sangat Rendah</div>`
    }
}