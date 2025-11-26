    <form method="POST" enctype="multipart/form-data">
        <div class="container mb-3">
            <h2 class="mb-5">Tambah Menu Pengunjung</h2>
            
            <div class="mb-3">
                <label for="nama_menu" class="form-label">Nama Menu</label>
                <select class="form-control" id="nama_menu" name="nama_menu" required>
                    <option value="">-- Pilih Menu --</option>
                    <option value="Hot Palm Sugar Latte">Hot Palm Sugar Latte</option>
                    <option value="Hot Cafe Dolce">Hot Cafe Dolce</option>
                    <option value="Iced Latte">Iced Latte</option>
                    <option value="Hot Mocha">Hot Mocha</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="gambar" class="form-label">Gambar</label>
                <input class="form-control" type="file" id="gambar" name="gambar" accept="image/*" required>
            </div>

            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <input type="text" class="form-control" id="deskripsi" name="deskripsi" required>
            </div>

            <div class="mb-3">
                <label for="harga" class="form-label">Harga</label>
                <input type="number" class="form-control" id="harga" name="harga" required>
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <input type="text" class="form-control" id="status" name="status" required>
            </div>

            <input type="submit" name="simpan" value="Simpan" class="btn btn-outline-primary">
        </div>
    </form>