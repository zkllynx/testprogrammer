<?php $this->load->view('templates/header'); ?>

<main id="main" class="main">
    <section class="section">
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Add Product</h5>

              <!-- Vertical Form -->
              <form class="row g-3" action="<?php echo site_url('Product/postCreate') ?>" method="POST" autocomplete="off">
                <div class="col-md-3" hidden>
                  <label for="id_produk" class="form-label">Product ID</label>
                  <input type="number" class="form-control" id="id_produk" name="id_produk">
                </div>
                <div class="col-md-12">
                  <label for="nama_produk" class="form-label">Product Name</label>
                  <input type="text" class="form-control" id="nama_produk" name="nama_produk" required oninvalid="this.setCustomValidity('Please fill Product Name')" oninput="this.setCustomValidity('')">
                </div>
                <div class="col-md-6">
                  <label for="harga" class="form-label">Price</label>
                  <div class="input-group">
                      <span class="input-group-text">RP</span>
                      <input type="text" class="form-control" id="harga" name="harga" pattern="[0-9]*" required
                          oninvalid="this.setCustomValidity('Please fill Product Price with numbers only')"
                          oninput="this.setCustomValidity('')">
                  </div>
                </div>
                <div class="col-md-6">
                  <label for="kategori_id" class="form-label">Category</label>
                  <select id="kategori_id" class="form-select" name="kategori_id" required
                          oninvalid="this.setCustomValidity('Please select Product Category')"
                          oninput="this.setCustomValidity('')">
                      <option value="" disabled selected>Choose Category</option>
                      <?php foreach ($category as $ctg): ?>
                          <option value="<?php echo $ctg->id_kategori ?>"><?php echo $ctg->nama_kategori ?></option>
                      <?php endforeach ?>
                  </select>
                </div>
                <div class="col-md-6">
                  <label for="status_id" class="form-label">Status</label>
                  <select id="status_id" class="form-select" name="status_id" required
                          oninvalid="this.setCustomValidity('Please select Product Status')"
                          oninput="this.setCustomValidity('')">
                      <option value="" disabled selected>Choose Status</option>
                      <?php foreach ($status as $sts): ?>
                          <option value="<?php echo $sts->id_status ?>"><?php echo $sts->nama_status ?></option>
                      <?php endforeach ?>
                  </select>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <button type="reset" class="btn btn-danger">Reset</button>
                </div>
                <div class="text-center">
                    <a href="javascript:history.back()" class="btn btn-secondary">Back</a>
                </div>
              </form><!-- Vertical Form -->
            </div>
          </div>
        </div>
      </div>
    </section>

</main><!-- End #main -->

<?php $this->load->view('templates/footer'); ?>