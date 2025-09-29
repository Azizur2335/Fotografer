<?php
require 'koneksi.php';
if(isset($_GET['id'])){
    $id = $_GET['id'];

    // Prepared statement untuk ambil pesan
    $stmt = $koneksi->prepare("SELECT * FROM pesan_masuk WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows > 0){
    $pesan = $result->fetch_assoc();
    } else {
        echo "<script>
            alert('Pesan tidak ditemukan!');
            window.location.href = 'index.php';
        </script>";
        exit();
    }
}
$opsiList = [
    '1' => 'Konsultasi',
    '2' => 'Buat Janji',
    '3' => 'Booking',
    '4' => 'Lainnya'
];
$opsi_text = isset($opsiList[$pesan['opsi']]) ? $opsiList[$pesan['opsi']] : $pesan['opsi'];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pesan - <?php echo htmlspecialchars($pesan['first']); ?></title>
    <style>
        body { 
            font-family: 'Merriweather', serif; 
            background: #f5f5f5; 
            padding: 20px; 
            margin: 0; 
        }
        .container { 
            max-width: 900px; 
            margin: 0 auto; 
        }
        .btn-back { 
            display: inline-block; 
            padding: 10px 20px; 
            background: #000; 
            color: white; 
            border-radius: 5px; 
            text-decoration: none; 
            margin-bottom: 20px; 
            transition: 0.3s; 
        }
        .btn-back:hover { 
            background: #444; 
        }
        .message-card { 
            background: white; 
            border-radius: 10px; 
            box-shadow: 0 2px 10px rgba(0,0,0,0.1); 
            overflow: hidden; 
        }
        .message-header { 
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); 
            color: white; 
            padding: 30px; 
        }
        .message-header h1 { 
            font-size: 28px; 
            margin-bottom: 10px; 
            margin-top: 0;
        }
        .message-header .meta { 
            font-size: 14px; 
            opacity: 0.9; 
        }
        .message-body { 
            padding: 30px; 
        }
        .info-grid { 
            display: grid; 
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); 
            gap: 20px; 
            margin-bottom: 30px; 
        }
        .info-item { 
            padding: 15px; 
            background: #f8f9fa; 
            border-radius: 8px; 
        }
        .info-item label { 
            display: block; 
            font-size: 12px; 
            color: #666; 
            text-transform: uppercase; 
            margin-bottom: 5px; 
            font-weight: 600; 
        }
        .info-item .value { 
            font-size: 16px; 
            color: #333; 
        }
        .info-item .value a { 
            color: #007bff; 
            text-decoration: none; 
        }
        .info-item .value a:hover { 
            text-decoration: underline; 
        }
        .message-content { 
            background: #f8f9fa; 
            padding: 20px; 
            border-radius: 8px; 
            line-height: 1.6; 
            margin-top: 20px; 
        }
        .message-content h3 { 
            margin-top: 0;
            margin-bottom: 15px; 
            color: #333; 
        }
        .message-content p { 
            white-space: pre-wrap; 
            color: #555; 
            margin: 0;
        }
        .action-buttons { 
            display: flex; 
            gap: 10px; 
            margin-top: 30px; 
            padding-top: 20px; 
            border-top: 1px solid #dee2e6; 
        }
        .btn { 
            padding: 10px 20px; 
            border: none; 
            border-radius: 5px; 
            cursor: pointer; 
            text-decoration: none; 
            display: inline-block; 
            font-size: 14px; 
            transition: 0.3s; 
        }
        .btn-reply { 
            background: #007bff; 
            color: white; 
        }
        .btn-reply:hover { 
            background: #0056b3; 
        }
        .btn-delete { 
            background: #dc3545; 
            color: white; 
        }
        .btn-delete:hover { 
            background: #c82333; 
        }
    </style>
</head>
<body>
    <div class="container">
        <a href="../Admin/index.php" class="btn-back">← Kembali ke Dashboard</a>
        
        <div class="message-card">
            <div class="message-header">
                <h1><?php echo htmlspecialchars($pesan['topic']); ?></h1>
                <div class="meta">
                    Dikirim pada <?php echo date('d F Y, H:i', strtotime($pesan['tanggal'])); ?> WITA
                </div>
            </div>
            
            <div class="message-body">
                <div class="info-grid">
                    <div class="info-item">
                        <label>Nama Lengkap</label>
                        <div class="value">
                            <?php echo htmlspecialchars($pesan['first'] . ' ' . $pesan['last']); ?>
                        </div>
                    </div>
                    
                    <div class="info-item">
                        <label>Email</label>
                        <div class="value">
                            <a href="mailto:<?php echo htmlspecialchars($pesan['email']); ?>">
                                <?php echo htmlspecialchars($pesan['email']); ?>
                            </a>
                        </div>
                    </div>
                    
                    <?php if(!empty($pesan['phone'])) { ?>
                    <div class="info-item">
                        <label>Nomor Telepon</label>
                        <div class="value">
                            <a href="tel:<?php echo htmlspecialchars($pesan['phone']); ?>">
                                <?php echo htmlspecialchars($pesan['phone']); ?>
                            </a>
                        </div>
                    </div>
                    <?php } ?>
                    
                    <div class="info-item">
                        <label>Topik</label>
                        <div class="value"><?php echo htmlspecialchars($pesan['topic']); ?></div>
                    </div>
                    
                    <?php if(!empty($pesan['opsi'])) { ?>
                    <div class="info-item">
                        <label>Kebutuhan</label>
                        <div class="value"><?php echo htmlspecialchars($opsi_text); ?></div>
                    </div>
                    <?php } ?>
                </div>
                
                <?php if(!empty($pesan['message'])) { ?>
                <div class="message-content">
                    <h3>Pesan:</h3>
                    <p style="white-space: pre-wrap;"><?php echo htmlspecialchars($pesan['message']); ?></p>
                </div>
                <?php } ?>
                
                <div class="action-buttons">
                    <a href="mailto:<?php echo htmlspecialchars($pesan['email']); ?>?subject=Re: <?php echo urlencode($pesan['topic']); ?>" 
                       class="btn btn-reply">Balas via Email</a>
                    <a href="hapus_pesan.php?id=<?php echo $pesan['id']; ?>" 
                       class="btn btn-delete"
                       onclick="return confirm('Yakin ingin menghapus pesan ini?')">Hapus Pesan</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>