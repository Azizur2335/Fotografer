<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Panel Admin - Paket Foto</title>
  <style>
    body { 
      font-family: Arial, sans-serif; 
      margin: 0; 
      padding: 20px; 
      background: #f5f5f5;
    }
    h1, h2 { margin-bottom: 10px; }
    form, .list {
      background: #fff;
      border-radius: 8px;
      padding: 15px;
      margin-bottom: 20px;
      box-shadow: 0 2px 6px rgba(0,0,0,0.1);
    }
    label { display: block; margin-top: 10px; font-weight: bold; }
    input, textarea, button {
      width: 100%; 
      padding: 8px; 
      margin-top: 6px; 
      border: 1px solid #ccc; 
      border-radius: 4px;
      font-size: 14px;
    }
    button {
      background: #343434ff; 
      color: white; 
      border: none; 
      cursor: pointer; 
      transition: background 0.3s;
    }
    button:hover { background: #6d6d6dff; }
    .item {
      border: 1px solid #ddd; 
      padding: 12px; 
      margin-bottom: 10px; 
      display: flex; 
      justify-content: space-between; 
      align-items: center; 
      background: #fafafa; 
      border-radius: 6px;
    }
    .error { color: red; font-size: 14px; margin-top: 5px; }
    .actions button {
      width: auto;
      margin-left: 6px;
      padding: 6px 12px;
      font-size: 13px;
    }
    .actions {
      display: flex;
      flex-shrink: 0;
    }
  </style>
</head>
<body>
  <h2>Tambah Paket Foto</h2>
  <form id="formPaket">
    <input type="hidden" id="paketId">
    <label>Nama Paket:
      <input type="text" id="namaPaket" required>
    </label>
    <label>Harga (IDR):
      <input type="number" id="hargaPaket" min="0" required>
    </label>
    <div id="errorHarga" class="error" style="display:none;">Harga tidak boleh kosong atau negatif</div>
    <label>Deskripsi:
      <textarea id="deskripsiPaket"></textarea>
    </label>
    <button type="submit">Simpan</button>
    <button type="button" onclick="resetPaket()">Reset</button>
  </form>
  
  <script>
    let paket = [];

    function renderPaket(){
      const list = document.getElementById('listPaket');
      list.innerHTML = '';
      if(paket.length === 0){ 
        list.innerHTML = '<p>Belum ada paket</p>'; 
        return; 
      }
      paket.forEach(p=>{
        const div = document.createElement('div');
        div.className = 'item';
        div.innerHTML = `
          <span>
            <b>${p.nama}</b> - Rp ${p.harga.toLocaleString()}<br>
            ${p.deskripsi || ''}
          </span>
          <span class="actions">
            <button onclick="editPaket('${p.id}')">Edit</button>
            <button onclick="hapusPaket('${p.id}')">Hapus</button>
          </span>
        `;
        list.appendChild(div);
      });
    }

    document.getElementById('formPaket').onsubmit = function(e){
      e.preventDefault();
      const id = document.getElementById('paketId').value;
      const nama = document.getElementById('namaPaket').value;
      const harga = parseInt(document.getElementById('hargaPaket').value);
      const deskripsi = document.getElementById('deskripsiPaket').value;
      if(isNaN(harga) || harga < 0){
        document.getElementById('errorHarga').style.display = 'block';
        return;
      } else {
        document.getElementById('errorHarga').style.display = 'none';
      }
      if(id){
        const p = paket.find(x=>x.id===id);
        p.nama = nama; p.harga = harga; p.deskripsi = deskripsi;
      } else {
        paket.push({id: Date.now().toString(), nama, harga, deskripsi});
      }
      resetPaket();
      renderPaket();
    }

    function resetPaket(){
      document.getElementById('formPaket').reset();
      document.getElementById('paketId').value = '';
    }

    function editPaket(id){
      const p = paket.find(x=>x.id===id);
      document.getElementById('paketId').value = p.id;
      document.getElementById('namaPaket').value = p.nama;
      document.getElementById('hargaPaket').value = p.harga;
      document.getElementById('deskripsiPaket').value = p.deskripsi;
    }

    function hapusPaket(id){
      if(confirm('Yakin hapus paket?')){
        paket = paket.filter(p=>p.id!==id);
        renderPaket();
      }
    }

    renderPaket();
  </script>
</body>
</html>
