<?php $this->load->view('templates/header'); ?>

<main id="main" class="main">

  <div class="pagetitle">
    <h1>Product</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo site_url('Home'); ?>">Home</a></li>
        <li class="breadcrumb-item active">Product</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Update Product</h5>

            <!-- Multi Columns Form -->
            <form class="row g-3" action="<?php echo site_url('Product/postUpdate') ?>" method="POST" autocomplete="off">
              <?php foreach($product as $prd) { ?>
              <div class="col-md-6">
                <label for="productID" class="form-label">Product ID</label>
                <input type="number" class="form-control" id="productID" name="id_produk" value="<?php echo $prd->id_produk ?>" readonly>
              </div>
              <div class="col-md-6">
                <label for="productName" class="form-label">Product Name</label>
                <input type="text" class="form-control" id="productName" name="nama_produk" value="<?php echo $prd->nama_produk ?>" required oninvalid="this.setCustomValidity('Please fill Product Name')" oninput="this.setCustomValidity('')">
              </div>
              <div class="col-md-6">
                <label for="price" class="form-label">Price</label>
                <div class="input-group">
                  <span class="input-group-text">RP</span>
                  <input type="text" class="form-control" id="price" name="harga" value="<?php echo $prd->harga ?>">
                </div>
              </div>
              <div class="col-md-6">
                <label for="categoryID" class="form-label">Category</label>
                <select id="categoryID" class="form-select" name="kategori_id">
                  <option disabled>Choose Category</option>
                  <?php foreach ($category as $ctg): ?>
                    <option value="<?php echo $ctg->id_kategori ?>" <?php if($ctg->id_kategori == $prd->kategori_id) echo 'selected'; ?>><?php echo $ctg->nama_kategori ?></option>
                  <?php endforeach ?>
                </select>
              </div>
              <div class="col-md-6">
                <label for="statusID" class="form-label">Status</label>
                <select id="statusID" class="form-select" name="status_id">
                  <option disabled>Choose Status</option>
                  <?php foreach ($status as $sts): ?>
                    <option value="<?php echo $sts->id_status ?>" <?php if($sts->id_status == $prd->status_id) echo 'selected'; ?>><?php echo $sts->nama_status ?></option>
                  <?php endforeach ?>
                </select>
              </div>
              <?php } ?>
              <div class="text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="reset" class="btn btn-danger">Reset</button>
              </div>
              <div class="text-center">
                <a href="<?php echo site_url('Product'); ?>" class="btn btn-secondary">Back</a>
              </div>
            </form><!-- End Multi Columns Form -->

          </div>
        </div>

      </div>
    </div>
  </section>

</main><!-- End #main -->

<?php $this->load->view('templates/footer'); ?>
