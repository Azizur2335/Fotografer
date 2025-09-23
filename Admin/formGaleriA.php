<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Panel Admin - Galeri</title>
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
    input, button {
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
      background: #fafafa; 
      border-radius: 6px;
    }
    .thumbs {
      display: flex;
      flex-wrap: wrap;
      margin-top: 8px;
    }
    .thumbs img { 
      width: 80px; 
      height: 80px; 
      object-fit: cover; 
      margin-right: 6px; 
      margin-bottom: 6px;
      border-radius: 4px; 
      border: 1px solid #ccc; 
    }
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
  <h2>Tambah Galeri</h2>
  <form id="formGaleri">
    <input type="hidden" id="galeriId">
    <label>Judul Galeri:
      <input type="text" id="judulGaleri" required>
    </label>
    <label>Pilih Foto (bisa banyak):
      <input type="file" id="fileGaleri" accept="image/*" multiple>
    </label>
    <div id="previewFoto" class="thumbs"></div>
    <button type="submit">Simpan</button>
    <button type="button" onclick="resetGaleri()">Reset</button>
  </form>
  
  <script>
    let galeri = [];
    let fotoArray = []; 

    function renderGaleri(){
      const list = document.getElementById('listGaleri');
      list.innerHTML = '';
      if(galeri.length === 0){ 
        list.innerHTML = '<p>Belum ada galeri</p>'; 
        return; 
      }
      galeri.forEach(g=>{
        const div = document.createElement('div');
        div.className = 'item';
        div.innerHTML = `
          <b>${g.judul}</b>
          <div class="thumbs">
            ${g.gambar.map(src=>`<img src="${src}">`).join('')}
          </div>
          <div class="actions">
            <button onclick="editGaleri('${g.id}')">Edit</button>
            <button onclick="hapusGaleri('${g.id}')">Hapus</button>
          </div>
        `;
        list.appendChild(div);
      });
    }

    document.getElementById('formGaleri').onsubmit = function(e){
      e.preventDefault();
      const id = document.getElementById('galeriId').value;
      const judul = document.getElementById('judulGaleri').value;
      if(fotoArray.length === 0){
        alert('Silakan pilih minimal 1 foto');
        return;
      }
      if(id){
        const g = galeri.find(x=>x.id===id);
        g.judul = judul; g.gambar = fotoArray;
      } else {
        galeri.push({id: Date.now().toString(), judul, gambar: [...fotoArray]});
      }
      resetGaleri();
      renderGaleri();
    }

    document.getElementById('fileGaleri').addEventListener('change', function(){
      fotoArray = [];
      const files = Array.from(this.files);
      const preview = document.getElementById('previewFoto');
      preview.innerHTML = '';
      files.forEach(file=>{
        const reader = new FileReader();
        reader.onload = function(e){
          fotoArray.push(e.target.result);
          const img = document.createElement('img');
          img.src = e.target.result;
          preview.appendChild(img);
        }
        reader.readAsDataURL(file);
      });
    });

    function resetGaleri(){
      document.getElementById('formGaleri').reset();
      document.getElementById('galeriId').value = '';
      document.getElementById('previewFoto').innerHTML = '';
      fotoArray = [];
    }

    function editGaleri(id){
      const g = galeri.find(x=>x.id===id);
      document.getElementById('galeriId').value = g.id;
      document.getElementById('judulGaleri').value = g.judul;
      fotoArray = [...g.gambar];
      const preview = document.getElementById('previewFoto');
      preview.innerHTML = '';
      g.gambar.forEach(src=>{
        const img = document.createElement('img');
        img.src = src;
        preview.appendChild(img);
      });
    }

    function hapusGaleri(id){
      if(confirm('Yakin hapus galeri?')){
        galeri = galeri.filter(g=>g.id!==id);
        renderGaleri();
      }
    }

    renderGaleri();
  </script>
</body>
</html>
